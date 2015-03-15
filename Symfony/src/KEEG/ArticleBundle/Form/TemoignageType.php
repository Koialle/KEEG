<?php

namespace KEEG\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KEEG\WebsiteBundle\Form\ImageType;

class TemoignageType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre',      'text')
            ->add('date',       'date')
            ->add('intervenant','text')
            ->add('accroche',   'textarea')
            ->add('contenu',    'textarea')
            ->add('image',       new ImageType(), array('required' => false))
            ->add('enregistrer','submit')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'KEEG\ArticleBundle\Entity\Temoignage'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'keeg_articlebundle_temoignage';
    }
}
