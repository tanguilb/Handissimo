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
     * @var string
     */
    private $userType;


    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->userType;
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


    /**
     * @var boolean
     */
    private $compact;


    /**
     * Set compact
     *
     * @param boolean $compact
     *
     * @return User
     */
    public function setCompact($compact)
    {
        $this->compact = $compact;

        return $this;
    }

    /**
     * Get compact
     *
     * @return boolean
     */
    public function getCompact()
    {
        return $this->compact;
    }
}
