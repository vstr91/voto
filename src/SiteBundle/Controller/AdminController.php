<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\Entrada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) ){
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
        }
//        
//        $filial = "";
//        
//        if($user->getRoles()[0] == 'ROLE_SUPER_ADMIN'){
//            $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodos();
//        } /*else if($user->getRoles()[0] == 'ROLE_USER'){
////            $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodos();
////            return $this->render('@Site/Page/voto.html.twig', [
////                'entradas' => $entradas,
////                'user' => $user
////            ]);
//        }*/ else{
//            $filial = $em->getRepository('SiteBundle:Filial')->findOneBy(array('id' => $user->getFilial()->getId()));
//            $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodosPorFilial($filial->getSlug());
//        }

        $frases = $em->getRepository('SiteBundle:Frase')->listarTodosComVotos();
        
        return $this->render('@Site/Admin/votos.html.twig', [
            'frases' => $frases,
            'usuario' => $user
        ]);
    }
    
    public function indexFilialAction($filial) {
        
        $em = $this->getDoctrine()->getManager();
        
        $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodosPorFilial($filial);

        return $this->render('@Site/Admin/index.html.twig', [
            'entradas' => $entradas
        ]);
    }
    
    public function carregaVotosAction($frase) {
        
        $em = $this->getDoctrine()->getManager();
        
        $votos = $em->getRepository('SiteBundle:Voto')->listarTodosPorFrase($frase);

        return $this->render('@Site/Admin/tabela-votos.html.twig', [
            'votos' => $votos
        ]);
    }
    
    public function listaCorridaAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) ){
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
        }
        
        $votos = $em->getRepository('SiteBundle:Voto')->listarTodosAgrupadoPorFrase();
        
        dump($votos);

        return $this->render('@Site/Admin/lista-corrida.html.twig', [
            'votos' => $votos,
            'usuario' => $user
        ]);
    }

}
