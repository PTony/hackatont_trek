<?php

namespace HistoriqueBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Historique
 */
class Historique
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var int
     */
    private $distanceTotal;

    /**
     * @var int
     */
    private $badges;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Historique
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set distanceTotal
     *
     * @param integer $distanceTotal
     * @return Historique
     */
    public function setDistanceTotal($distanceTotal)
    {
        $this->distanceTotal = $distanceTotal;

        return $this;
    }

    /**
     * Get distanceTotal
     *
     * @return integer 
     */
    public function getDistanceTotal()
    {
        return $this->distanceTotal;
    }

    /**
     * Set badges
     *
     * @param integer $badges
     * @return Historique
     */
    public function setBadges($badges)
    {
        $this->badges = $badges;

        return $this;
    }

    /**
     * Get badges
     *
     * @return integer 
     */
    public function getBadges()
    {
        return $this->badges;
    }
    /**
     * @var \ParcoursBundle\Entity\Parcours
     */
    private $parcours;

    /**
     * @var \UserBundle\Entity\User
     */
    private $user;


    /**
     * Set parcours
     *
     * @param \ParcoursBundle\Entity\Parcours $parcours
     * @return Historique
     */
    public function setParcours(\ParcoursBundle\Entity\Parcours $parcours = null)
    {
        $this->parcours = $parcours;

        return $this;
    }

    /**
     * Get parcours
     *
     * @return \ParcoursBundle\Entity\Parcours 
     */
    public function getParcours()
    {
        return $this->parcours;
    }

    /**
     * Set user
     *
     * @param \UserBundle\Entity\User $user
     * @return Historique
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
