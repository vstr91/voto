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
        $em = $this->getDoctrine()->getManager();

        $form = $this->createForm(\SiteBundle\Form\EntradaType::class, $entrada, [
            'action' => '/processa-form'
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entrada = $form->getData();

            // testa se CPF ja foi cadastrado
            $ent = $em->getRepository('SiteBundle:Entrada')
                    ->findOneBy(array('cpf' => $entrada->getCpf()));


            if ($ent != null) {
                return new \Symfony\Component\HttpFoundation\Response('O CPF informado já enviou uma frase!');
            }

            // fim teste CPF cadastrado

            // valida CPF
            if(!$this->validaCPF($entrada->getCpf())){
                return new \Symfony\Component\HttpFoundation\Response('O CPF informado é inválido!');
            }
            // fim validacao CPF


            $entrada->setEscolhida(false);

            // salva com quebra de linha
            $entrada->setFrase(nl2br(htmlentities($entrada->getFrase(), ENT_QUOTES, 'UTF-8')));

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($entrada);
            $entityManager->flush();
            
            $filial = $em->getRepository('SiteBundle:Filial')
                    ->findOneBy(array('id' => $entrada->getFilial()));
            
            $this->enviarEmail("Email Frase", $filial->getEmail(), $filial->getEmail(), $entrada);

            return new \Symfony\Component\HttpFoundation\Response('0');
        }

        return new \Symfony\Component\HttpFoundation\Response('Por favor preencha todos os dados solicitados.');
    }

    function validaCPF($cpf = null) {

        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = preg_replace("/[^0-9]/", "", $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }

            return true;
        }
    }

    function enviarEmail($titulo, $remetente, $destinatario, Entrada $entrada){
        $email = \Swift_Message::newInstance()
                        ->setSubject($titulo)
                        ->setFrom($remetente)
                        ->setTo($destinatario)
                        ->setBody($this->renderView('@Site/Component/email.html.twig', 
                                array(
                                    'nome' => $titulo,
                                    'cpf' => $entrada->getCpf(),
                                    'dataNascimento' => $entrada->getDataNascimento(),
                                    'telefone' => $entrada->getTelefone(),
                                    'responsavel' => $entrada->getNomeResponsavel(),
                                    'cpfResponsavel' => $entrada->getCpfResponsavel(),
                                    'estudaIngles' => $entrada->getEstudaIngles() ? "Sim" : "Não",
                                    'frase' => $entrada->getFrase()
                                )
                        ))
                        ->setContentType("text/html");
        
                        //->setBody($form->get('mensagem')->getData());
                $this->get('mailer')->send($email);
    }
    
}
