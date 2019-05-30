<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\Entrada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller {

    public function indexAction() {
        
        $em = $this->getDoctrine()->getManager();
        
        $entradas = $em->getRepository('SiteBundle:Entrada')->listarTodos();

        return $this->render('@Site/Admin/index.html.twig', [
            'entradas' => $entradas
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
