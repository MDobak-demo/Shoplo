<?php

namespace AppBundle\Controller;

use AppBundle\Form\Handler\RegisterFormHandler;
use AppBundle\Form\Type\RegisterFormType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RegisterController
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $form = $this->createRegisterForm();
        $form->handleRequest($request);
        $formResponse = $this->handleRegisterForm($form);
        $this->addFlashMessages($formResponse->getMessages());

        return $this->render('AppBundle:register:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @return \Symfony\Component\Form\Form
     */
    private function createRegisterForm()
    {
        return $this->createForm(RegisterFormType::class);
    }

    /**
     * @param FormInterface $form
     *
     * @return \AppBundle\Form\Handler\FormResponseInterface
     */
    protected function handleRegisterForm(FormInterface $form)
    {
        /** @var RegisterFormHandler $registerFormHandler */
        $registerFormHandler = $this->get('app.form_handler.user.register');

        return $registerFormHandler->handle($form);
    }
}
