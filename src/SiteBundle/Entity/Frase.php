<?php

namespace SiteBundle\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Frase
 *
 * @author Almir
 */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Frase
 *
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\Repository\FraseRepository")
 * @ORM\Table(name="frase")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Frase {
    
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
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=200, unique=false)
     * @Assert\NotBlank()
     * 
     */
    private $autor;
    
    /**
     * @ORM\ManyToOne(targetEntity="Filial")
     * @ORM\JoinColumn(name="filial", referencedColumnName="id")
     * 
     */
    protected $filial;
    
    /**
     * @var string
     *
     * @ORM\Column(name="frase", type="text")
     * @Assert\NotBlank()
     * 
     */
    protected $frase;
    
    /**
     * @ORM\Column(type="boolean")
     * 
     */
    protected $ativo = true;
    
    protected $votos;
    
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
     * Set autor
     *
     * @param string $autor
     *
     * @return Frase
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set frase
     *
     * @param string $frase
     *
     * @return Frase
     */
    public function setFrase($frase)
    {
        $this->frase = $frase;

        return $this;
    }

    /**
     * Get frase
     *
     * @return string
     */
    public function getFrase()
    {
        return $this->frase;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Frase
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
     * @return Frase
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
     * Set filial
     *
     * @param \SiteBundle\Entity\Filial $filial
     *
     * @return Frase
     */
    public function setFilial(\SiteBundle\Entity\Filial $filial = null)
    {
        $this->filial = $filial;

        return $this;
    }

    /**
     * Get filial
     *
     * @return \SiteBundle\Entity\Filial
     */
    public function getFilial()
    {
        return $this->filial;
    }
    
    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Frase
     */
    public function setVotos($votos)
    {
        $this->votos = $votos;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean
     */
    public function getVotos()
    {
        return $this->votos;
    }
    
}
