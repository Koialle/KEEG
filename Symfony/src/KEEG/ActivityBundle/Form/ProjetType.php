<?php

namespace KEEG\ActivityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KEEG\WebsiteBundle\Form\ImageType;

class ProjetType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',          'text')
            ->add('url',            'url')
            ->add('auteur',         'text')
            ->add('accroche',       'text')
            ->add('description',    'textarea')
            ->add('image',          new ImageType())
            ->add('categories', 'entity', array(
                'class'     => 'KEEGActivityBundle:Categorie',
                'property'  => 'nom',
                'multiple'  => true,
                'expanded'  => true
            ))
            ->add('enregistrer',    'submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KEEG\ActivityBundle\Entity\Projet'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'keeg_activitybundle_projet';
    }
}
