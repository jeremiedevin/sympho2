<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprietaire
 *
 * @ORM\Table(name="proprietaire")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProprietaireRepository")
 */
class Proprietaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="Prenom", type="string", length=255)
     */
    private $prenom;
    
    /**
     * @var string
     *
     * @ORM\Column(name="Mail", type="string", length=255)
     */
    private $mail;    
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Chaton", inversedBy="maitres")
     * @ORM\JoinTable(name="chatons_proprietaires")
     */
    private $chatons;
    
    
    
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Proprietaire
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Proprietaire
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set mail
     *
     * @param string $mail
     *
     * @return Proprietaire
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->chatons = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add chaton
     *
     * @param \AppBundle\Entity\Chaton $chaton
     *
     * @return Proprietaire
     */
    public function addChaton(\AppBundle\Entity\Chaton $chaton)
    {
        $this->chatons[] = $chaton;

        return $this;
    }

    /**
     * Remove chaton
     *
     * @param \AppBundle\Entity\Chaton $chaton
     */
    public function removeChaton(\AppBundle\Entity\Chaton $chaton)
    {
        $this->chatons->removeElement($chaton);
    }

    /**
     * Get chatons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChatons()
    {
        return $this->chatons;
    }
}
