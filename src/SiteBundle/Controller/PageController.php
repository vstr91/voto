<?php

namespace SiteBundle\Controller;

use SiteBundle\Entity\Entrada;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller {

    public function indexAction() {
        $entrada = new Entrada();

        $form = $this->createForm(\SiteBundle\Form\EntradaType::class, $entrada, [
            'action' => '/processa-form'
        ]);

        return $this->render('@Site/Page/index.html.twig', [
                    "form" => $form->createView()
        ]);
    }

    public function processaFormAction(\Symfony\Component\HttpFoundation\Request $request) {

        $entrada = new Entrada();
        
//        $dataNascimento = $request->get('sitebundle_entrada')['dataNascimento'];
//        
//        $req = $request->request->all();
//        $req['sitebundle_entrada']['dataNascimento'] = date_create_from_format('d/m/Y', $dataNascimento)->format('Y-m-d');
//        
//        $request->request->replace($req);
        
        $form = $this->createForm(\SiteBundle\Form\EntradaType::class, $entrada, [
            'action' => '/processa-form'
        ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $entrada = $form->getData();
            
            $entrada->setEscolhida(false);
            
            // salva com quebra de linha
            $entrada->setFrase(nl2br(htmlentities($entrada->getFrase(), ENT_QUOTES, 'UTF-8')));

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $entityManager = $this->getDoctrine()->getManager();
             $entityManager->persist($entrada);
             $entityManager->flush();

            return new \Symfony\Component\HttpFoundation\Response('ok');
        }

        return new \Symfony\Component\HttpFoundation\Response('erro');
    }

}
