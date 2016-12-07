<?php

namespace AppBundle\Pagination;

/**
 * Interface PaginatedResultInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface PaginatedResultInterface
{
    /**
     * @return mixed[]
     */
    public function getItems();

    /**
     * @return int
     */
    public function getCount(): int;
}