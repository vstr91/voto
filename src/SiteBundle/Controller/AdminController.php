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
        
        $filial = "";
        
        if($user->getRoles()[0] == 'ROLE_SUPER_ADMIN'){
            $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodos();
        } else{
            $filial = $em->getRepository('SiteBundle:Filial')->findOneBy(array('id' => $user->getFilial()->getId()));
            $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodosPorFilial($filial->getSlug());
        }

        return $this->render('@Site/Admin/index.html.twig', [
            'entradas' => $entradas,
            'filial' => $filial
        ]);
    }
    
    public function indexFilialAction($filial) {
        
        $em = $this->getDoctrine()->getManager();
        
        $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodosPorFilial($filial);

        return $this->render('@Site/Admin/index.html.twig', [
            'entradas' => $entradas
        ]);
    }

}
