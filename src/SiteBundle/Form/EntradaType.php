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
        $builder->add('nome', null, [
            'label' => 'Nome'
        ])
                ->add('cpf', null, [
            'label' => 'CPF'
        ])
                ->add('dataNascimento', null, [
            'label' => 'Data de Nascimento',
            'widget' => 'single_text',
            'input'  => 'datetime'
        ])
                ->add('telefone', null, [
            'label' => 'Telefone'
        ])
                ->add('nomeResponsavel', null, [
            'label' => 'Nome do Responsável'
        ])
                ->add('cpfResponsavel', null, [
            'label' => 'CPF do Responsável'
        ])
                ->add('estudaIngles', \Symfony\Component\Form\Extension\Core\Type\ChoiceType::class, [
                    'label' => 'Estuda Inglês?',
                    'choices' => [
                        'Sim' => true, 
                        'Não' => false
                        ]
                    ])
                ->add('frase', null, [
            'label' => 'Escreva sua Frase!'
        ])
                ->add('filial', null, [
            'label' => 'Cidade Mais Próxima'
        ]);
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
