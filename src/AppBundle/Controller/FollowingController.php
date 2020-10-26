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
use BackendBundle\Entity\Seguidor;
use Symfony\Component\HttpFoundation\Session\Session;

class FollowingController extends Controller {

    private $session;

    public function _construct() {
        $this->session = new Session();
    }
    
    public function followAction(Request $request){
        
        /*echo "hola follow";
        die();*/
        $user = $this->getUser();
        $followed_id = $request->get('followed');
        
        $em = $this->getDoctrine()->getManager();
        
        $user_repo = $em->getRepository('BackendBundle:Usuario');
        $followed = $user_repo->find($followed_id);
        
        $following = new Seguidor();
        $following ->setUser($user);
        $following ->setUsuarioSeguido($followed);
        
        $em->persist($following);
        $flush=$em->flush();
        
        if($flush==null){
            
            $status = "Siguiendo al usuario";
            
        }else{
             $status = "No se ha podido seguir al usuario";
        }
        
        return new Response($status);
    }
  
//   your code here
}

/**
 * Description of UsuarioController
 *
 * @author Esvin
 */
