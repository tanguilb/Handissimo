<?php

namespace HandissimoBundle\Services\Recorder;

use Doctrine\ORM\EntityManager;
use HandissimoBundle\Entity\UserSearch;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SearchRecorder
{
    //protected $requestStack;
    protected $em;
    protected $session;

    public function __construct(/*RequestStack $requestStack,*/ EntityManager $em, Session $session)
    {
        //$this->requestStack = $requestStack;
        $this->session = $session;
        $this->em = $em;
    }

    public function recordSearchUser($session)
    {
        //$request = $this->requestStack->getCurrentRequest();
        $userSearch = new UserSearch();
        $userSearch->setLocation($session->get('location'));
        $userSearch->setAge($session->get('age'));
        $userSearch->setNeed($session->get('need'));
        $userSearch->setDisability($session->get('disability')->getDisabilityName());
        $userSearch->setStructure($session->get('structure')->getName());
        $this->em->persist($userSearch);
        $this->em->flush();
    }

}