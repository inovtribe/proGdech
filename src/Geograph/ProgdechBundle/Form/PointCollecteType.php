<?php

namespace Geograph\ProgdechBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PointCollecteType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('reference',  'text')
            ->add('nom',        'text')
            ->add('adresse',    'text')
            ->add('commune',    'entity', array(
                'class'     => 'GeographProgdechBundle:Commune',
                'property'  => 'nom',
                'query_builder' => function (\Geograph\ProgdechBundle\Repository\CommuneRepository $r){
                    return $r->getSelectList();
                },
                'multiple'  => false,
                'expanded'  => false
            ))
            ->add('latitude',   'text')
            ->add('longitude',  'text')
            ->add('emplacement','text')
            ->add('date',       'date')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Geograph\ProgdechBundle\Entity\PointCollecte'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'geograph_progdechbundle_pointcollecte';
    }
}
