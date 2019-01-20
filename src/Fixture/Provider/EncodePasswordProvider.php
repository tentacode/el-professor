<?php declare(strict_types=1);

namespace App\Fixture\Provider;

use Faker\Provider\Base as BaseProvider;
use Faker\Generator;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface as Encoder;
use App\Security\Model\User;

final class EncodePasswordProvider extends BaseProvider
{
    private $encoder;

    public function __construct(Encoder $encoder, Generator $generator)
    {
        $this->encoder = $encoder;

        parent::__construct($generator);
    }

    public function encodePassword(User $user, string $password): string
    {
        return $this->encoder->encodePassword($user, $password);
    }
}
