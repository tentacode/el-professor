<?php declare(strict_types=1);

namespace App\Fixture\Provider;

use Faker\Provider\Base as BaseProvider;

final class LogProjectProvider extends BaseProvider
{
    const LOG_PROJECTS = [
        'plante_connectee',
        'inventaire_plus',
        'cv_portfolio',
    ];

    public function logProject(): string
    {
        return self::randomElement(self::LOG_PROJECTS);
    }
}
