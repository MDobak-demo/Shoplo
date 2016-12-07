<?php

namespace AppBundle\Money;

/**
 * Interface CurrencyInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface CurrencyInterface
{
    /**
     * @return string
     */
    public static function getISO(): string;

    /**
     * @param int    $value
     * @param string $locale
     *
     * @return string
     */
    public static function format(int $value, string $locale = 'en_US'): string;
}