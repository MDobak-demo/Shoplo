<?php

namespace AppBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;

/**
 * Interface FormHandlerInterface
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
interface FormHandlerInterface
{
    /**
     * @param FormInterface $form
     *
     * @return FormResponseInterface
     */
    public function handle(FormInterface $form): FormResponseInterface;
}