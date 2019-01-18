<?php

namespace App\Logbook\Twig;

class PrettyLongDate extends \Twig_Extension
{
    public function getFilters()
    {
        return [
            new \Twig_Filter('pretty_long_date', [$this, 'prettyLongDate']),
        ];
    }

    public function prettyLongDate(\DateTime $date): string
    {
        setlocale(LC_ALL, 'fr_FR'); // @TODO not here

        return mb_strtolower(strftime(
            'le %A %e %B à %kh%M',
            $date->getTimestamp()
        ));
    }
}
