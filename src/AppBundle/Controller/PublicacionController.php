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

class PublicacionController extends Controller{
    
    
    private $session;

    public function _construct() {
        $this->session = new Session();
    }
    
    public function IndexAction(Request $request){
        $em=$this->getDoctrine()->getManager();
        $user = $this->getUser();
        $publication = new Publicacion();
        $form = $this->createForm(PublicationType::class, $publication);
        
        
        $form->handleRequest($request);
        if($form->isSubmitted()){
            if($form->isValid()){
                //cargar imagen
                $file = $form['imagen']->getData();
                
                if(!empty($file) && $file!=null){
                    $ext = $file->guessExtension();
                    
                    if($ext=='jpg'||$ext=='jpeg'||$ext=='png'){
                            $file_name= $user->getIdUsuario().time().".".$ext;
                            $file->move("uploads/publications/images", $file_name);
                            
                            $publication->setImagen($file_name);
                        }else{
                            $publication->setImagen(null);
                        }
                    
                    
                }else{
                    $publication->setImagen(null);
                }
                //cargar documento
                
                $doc = $form['documento']->getData();
                
                if(!empty($doc) && $doc!=null){
                    $ext = $doc->guessExtension();
                    
                    if($ext=='pdf'||$ext=='txt'||$ext=='docx'){
                            $file_name=$user->getIdUsuario().time().'.'.$ext;
                            $doc->move("uploads/publications/documents",$file_name);
                      $publication->setDocumento($file_name); 
                          
                        }else{
                            $publication->setDocumento(null);
                        }
                    
                    
                }else{
                    $publication->setDocumento(null);
                }
                
                $publication->setIdUsuario($user);
                $publication->setFechaCreacion(new \Datetime("now"));
                
                $em->persist($publication);
                $flush = $em->flush();
                
                if($flush==null){
                    $status = "Se ha realizado la publicación correctamente";
                }else{
                    $status = "Error al guardar publicación";
                }
                
                
            }else{
                $status = 'publicación no realizada debido a error de formulario';
            }
            
            
            //$this->session->getFlashBag()->add("estado", $status);
            /*$this->session->getFlashBag()->add(
                    "status",
                    $status);*/
            $this->addFlash(
                    'status',
                    $status);
            return $this->redirectToRoute('home_publications');
        }
        
        
        $publications = $this->getPublications($request);
        
        
        return $this->render('AppBundle:Publicacion:home.html.twig', array(
            'form' => $form->createView(),
            'pagination' =>$publications
        ));
            
       
    }
    
    
    public function infoAction(Request $request){
        return $this->render('AppBundle:Publicacion:creadores.html.twig');
            
       
    }
    
    
    public function getPublications($request){
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        
        $publications_repo = $em->getRepository('BackendBundle:Publicacion');
        $following_repo = $em->getRepository('BackendBundle:Seguidor');
        
        $following = $following_repo->findBy(array('idUsuario' => $user));
        $following_array = array();
        foreach($following as $follow){
            $following_array[] = $follow->getusuarioSeguido();
            
        }
        
        
        $query = $publications_repo->createQueryBuilder('p')
                ->where('p.idUsuario = (:id_usuario) or p.idUsuario in (:following)')
                ->setParameter('id_usuario', $user->getIdUsuario())
                ->setParameter('following', $following_array)
                ->orderBy('p.idPublicacion', 'DESC')
                ->getQuery();
        
        
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
        $query,
                $request->query->getInt('page',1),
                5
                );
        
        return $pagination;
        
        
    }
    
    
    
    public function removePublicationAction(Request $request, $id = null){
        $em = $this->getDoctrine()->getManager();
        $publication_repo = $em->getRepository('BackendBundle:Publicacion');
        $publication = $publication_repo->find($id);
        $user = $this->getUser();
        
        if($user->getIdUsuario()== $publication->getIdUsuario()->getIdUsuario()){
            $em->remove($publication);
        $flush=$em->flush();
        
        if($flush==null){
            $status= 'la publicación fue eliminada';
            
        }else{
            $status= 'no fue posible borrar publicación';
        }
        }else{
            $status= 'no fue posible borrar publicación';   
        }
        
        
       
        return new Response($status);
        
    }
    //put your code here
}
