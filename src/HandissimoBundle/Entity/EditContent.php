<?php

namespace HandissimoBundle\Entity;

/**
 * EditContent
 */
class EditContent
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $howToUse;

    /**
     * @var string
     */
    private $home;


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
     * Set howToUse
     *
     * @param string $howToUse
     *
     * @return EditContent
     */
    public function setHowToUse($howToUse)
    {
        $this->howToUse = $howToUse;

        return $this;
    }

    /**
     * Get howToUse
     *
     * @return string
     */
    public function getHowToUse()
    {
        return $this->howToUse;
    }

    /**
     * Set home
     *
     * @param string $home
     *
     * @return EditContent
     */
    public function setHome($home)
    {
        $this->home = $home;

        return $this;
    }

    /**
     * Get home
     *
     * @return string
     */
    public function getHome()
    {
        return $this->home;
    }
    /**
     * @var string
     */
    private $howToHelpUs;


    /**
     * Set howToHelpUs
     *
     * @param string $howToHelpUs
     *
     * @return EditContent
     */
    public function setHowToHelpUs($howToHelpUs)
    {
        $this->howToHelpUs = $howToHelpUs;

        return $this;
    }

    /**
     * Get howToHelpUs
     *
     * @return string
     */
    public function getHowToHelpUs()
    {
        return $this->howToHelpUs;
    }
    /**
     * @var string
     */
    private $whoAreWe;


    /**
     * Set whoAreWe
     *
     * @param string $whoAreWe
     *
     * @return EditContent
     */
    public function setWhoAreWe($whoAreWe)
    {
        $this->whoAreWe = $whoAreWe;

        return $this;
    }

    /**
     * Get whoAreWe
     *
     * @return string
     */
    public function getWhoAreWe()
    {
        return $this->whoAreWe;
    }
}
