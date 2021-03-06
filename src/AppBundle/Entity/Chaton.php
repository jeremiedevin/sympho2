<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Chaton
 *
 * @ORM\Table(name="chaton")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChatonRepository")
 */
class Chaton
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
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateNaissance", type="date", nullable=true)
     */
    private $dateNaissance;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=100, nullable=true)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="urlPhoto", type="string", length=255)
     */
    private $urlPhoto;

    /**
     * @var text
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
    
    
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
     * @return Chaton
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
     * Set dateNaissance
     *
     * @param \DateTime $dateNaissance
     *
     * @return Chaton
     */
    public function setDateNaissance($dateNaissance)
    {
        $this->dateNaissance = $dateNaissance;

        return $this;
    }

    /**
     * Get dateNaissance
     *
     * @return \DateTime
     */
    public function getDateNaissance()
    {
        return $this->dateNaissance;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Chaton
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
    }

    /**
     * Set urlPhoto
     *
     * @param string $urlPhoto
     *
     * @return Chaton
     */
    public function setUrlPhoto($urlPhoto)
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    /**
     * Get urlPhoto
     *
     * @return string
     */
    public function getUrlPhoto()
    {
        return $this->urlPhoto;
    }
    
    
    /**
     *
     * @ORM\ManyToMany(targetEntity="Proprietaire",mappedBy="chatons")
     */
    private $proprietaires;
    
    public function __construct() {
        $this->proprietaires = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    
    /** 
     *
     * @ORM\ManyToOne(targetEntity="Maison", inversedBy="chatons")
     * @ORM\JoinColumn(name="id_maison", referencedColumnName="id", nullable=false)
     */
    private $maison; 
    
    

    /**
     * Set maison
     *
     * @param \AppBundle\Entity\Maison $maison
     *
     * @return Chaton
     */
    public function setMaison(\AppBundle\Entity\Maison $maison)
    {
        $this->maison = $maison;

        return $this;
    }

    /**
     * Get maison
     *
     * @return \AppBundle\Entity\Maison
     */
    public function getMaison()
    {
        return $this->maison;
    }

    /**
     * Add proprietaire
     *
     * @param \AppBundle\Entity\Proprietaire $proprietaire
     *
     * @return Chaton
     */
    public function addProprietaire(\AppBundle\Entity\Proprietaire $proprietaire)
    {
        $this->proprietaires[] = $proprietaire;

        return $this;
    }

    /**
     * Remove proprietaire
     *
     * @param \AppBundle\Entity\Proprietaire $proprietaire
     */
    public function removeProprietaire(\AppBundle\Entity\Proprietaire $proprietaire)
    {
        $this->proprietaires->removeElement($proprietaire);
    }

    /**
     * Get proprietaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProprietaires()
    {
        return $this->proprietaires;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Chaton
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
