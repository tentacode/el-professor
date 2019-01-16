<?php declare(strict_types=1);

namespace App\Security\Authentication;

/**
 * @TODO This class job is ...
 */
class PasswordGenerator
{
    const ALPHANUM = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    const SYMBOLS = '`-=~!@#$%^&*()_+,./<>?;:[]{}\|';

    const PASSWORD_LENGTH = 30;

    public function generate(): string
    {
        $password = '';
        $availableCharacters = self::ALPHANUM.self::SYMBOLS;
        $availableCharactersCount = strlen($availableCharacters);

        for ($charIndex = 0; $charIndex < self::PASSWORD_LENGTH; $charIndex++) {
            $randomChar = $availableCharacters[random_int(0, $availableCharactersCount - 1)];
            $password .= $randomChar;
        }
        
        return $password;
    }
}
