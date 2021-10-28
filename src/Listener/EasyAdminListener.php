<?php
/**
 * Author Maxamadjonov Jaxongir.
 * https://github.com/jtscorpjaxon
 * Date: 28.10.2021
 * Time: 14:59
 */

namespace App\Listener;

use App\Entity\ProductAttributes;
use App\Entity\ProductAttributeValues;
use App\Entity\Products;
use App\Entity\ProductVariations;
use Doctrine\ORM\EntityManagerInterface;

use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\AfterEntityUpdatedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeCrudActionEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityDeletedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;


class EasyAdminListener implements EventSubscriberInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeCrudActionEvent::class => ['ProductBeforeAction'],
            BeforeEntityPersistedEvent::class => ['ProductBeforePersist'],
            BeforeEntityUpdatedEvent::class => ['ProductBeforeUpdate'],
            BeforeEntityDeletedEvent::class => ['ProductBeforeDelete'],
        ];
    }

    public function ProductBeforePersist(BeforeEntityPersistedEvent $event): void
    {

        $entity = $event->getEntityInstance();
        if (!($entity instanceof Products)) {
            return;
        }
            $entity->setMaxPrice(5);
            $entity->setMinPrice(5);
            $this->entityManager->persist($entity);



    }

    public function ProductBeforeAction(BeforeCrudActionEvent $event)
    {
        $entity = $event->getAdminContext();
        if (!($entity instanceof ProductVariations)) {
            return;
        }
        dd($entity);
}
    public function ProductBeforeUpdate(BeforeEntityUpdatedEvent $event): void
    {

    }

    public function ProductBeforeDelete(BeforeEntityDeletedEvent $event): void
    {

    }
}