<?php

namespace ParcoursBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Parcours
 */
class Parcours
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var int
     */
    private $niveau;

    /**
     * @var string
     */
    private $duree;

    /**
     * @var int
     */
    private $distance;

    /**
     * @var string
     */
    private $typeLocomotion;

    /**
     * @var string
     */
    private $lieu;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Parcours
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
     * Set niveau
     *
     * @param integer $niveau
     * @return Parcours
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return integer 
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set duree
     *
     * @param string $duree
     * @return Parcours
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return string 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set distance
     *
     * @param integer $distance
     * @return Parcours
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }

    /**
     * Get distance
     *
     * @return integer 
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Set typeLocomotion
     *
     * @param string $typeLocomotion
     * @return Parcours
     */
    public function setTypeLocomotion($typeLocomotion)
    {
        $this->typeLocomotion = $typeLocomotion;

        return $this;
    }

    /**
     * Get typeLocomotion
     *
     * @return string 
     */
    public function getTypeLocomotion()
    {
        return $this->typeLocomotion;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     * @return Parcours
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string 
     */
    public function getLieu()
    {
        return $this->lieu;
    }
}
