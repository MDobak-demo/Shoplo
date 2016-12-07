<?php

namespace AppBundle\Money\Currency;

use AppBundle\Money\CurrencyInterface;

/**
 * Class AbstractCurrency
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
abstract class AbstractCurrency implements CurrencyInterface
{
    /**
     * @var string
     */
    static protected $iso;

    /**
     * {@inheritdoc}
     */
    public static function getISO(): string
    {
        return static::$iso;
    }

    /**
     * {@inheritdoc}
     */
    public static function format(int $value, string $locale = 'en_US'): string
    {
        $fmt = new \NumberFormatter($locale, \NumberFormatter::CURRENCY );

        return  $fmt->formatCurrency($value, static::$iso);
    }
}