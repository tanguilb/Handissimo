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
}

