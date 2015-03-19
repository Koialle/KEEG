<?php

namespace KEEG\ArticleBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use KEEG\WebsiteBundle\Form\ImageType;

/*class ArticleRechercherForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {        
        $builder->add('motcle', 'text', array('label' => 'Mot-clé  '));
    }
    
    public function getName()
    {        
        return 'articlerecherche';
    }
}
