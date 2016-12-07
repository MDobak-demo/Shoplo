<?php

namespace AppBundle\Money;

/**
 * Interface PriceInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface PriceInterface
{
    /**
     * PriceInterface constructor.
     *
     * @param int    $price
     * @param string $currencyISOCode
     */
    public function __construct(int $price, string $currencyISOCode);

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @return string
     */
    public function getCurrency(): string;

    /**
     * @param string $locale
     *
     * @return string
     */
    public function format(string $locale = 'en_US'): string;
}