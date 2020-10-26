<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BackendBundle\Entity\Usuario;
use AppBundle\Form\RegisterType;
use AppBundle\Form\EditType;
use Symfony\Component\HttpFoundation\Session\Session;

class UsuarioController extends Controller {

    private $session;

    public function _construct() {
        $this->session = new Session();
    }

    public function loginAction(Request $request) {

        if (is_object($this->getUser())) {
            return $this->redirect('home');
        }

        $authentication = $this->get('security.authentication_utils');
        $error = $authentication->getLastAuthenticationError();
        $lastUsername = $authentication->getLastUsername();


        return $this->render('AppBundle:Usuario:login.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error
        ));
        /*         * echo ("hola");
          die(); */
    }

    public function registerAction(Request $request) {

        if (is_object($this->getUser())) {
            return $this->redirect('home');
        }

        $usuario = new Usuario();
        $form = $this->createForm(RegisterType::class, $usuario);


        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                //$user_repo= $em->getRepository("BackBundle:Usuario");
                $query = $em->createQuery('SELECT u FROM BackendBundle:Usuario u WHERE u.email=:email OR u.alias=:alias')
                        ->setParameter('email', $form->get("email")->getData())
                        ->setParameter('alias', $form->get("alias")->getData());

                $user_isset = $query->getResult();

                if (count($user_isset) == 0) {
                    $factory = $this->get("security.encoder_factory");
                    $encoder = $factory->getEncoder($usuario);
                    $password = $encoder->encodePassword($form->get("password")->getData(), $usuario->getSalt());

                    $usuario->setPassword($password);
                    $usuario->setRol("USUARIO");
                    $usuario->setImagen(null);

                    $em->persist($usuario);
                    $flush = $em->flush();

                    if ($flush == null) {
                        $status = "registrado correctamente";
                        $this->addFlash(
                                'status',
                                $status);
                        return $this->redirect("login");
                    } else {
                        $status = "El usuario ya existe";
                    }
                } else {
                    $status = "el usuario ya existe";
                }
            } else {
                $status = "No se registro correctamente!! ";
            }

            $this->addFlash(
                    'status',
                    $status);
        }
        /* if($form->isSubmitted()){
          if($form->isValid()){
          $em=$this->getDoctrine()->getManager();

          $query=$em->createQuery('Select u From BackendBundle:Usuario where u.email = :email or u.alias=:alias')
          ->setParameter('email',$form->get("email")->getData())
          ->setParameter('alias',$form->get("alias")->getData());

          $user_isset = $query->getResult();

          if(($usuario->getEmail()==$user_isset->getEmail() && $usuario->getAlias()==$user_isset->getAlias)) || count($user_isset==0){

          }
          }
          }* */

        return $this->render('AppBundle:Usuario:register.html.twig', array(
                    "form" => $form->createView()
        ));
        /*         * echo ("hola");
          die(); */
    }

    /* public function editUserAction(Request $request){
      echo "funcion";
      die();
      } */

    public function userEditAction(Request $request) {

        $user = $this->getUser();
        //$user_imagen=$user->getImagen();
        $form = $this->createForm(EditType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                //$user_repo= $em->getRepository("BackBundle:Usuario");
                $query = $em->createQuery('SELECT u FROM BackendBundle:Usuario u WHERE u.email=:email OR u.alias=:alias')
                        ->setParameter('email', $form->get("email")->getData())
                        ->setParameter('alias', $form->get("alias")->getData());

                $user_isset = $query->getResult();

                if ((count($user_isset) == 0 || $user->getEmail() == $user_isset[0]->getEmail() && $user->getAlias() == $user_isset[0]->getAlias())) {

                    $file = $form["imagen"]->getData();
                    if (!empty($file) && $file != null) {
                        $ext=$file->guessExtension();
                        if($ext=='jpg'||$ext=='jpeg'||$ext=='png'){
                            $file_name=$user->getIdUsuario().time().'.'.$ext;
                            $file->move("uploads/users",$file_name);
                            
                            $user->setImagen($file_name);
                        }
                        
                    } else {
                        $user->SetImagen($user_imagen);
                    }

                   

                    $em->persist($user);
                    $flush = $em->flush();

                    if ($flush == null) {
                        $status = "Actualizado correctamente";
                    } else {
                        $status = "No se ha actualizado";
                    }
                } else {
                    $status = "el usuario ya existe";
                }
            } else {
                $status = "No se actualizado correctamente!! ";
            }

            $this->addFlash(
                    'status',
                    $status);
            return $this->redirect('my-data');
        }




        return $this->render('AppBundle:Usuario:editar.html.twig', array(
                    "form" => $form->createView()
        ));
    }
    
    
    public function usersAction(Request $request){

$em = $this->getDoctrine()->getManager();

$dql = "SELECT u FROM BackendBundle:Usuario u ORDER BY u.idUsuario ASC";
$query = $em->createQuery($dql);

$paginator = $this->get('knp_paginator');
$pagination = $paginator->paginate(
$query, $request->query->getInt('page', 1), 5);

return $this->render('AppBundle:Usuario:users.html.twig', array(
'pagination'=> $pagination
));

}


public function searchAction(Request $request){

$em = $this->getDoctrine()->getManager();

$search=trim($request->query->get("search",null));
if($search==null){
    return $this->redirect($this->generateUrl('home_publications'));
}


$dql = "SELECT u FROM BackendBundle:Usuario u " 
       . "where u.nombre LIKE :search OR  u.apellido LIKE :search "
       . "OR u.alias LIKE :search ORDER BY u.idUsuario ASC";
    $query = $em->createQuery($dql)->setParameter('search',"%$search%");

    $paginator = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
    $query, $request->query->getInt('page', 1), 5);

    return $this->render('AppBundle:Usuario:users.html.twig', array(
    'pagination'=> $pagination
));

}







    //put
    //
    // 
    //   your code here
}

/**
 * Description of UsuarioController
 *
 * @author Esvin
 */
