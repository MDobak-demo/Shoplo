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
 * Class ProductController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class ProductController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction(Request $request)
    {
        $form = $this->createNewProductForm();
        $form->handleRequest($request);
        $formResponse = $this->handleNewProductForm($form);
        $this->addFlashMessages($formResponse->getMessages());

        return $this->render('AppBundle:register:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function createNewProductForm()
    {
        return $this->createForm(AddProductFormType::class);
    }

    /**
     * @param FormInterface $form
     *
     * @return \AppBundle\Form\Handler\FormResponseInterface
     */
    protected function handleNewProductForm(FormInterface $form)
    {
        /** @var AddProductFormHandler $registerFormHandler */
        $addProductHandler = $this->get('app.form_handler.product.add_product');

        return $addProductHandler->handle($form);
    }
}
