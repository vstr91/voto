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
 * @UniqueEntity("cpf", message="O usuário com o CPF informado já votou.")
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
     * @ORM\ManyToOne(targetEntity="Frase")
     * @ORM\JoinColumn(name="frase", referencedColumnName="id")
     * 
     */
    protected $frase;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=200, unique=false)
     * @Assert\NotBlank()
     * 
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=200, unique=true)
     * @Assert\NotBlank()
     * 
     */
    private $cpf;
    
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Voto
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     *
     * @return Voto
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get cpf
     *
     * @return string
     */
    public function getCpf()
    {
        return $this->cpf;
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
     * Set frase
     *
     * @param \SiteBundle\Entity\Frase $frase
     *
     * @return Voto
     */
    public function setFrase(\SiteBundle\Entity\Frase $frase = null)
    {
        $this->frase = $frase;

        return $this;
    }

    /**
     * Get frase
     *
     * @return \SiteBundle\Entity\Frase
     */
    public function getFrase()
    {
        return $this->frase;
    }
}
