<?php

namespace SiteBundle\Entity;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entrada
 *
 * @author Almir
 */

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Entrada
 *
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\Repository\EntradaRepository")
 * @ORM\Table(name="entrada")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Entrada {
    
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
     * @ORM\Column(name="nome", type="string", length=200, unique=true)
     * @Assert\NotBlank()
     * 
     */
    private $nome;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=20)
     * @Assert\NotBlank()
     * 
     */
    private $cpf;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dataNascimento;
    
    /**
     * @var string
     *
     * @ORM\Column(name="telefone", type="string", length=20)
     * @Assert\NotBlank()
     * 
     */
    private $telefone;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomeResponsavel", type="string", length=200)
     * @Assert\NotBlank()
     * 
     */
    private $nomeResponsavel;
    
    /**
     * @var string
     *
     * @ORM\Column(name="cpfResponsavel", type="string", length=20)
     * @Assert\NotBlank()
     * 
     */
    private $cpfResponsavel;
    
    /**
     * @ORM\ManyToOne(targetEntity="Filial")
     * @ORM\JoinColumn(name="filial", referencedColumnName="id")
     * 
     */
    protected $filial;
    
    /**
     * @ORM\Column(name="estudaIngles", type="boolean")
     * 
     */
    protected $estudaIngles;
    
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
    protected $escolhida;
    
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
     * Set nome
     *
     * @param string $nome
     *
     * @return Entrada
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
     * @return Entrada
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
     * Set dataNascimento
     *
     * @param \DateTime $dataNascimento
     *
     * @return Entrada
     */
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;

        return $this;
    }

    /**
     * Get dataNascimento
     *
     * @return \DateTime
     */
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }

    /**
     * Set telefone
     *
     * @param string $telefone
     *
     * @return Entrada
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get telefone
     *
     * @return string
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set nomeResponsavel
     *
     * @param string $nomeResponsavel
     *
     * @return Entrada
     */
    public function setNomeResponsavel($nomeResponsavel)
    {
        $this->nomeResponsavel = $nomeResponsavel;

        return $this;
    }

    /**
     * Get nomeResponsavel
     *
     * @return string
     */
    public function getNomeResponsavel()
    {
        return $this->nomeResponsavel;
    }

    /**
     * Set cpfResponsavel
     *
     * @param string $cpfResponsavel
     *
     * @return Entrada
     */
    public function setCpfResponsavel($cpfResponsavel)
    {
        $this->cpfResponsavel = $cpfResponsavel;

        return $this;
    }

    /**
     * Get cpfResponsavel
     *
     * @return string
     */
    public function getCpfResponsavel()
    {
        return $this->cpfResponsavel;
    }

    /**
     * Set estudaIngles
     *
     * @param boolean $estudaIngles
     *
     * @return Entrada
     */
    public function setEstudaIngles($estudaIngles)
    {
        $this->estudaIngles = $estudaIngles;

        return $this;
    }

    /**
     * Get estudaIngles
     *
     * @return boolean
     */
    public function getEstudaIngles()
    {
        return $this->estudaIngles;
    }

    /**
     * Set frase
     *
     * @param string $frase
     *
     * @return Entrada
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
     * Set escolhida
     *
     * @param boolean $escolhida
     *
     * @return Entrada
     */
    public function setEscolhida($escolhida)
    {
        $this->escolhida = $escolhida;

        return $this;
    }

    /**
     * Get escolhida
     *
     * @return boolean
     */
    public function getEscolhida()
    {
        return $this->escolhida;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     *
     * @return Entrada
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
     * @return Entrada
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
     * @return Entrada
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
}
