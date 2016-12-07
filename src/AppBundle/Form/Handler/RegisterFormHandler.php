<?php

namespace AppBundle\Form\Handler;

use League\Tactician\CommandBus;
use Symfony\Component\Form\FormInterface;

/**
 * Class RegisterFormHandler
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterFormHandler implements FormHandlerInterface
{
    /**
     * @var CommandBus
     */
    protected $commandBus;

    /**
     * RegisterFormHandler constructor.
     *
     * @param CommandBus $commandBus
     */
    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(FormInterface $form): FormResponseInterface
    {
        $response = new FormResponse();

        $response
            ->setValid($form->isValid())
            ->setSubmitted($form->isSubmitted())
        ;

        if ($form->isValid()) {
            try {
                $this->commandBus->handle($form->getData());

                $response->addMessage(FormResponse::MESSAGE_SUCCESS, 'User was registered successfully.');
            } catch (\Exception $e) {
                $response->addMessage(FormResponse::MESSAGE_ERROR, 'There was error during adding the product.');
            }
        }

        return $response;
    }
}