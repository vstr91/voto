<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace SiteBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Description of Usuario
 *
 * @author Almir
 */

/**
 * Usuario
 *
 * @ORM\Entity(repositoryClass="SiteBundle\Entity\Repository\UsuarioRepository")
 * @ORM\Table(name="usuario")
 * @ORM\HasLifecycleCallbacks()
 * 
 */
class Usuario extends BaseUser {
    
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
     * @ORM\Column(name="nome", type="string", nullable=true)
     */
    private $nome;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $dataCadastro;
    
    /**
     * @ORM\ManyToOne(targetEntity="Filial")
     * @ORM\JoinColumn(name="filial", referencedColumnName="id")
     * 
     */
    protected $filial;
 
    /**
     * @var string
     *
     * @ORM\Column(name="google_id", type="string", nullable=true)
     */
    private $googleID;
    
    /**
     * @var string
     *
     * @ORM\Column(name="google_access_token", type="string", nullable=true)
     */
    private $googleAccessToken;
    
    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->setDataCadastro(new \DateTime());
        
    }

    /**
     * Set googleID
     *
     * @param string $googleID
     *
     * @return Usuario
     */
    public function setGoogleID($googleID)
    {
        $this->googleID = $googleID;

        return $this;
    }

    /**
     * Get googleID
     *
     * @return string
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }
    
    function getGoogleAccessToken() {
        return $this->googleAccessToken;
    }

    function setGoogleAccessToken($googleAccessToken) {
        $this->googleAccessToken = $googleAccessToken;
    }
    

    /**
     * Set programadoPara
     *
     * @param \DateTime $programadoPara
     *
     * @return Usuario
     */
    public function setProgramadoPara($programadoPara)
    {
        $this->programadoPara = $programadoPara;

        return $this;
    }

    /**
     * Get programadoPara
     *
     * @return \DateTime
     */
    public function getProgramadoPara()
    {
        return $this->programadoPara;
    }
    
    /**
     * Set id
     *
     * @param string $id
     *
     * @return Pais
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
    

    /**
     * Set nome
     *
     * @param string $nome
     *
     * @return Usuario
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
     * Set dataCadastro
     *
     * @param \DateTime $dataCadastro
     *
     * @return Usuario
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
     * Set dataRecebimento
     *
     * @param \DateTime $dataRecebimento
     *
     * @return Usuario
     */
    public function setDataRecebimento($dataRecebimento)
    {
        $this->dataRecebimento = $dataRecebimento;

        return $this;
    }

    /**
     * Get dataRecebimento
     *
     * @return \DateTime
     */
    public function getDataRecebimento()
    {
        return $this->dataRecebimento;
    }

    /**
     * Set ultimaAlteracao
     *
     * @param \DateTime $ultimaAlteracao
     *
     * @return Usuario
     */
    public function setUltimaAlteracao($ultimaAlteracao)
    {
        $this->ultimaAlteracao = $ultimaAlteracao;

        return $this;
    }

    /**
     * Get ultimaAlteracao
     *
     * @return \DateTime
     */
    public function getUltimaAlteracao()
    {
        return $this->ultimaAlteracao;
    }

    /**
     * Set filial
     *
     * @param \SiteBundle\Entity\Filial $filial
     *
     * @return Usuario
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
