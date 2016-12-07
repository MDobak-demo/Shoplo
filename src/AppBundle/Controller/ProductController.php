<?php

namespace AppBundle\Controller;

use AppBundle\Form\Handler\RegisterFormHandler;
use AppBundle\Form\Type\RegisterFormType;
use AppBundle\Product\Model\ProductId;
use AppBundle\Repository\Exception\EntityNotFoundException;
use AppBundle\Repository\ProductRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ProductController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class ProductController extends AbstractController
{
    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction($id)
    {
        /** @var ProductRepository $repository */
        $repository = $this->get('app.repository.product');

        try {
            $product = $repository->find(new ProductId($id));
        } catch (EntityNotFoundException $e) {
            throw $this->createNotFoundException("Product does not exists!");
        }

        return $this->render('AppBundle:product:show.html.twig', [
            'product' => $product
        ]);
    }
}
