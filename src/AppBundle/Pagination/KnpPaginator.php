<?php

namespace AppBundle\Pagination;

use Knp\Component\Pager\Paginator;

/**
 * Class KnpPaginator
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class KnpPaginator implements PaginatorInterface
{
    /**
     * @var Paginator
     */
    protected $paginator;

    /**
     * KnpPaginator constructor.
     *
     * @param Paginator $paginator
     */
    public function __construct(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * {@inheritdoc}
     */
    public function paginate($query, int $page, int $itemsPerPage): PaginatedResultInterface
    {
        return new KnpPaginatorResult($this->paginator->paginate($query, $page, $itemsPerPage));
    }
}