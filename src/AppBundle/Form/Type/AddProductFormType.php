<?php

namespace AppBundle\Form\Type;

use AppBundle\Product\Command\AddProductCommand;
use AppBundle\Product\Model\ProductId;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class AddProductFormType
 *
 * @author Michał Dobaczewski <mdobak@gmail.com>
 */
class AddProductFormType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class)
            ->add('description', TextareaType::class)
            ->add('price', NumberType::class)
            ->add('currency', ChoiceType::class, [
                'choices' => [
                    'PLN' => 'PLN',
                    'USD' => 'USD',
                    'BTC' => 'BTC'
                ]
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\\Product\\Command\\AddProductCommand',
            'empty_data' => function(FormInterface $form) {
                $name        = $form->get('name')->getData();
                $description = $form->get('description')->getData();
                $price       = $form->get('price')->getData();
                $currency    = $form->get('currency')->getData();

                return new AddProductCommand(new ProductId(), $name, $description, $price, $currency);
            }
        ]);
    }
}