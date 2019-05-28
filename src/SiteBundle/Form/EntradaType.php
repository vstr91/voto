<?php

namespace SiteBundle\Form;

use Doctrine\ORM\EntityRepository;
use SiteBundle\Entity\Filial;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
            'label' => 'CPF',
            'attr' => [
                'class' => 'cpf'
            ]
        ])
                ->add('dataNascimento', null, [
            'label' => 'Data de Nascimento',
            'attr' => [
                'class' => 'datepicker'
            ]
        ])
                ->add('telefone', null, [
            'label' => 'Telefone',
            'attr' => [
                'class' => 'telefone'
            ]
        ])
                ->add('nomeResponsavel', null, [
            'label' => 'Nome do Responsável'
        ])
                ->add('cpfResponsavel', null, [
            'label' => 'CPF do Responsável',
            'attr' => [
                'class' => 'cpf'
            ]
        ])
                ->add('estudaIngles', ChoiceType::class, [
                    'label' => 'Estuda Inglês?',
                    'choices' => [
                        'Estuda Inglês?' => null,
                        'Sim' => true, 
                        'Não' => false
                        ]
                    ])
                ->add('frase', null, [
            'label' => 'O que você faria para ganhar um intercâmbio para Toronto?',
            'attr' => [
                'rows' => 5
            ]
        ])
                ->add('filial', EntityType::class, [
            'label' => 'Cidade Mais Próxima',
            'class' => Filial::class,
            'query_builder' => function (EntityRepository $er) {
                return $er->createQueryBuilder('f')
                    ->orderBy('f.id', 'ASC');
            },
            'choice_label' => 'nome'
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
