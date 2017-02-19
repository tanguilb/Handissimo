<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 18/02/17
 * Time: 16:51
 */
namespace  HandissimoBundle\EventListener;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use HandissimoBundle\Entity\Organizations;

class StatutListener extends AbstractAdmin
{
    protected $statut;

    public function resetStatut()
    {
        $securityContext = $this->getConfigurationPool()->getContainer()->get('security.authorization_checker');
        if (!$securityContext->isGranted('ROLE_SUPER_ADMIN')){

        }
    }
}