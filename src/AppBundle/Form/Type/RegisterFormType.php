<?php

namespace AppBundle\Form\Type;

use AppBundle\User\Command\RegisterUserCommand;
use AppBundle\User\Model\UserId;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class RegisterFormType
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class RegisterFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
            ])
            ->add('firstName', TextType::class)
            ->add('lastName', TextType::class)
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\\User\\Command\\RegisterUserCommand',
            'empty_data' => function(FormInterface $form) {
                $email     = $form->get('email')->getData();
                $password  = $form->get('password')->getData();
                $firstName = $form->get('firstName')->getData();
                $lastName  = $form->get('lastName')->getData();

                return new RegisterUserCommand(new UserId(), $email, $password, $firstName, $lastName);
            }
        ]);
    }
}