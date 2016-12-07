<?php

namespace AppBundle\Pagination;

/**
 * Interface PaginatorInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface PaginatorInterface
{
    /**
     * @param mixed $query
     * @param int   $page
     * @param int   $itemsPerPage
     *
     * @return PaginatedResultInterface
     */
    public function paginate($query, int $page, int $itemsPerPage): PaginatedResultInterface;
}