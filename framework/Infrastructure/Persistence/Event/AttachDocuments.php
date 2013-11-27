<?php
namespace Persistence\Event;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\OnFlushEventArgs;
use Doctrine\ODM\PHPCR\DocumentManager;
use Doctrine\Common\EventSubscriber;
use ServiceLocatorFactory\ServiceLocatorFactory;

class AttachDocuments implements EventSubscriber {

    protected $dm;

    public function getSubscribedEvents() {
        return array('postLoad','onFlush');
    }

    public function onFlush(OnFlushEventArgs $eventArgs) {

        $em     = $eventArgs->getEntityManager();
        $uow    = $em->getUnitOfWork();

        /** AFTER CREATION OF A NEW SERVICE OBJECT, CREATE A NEW DOCUMENT DIRECTORY IF THERE ARE ANY DOCUMENTS **/
        foreach ($uow->getScheduledEntityInsertions() AS $entity) {

            if($entity instanceof \Interfaces\DocumentManagerAwareInterface) {

                if(!$entity->getDocuments() instanceof \Doctrine\ODM\PHPCR\Document\Folder ) {
                    exit('test');
                }

                $this->dm->persist($entity->getDocuments());
                $this->dm->flush();
            }
        }

        /** AFTER UPDATE OF SERVICE OBJECT. UPDATE DOCUMENTS AS WELL. **/
        foreach ($uow->getScheduledEntityUpdates() AS $entity) {
            if($entity instanceof \Interfaces\DocumentManagerAwareInterface) {
                $this->dm->flush();
            }
        }

        foreach ($uow->getScheduledEntityDeletions() AS $entity) {
            if($entity instanceof \Interfaces\DocumentManagerAwareInterface) {

                $this->dm->flush();
            }
        }
    }

    public function postLoad(LifecycleEventArgs $eventArgs) {

        $entity = $eventArgs->getEntity();

        if($entity instanceof \Interfaces\DocumentManagerAwareInterface) {

            $this->dm = ServiceLocatorFactory::getInstance()->get('Doctrine\ODM\PHPCR\DocumentManager');

            $entity->setDocumentManager($this->dm);

            /* ASK THE DOCUMENT MANAGER FOR THE WHOLE FOLDER OF SERVICE DOCUMENTS */
            $folder = $this->dm->find('Doctrine\ODM\PHPCR\Document\Folder', $entity->getDocumentFolderId());

            $entity->setDocuments($folder);
        }
    }
}
