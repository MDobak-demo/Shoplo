<?php

namespace AppBundle\Pagination;

use Knp\Component\Pager\Pagination\AbstractPagination;

/**
 * Class KnpPaginatorResult
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class KnpPaginatorResult implements PaginatedResultInterface
{
    /**
     * @var AbstractPagination
     */
    protected $pagination;

    /**
     * KnpPaginatorResult constructor.
     *
     * @param AbstractPagination $pagination
     */
    public function __construct(AbstractPagination $pagination)
    {
        $this->pagination = $pagination;
    }

    /**
     * {@inheritdoc}
     */
    public function getItems()
    {
        return $this->pagination->getItems();
    }

    /**
     * {@inheritdoc}
     */
    public function getCount(): int
    {
        return $this->pagination->getTotalItemCount();
    }

    /**
     * @return AbstractPagination
     */
    public function getKnpPagination(): AbstractPagination
    {
        return $this->pagination;
    }
}