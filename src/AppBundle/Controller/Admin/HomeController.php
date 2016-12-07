<?php

namespace AppBundle\Controller\Admin;

use AppBundle\Controller\AbstractController;
use AppBundle\Form\Handler\AddProductFormHandler;
use AppBundle\Form\Handler\RegisterFormHandler;
use AppBundle\Form\Type\AddProductFormType;
use AppBundle\Form\Type\RegisterFormType;
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
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->render('AppBundle:admin/home:index.html.twig');
    }
}
