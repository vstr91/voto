<?php

namespace SiteBundle\DataFixtures\ORM;

use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SiteBundle\Entity\Filial;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AppFixtures
 *
 * @author Almir
 */
class AppFixtures extends ORMFixtureInterface {
    
    public function load(ObjectManager $manager)
    {

        for ($i = 1; $i < 15; $i++) {
            $filial = new Filial();
            $filial->setNome('Filial '.$i);
            $filial->setEmail('filial'.$i.'@email.com');
            $filial->setAtivo(true);
            $filial->setDataCadastro(new \Datetime());
            $manager->persist($filial);
        }

        $manager->flush();
    }
    
}
