<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserForm
 *
 * @author Esvin
 */
class PublicationType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
                
                ->add('texto', TextareaType::class,array(
            'label'=>'Publicar Mensaje',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-control'
            )
        ))
                
        ->add('imagen', FileType::class,array(
            'label'=>'Publicar Fotografia',
            'required'=>false,
                    'data_class' =>null,
            'attr'=>array(
                'class'=> 'form-control'
            )
        ))
                
                
         ->add('documento', FileType::class,array(
            'label'=>'Documento',
            'required'=>false,
            'data_class' =>null,
            'attr'=>array(
                'class'=> 'form-control'
            )
        ))
               
        ->add('Publicar', SubmitType::class,array(
            "attr" => array(
                "class" => "btn btn-success"
            )
        ));
               
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'BackendBundle\Entity\Publicacion'
        ));
    }
    //put your code here
}
