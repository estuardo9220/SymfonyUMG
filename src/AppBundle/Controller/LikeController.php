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
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Form\PublicationType;
use Symfony\Component\HttpFoundation\Session\Session;
use BackendBundle\Entity\Publicacion;
use BackendBundle\Entity\Usuario;
use BackendBundle\Entity\Like;

class LikeController extends Controller{
    
    
    public function likeAction($id=null){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        $publication_repo = $em->getRepository('BackendBundle:Publicacion');
        $publication = $publication_repo->find($id);
        
        $like = new Like();
        $like->setIdUsuario($user);
        $like->setIdPublicacion($publication);
        
        $em->persist($like);
        $flush = $em->flush();
        
        if($flush==null){
            $status='Te gusta la publicacion';
        }else{
            $status='No se registro el me gusta';
            
        }
        
        return new Response($status);
    }
    
    
    
    //put your code here
}
