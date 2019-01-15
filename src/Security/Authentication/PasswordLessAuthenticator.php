<?php

namespace App\Security\Authentication;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as Encoder;
use App\Security\Query\FindUserByUid;

class PasswordLessAuthenticator extends AbstractGuardAuthenticator
{
    private $findUserByUid;
    private $encoder;

    public function __construct(FindUserByUid $findUserByUid, Encoder $encoder)
    {
        $this->findUserByUid = $findUserByUid;
        $this->encoder = $encoder;
    }

    public function supports(Request $request)
    {
        return $request->query->has('pl_token') && $request->query->has('pl_uid');
    }

    public function getCredentials(Request $request)
    {
        return [
            'uid' => $request->query->get('pl_uid'),
            'token' => $request->query->get('pl_token'),
        ];
    }

    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        $uid = $credentials['uid'];

        if ($uid === null) {
            return;
        }

        return $this->findUserByUid->__invoke($uid);
    }

    public function checkCredentials($credentials, UserInterface $user)
    {
        $token = $credentials['token'];

        if ($token === null) {
            return false;
        }

        return $this->encoder->isPasswordValid($user, $token);
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        throw new \RuntimeException('Could not authenticate.');
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return null;
    }

    public function start(Request $request, AuthenticationException $authException = null)
    {
        return new RedirectResponse('/magic-link');
    }

    public function supportsRememberMe()
    {
        return true;
    }
}
