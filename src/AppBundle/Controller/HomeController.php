<?php

namespace AppBundle\Controller;

use AppBundle\Form\Handler\RegisterFormHandler;
use AppBundle\Form\Type\RegisterFormType;
use AppBundle\Repository\ProductRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class HomeController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class HomeController extends AbstractController
{
    /**
     * @param Request $request
     * @param int     $page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request, $page = 1)
    {
        /** @var ProductRepository $repository */
        $repository = $this->get('app.repository.product');

        return $this->render('AppBundle:home:index.html.twig', [
            'products' => $repository->getHomepageProductsPaginated($page, 10)
        ]);
    }
}
