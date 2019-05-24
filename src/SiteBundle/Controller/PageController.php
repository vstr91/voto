<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\Entrada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        $entrada = new Entrada();
        
        $form = $this->createForm(\SiteBundle\Form\EntradaType::class, $entrada, [
            'action' => '/teste'
            ]);
        
        return $this->render('@Site/Page/index.html.twig', [
            "form" => $form->createView()
        ]);
    }
}
