<?php

namespace SiteBundle\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Voto
 *
 * @author Almir
 */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Voto
 *
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\Repository\VotoRepository")
 * @ORM\Table(name="voto")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("usuario", message="O usuário já votou.")
 * 
 */
class Voto {
    
    /**
     * @var integer
     *
     * @ORM\Column(name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * 
     */
    protected $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="Entrada")
     * @ORM\JoinColumn(name="entrada", referencedColumnName="id")
     * 
     */
    protected $entrada;
    
    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * 
     */
    protected $usuario;
    
    /**
     * @ORM\Column(type="boolean")
     * 
     */
    protected $ativo = true;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dataCadastro;
    
    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->setDataCadastro(new \DateTime());
        
    }
    

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Voto
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     *
     * @return Voto
     */
    public function setDataCadastro($dataCadastro)
    {
        $this->dataCadastro = $dataCadastro;

        return $this;
    }

    /**
     * Get dataCadastro
     *
     * @return \DateTime
     */
    public function getDataCadastro()
    {
        return $this->dataCadastro;
    }

    /**
     * Set entrada
     *
     * @param \SiteBundle\Entity\Entrada $entrada
     *
     * @return Voto
     */
    public function setEntrada(\SiteBundle\Entity\Entrada $entrada = null)
    {
        $this->entrada = $entrada;

        return $this;
    }

    /**
     * Get entrada
     *
     * @return \SiteBundle\Entity\Entrada
     */
    public function getEntrada()
    {
        return $this->entrada;
    }

    /**
     * Set usuario
     *
     * @param \SiteBundle\Entity\Usuario $usuario
     *
     * @return Voto
     */
    public function setUsuario(\SiteBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \SiteBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}
