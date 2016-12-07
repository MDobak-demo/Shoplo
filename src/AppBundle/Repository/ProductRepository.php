<?php

namespace AppBundle\Repository;

use AppBundle\Pagination\PaginatorInterface;
use AppBundle\Product\Model\Product;
use AppBundle\Product\Model\ProductId;
use AppBundle\Repository\Exception\EntityNotFoundException;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

/**
 * Class ProductRepository
 */
class ProductRepository
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var EntityRepository
     */
    protected $doctrineRepository;

    /**
     * @var PaginatorInterface
     */
    protected $paginator;

    /**
     * CommentRepository constructor.
     *
     * @param EntityManager      $entityManager
     * @param EntityRepository   $doctrineRepository
     * @param PaginatorInterface $paginator
     */
    public function __construct(
        EntityManager      $entityManager,
        EntityRepository   $doctrineRepository,
        PaginatorInterface $paginator
    ) {
        $this->entityManager      = $entityManager;
        $this->doctrineRepository = $doctrineRepository;
        $this->paginator          = $paginator;
    }

    /**
     * @param ProductId $id
     *
     * @return Product|null
     */
    public function find(ProductId $id): Product
    {
        /** @var Product $product */
        $product = $this->doctrineRepository->find($id->toString());

        if (!$product) {
            throw EntityNotFoundException::create();
        }

        return $product;
    }

    /**
     * @param $page
     * @param $itemsPerPage
     *
     * @return \AppBundle\Pagination\PaginatedResultInterface
     */
    public function getHomepageProductsPaginated($page, $itemsPerPage)
    {
        $query = $this
            ->entityManager
            ->createQueryBuilder()
            ->select('p')
            ->from('Product:Product', 'p')
            ->orderBy('p.createdAt', 'DESC')
            ->getQuery()
        ;

        return $this->paginator->paginate($query, $page, $itemsPerPage);
    }

    /**
     * @param Product $product
     */
    public function add(Product $product)
    {
        $this->entityManager->persist($product);
        $this->entityManager->flush($product);
    }
}