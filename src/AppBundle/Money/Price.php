<?php

namespace AppBundle\Money;

use AppBundle\Money\Exception\InvalidISOCodeException;

/**
 * Class Price
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class Price implements PriceInterface
{
    /**
     * @var int
     */
    protected $price;

    /**
     * @var string
     */
    protected $currencyISOCode;

    /**
     * {@inheritDoc}
     */
    public function __construct(int $price, string $currencyISOCode)
    {
        $this->price           = $price;
        $this->currencyISOCode = $currencyISOCode;

        $currencyClass = '\\AppBundle\\Money\\Currency\\'.$currencyISOCode;

        if (!is_a($currencyClass, '\\AppBundle\\Money\\CurrencyInterface', true)) {
            throw InvalidISOCodeException::create($currencyISOCode);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrency(): string
    {
        return $this->currencyISOCode;
    }

    /**
     * {@inheritDoc}
     */
    public function format(string $locale = 'en_US'): string
    {
        return call_user_func_array(['\\AppBundle\\Money\\Currency\\'.$this->currencyISOCode, 'format'], [$this->price, $locale]);
    }
}