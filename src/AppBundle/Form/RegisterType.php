<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


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
class RegisterType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        
        $builder
               
        ->add('nombre', TextType::class,array(
            'label'=>'Nombre',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-name form-control'
            )
        ))
        ->add('apellido',TextType::class,array(
            'label'=>'Apellido',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-apellido form-control'
            )
        ))
        ->add('alias',TextType::class,array(
            'label'=>'Alias',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-alias form-control alias-input'
            )
        ))
             
        ->add('email',EmailType::class,array(
            'label'=>'Correo',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-correo form-control'
            )
        ))
        ->add('password',PasswordType::class,array(
            'label'=>'Contraseña',
            'required'=>'required',
            'attr'=>array(
                'class'=> 'form-Contraseña form-control'
            )
        ))
        ->add('Registrarse', SubmitType::class,array(
            "attr" => array(
                "class" => "form-submit btn btn-success"
            )
        ))        ;
               
    }
    
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
        'data_class' => 'BackendBundle\Entity\Usuario'
        ));
    }
    //put your code here
}
