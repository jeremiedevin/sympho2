<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Maison
 *
 * @ORM\Table(name="maison")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MaisonRepository")
 */
class Maison
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
     * @ORM\Column(name="Adresse", type="text", nullable=true)
     */
    private $adresse;


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
     * @return Maison
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
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Maison
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Chaton",mappedBy="maison")
     */
    private $chatons;
    
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
     * @return Maison
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
    /* */

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
