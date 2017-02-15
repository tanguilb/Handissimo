<?php

/**
 * This file is part of the <name> project.
 *
 * (c) <yourname> <youremail>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * This file has been generated by the Sonata EasyExtends bundle.
 *
 * @link https://sonata-project.org/bundles/easy-extends
 *
 * References :
 *   working with object : http://www.doctrine-project.org/projects/orm/2.0/docs/reference/working-with-objects/en
 *
 * @author <yourname> <youremail>
 */
class User extends BaseUser
{
    /**
     * @var int $id
     */
    protected $id;

    protected $organizationsuser;

    protected $societyUser;

    /**
     * Get id
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * Set organizationsuser
     *
     * @param \HandissimoBundle\Entity\Organizations $organizationsuser
     *
     * @return User
     */
    public function setOrganizationsuser(\HandissimoBundle\Entity\Organizations $organizationsuser = null)
    {
        $this->organizationsuser = $organizationsuser;

        return $this;
    }

    /**
     * Get organizationsuser
     *
     * @return \HandissimoBundle\Entity\Organizations
     */
    public function getOrganizationsuser()
    {
        return $this->organizationsuser;
    }

    /**
     * Set societyUser
     *
     * @param \HandissimoBundle\Entity\Society $societyUser
     *
     * @return User
     */
    public function setSocietyUser(\HandissimoBundle\Entity\Society $societyUser = null)
    {
        $this->societyUser = $societyUser;

        return $this;
    }

    /**
     * Get societyUser
     *
     * @return \HandissimoBundle\Entity\Society
     */
    public function getSocietyUser()
    {
        return $this->societyUser;
    }
    /**
     * @var string
     */
    private $avatar;


    /**
     * Set avatar
     *
     * @param string $avatar
     *
     * @return User
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

        return $this;
    }

    /**
     * Get avatar
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }
}
