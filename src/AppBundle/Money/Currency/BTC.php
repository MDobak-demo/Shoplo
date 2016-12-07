<?php

namespace AppBundle\Money\Currency;

use AppBundle\Money\CurrencyInterface;

/**
 * Class BTC
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class BTC implements CurrencyInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getISO(): string
    {
        return 'BTC';
    }

    /**
     * {@inheritdoc}
     */
    public static function format(int $value, string $locale = 'en_US'): string
    {
        return sprintf("%d BTC", $value);
    }
}