<?php

namespace SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntradaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nome')
                ->add('cpf')
                ->add('dataNascimento')
                ->add('telefone')
                ->add('nomeResponsavel')
                ->add('cpfResponsavel')
                ->add('estudaIngles', ChoiceType::class, [
                    'choices' => [
                        'Sim' => true, 
                        'Não' => false
                        ]
                    ])
                ->add('frase')->add('filial');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SiteBundle\Entity\Entrada'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'sitebundle_entrada';
    }


}
