<?php

namespace App\EventSubscriber;

use ApiPlatform\Symfony\EventListener\EventPriorities;
use App\Entity\Movie;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class MovieEventSubscriber implements EventSubscriberInterface
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents(): array
    {
        return [KernelEvents::VIEW => ['getUrlImg', EventPriorities::PRE_SERIALIZE]];
    }

    public function support($class): bool
    {
        return $class instanceof Movie;
    }

    public function getUrlImg(ViewEvent $event)
    {
        $movies = $event->getControllerResult();

        foreach ($movies as $movie) {
            if ($this->support($movie)) {
            }
        }
        dump($event->getControllerResult());exit;
    }

}