<?php

namespace KEEG\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KEEG\WebsiteBundle\Form\ImageType;

class TemoignageEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->remove('date')
            ->remove('intervenant')
        ;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'keeg_articlebundle_temoignage_edit';
    }

    public function getParent()
    {
        return new TemoignageType();
    }
}
