<?php

namespace App\EventListener;

use App\Entity\User;
use App\Service\LoggerService;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;
use Monolog\Logger;

class UserListener
{
    /**
     * @var LoggerService
     */
    private $loggerService;

    /**
     * @param LoggerService $loggerService
     */
    public function __construct(LoggerService $loggerService)
    {
        $this->loggerService = $loggerService;
    }

    /**
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [ Events::prePersist, Events::preUpdate ];
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Exception
     */
    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (true === property_exists($entity, 'created') && $entity instanceof User) {
            $entity->setCreated(new \DateTime());
        }
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Exception
     */
    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        if (true === property_exists($entity, 'updated') && $entity instanceof User) {
            $entity->setUpdated(new \DateTime());

            $this->loggerService->log(LoggerService::LEVEL_INFO,"Log : " . $entity->getUpdated()->format("d/m/Y H:i") . " - Id : " . $entity->getId() . " - Firstname : " . $entity->getFirstname() . " - Lastname : " . $entity->getLastname());
        }
    }
}
