<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/*namespace AppBundle\Twig;

use Symfony\Bridge\Doctrine\RegistryInterface;

class LikedExtension extends \Twig_Extension{
    protected $doctrine;
    
    
    public function _construct(RegistryInterface $doctrine){
        $this->doctrine = $doctrine;
    }
    
    
    public function getFilters() {
        return array(
          new \Twig_SimpleFilter('liked', array($this, 'likedFilter'))  
        );
    }
    
    
    public function likedFilter($user, $publication){
        $like_repo = $this->doctrine->getRepository('BackendBundle:Like');
        $publication_liked = $like_repo->findOneBy(array(
            "id_usuario" => $user,
            "id_publicacion" => $publication
            
        ));
        
        
        if(!empty($publication_liked) && is_object($publication_liked)){
            $result = true;
            
        }else{
            $result = false;
        }
        
        return $result;
        
    }
    
    
    public function getName() {
        return 'liked_extension';
    }
    
}

/**
 * Description of LikedExtension
 *
 * @author Esvin
 */

