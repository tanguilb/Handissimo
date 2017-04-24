<?php

namespace HandissimoBundle\Entity;

/**
 * Test
 */
class Test
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var point
     */
    private $geom;

    /**
     * @var string
     */
    private $tags;


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
     * Set geom
     *
     * @param point $geom
     *
     * @return Test
     */
    public function setGeom($geom)
    {
        $this->geom = $geom;

        return $this;
    }

    /**
     * Get geom
     *
     * @return point
     */
    public function getGeom()
    {
        return $this->geom;
    }

    /**
     * Set tags
     *
     * @param string $tags
     *
     * @return Test
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }
}

