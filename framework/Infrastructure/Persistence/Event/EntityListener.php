<?php
namespace Persistence\Event;

use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\Common\EventSubscriber;
use ServiceLocatorFactory\ServiceLocatorFactory;

class EntityListener implements EventSubscriber
{
	protected $sl;

	public function __construct($serviceLocator)
	{
		$this->sl = $serviceLocator;
	}

	public function getSubscribedEvents()
	{
		return array('prePersist', 'preUpdate');
	}


	public function preUpdate(LifecycleEventArgs $eventArgs)
	{
		$entity      = $eventArgs->getEntity();
		$currentUser = $this->sl->get('zfcuser_auth_service')->getIdentity();

 		if ($eventArgs->hasChangedField('updateUser'))
 		{
			$eventArgs->setNewValue('updateUser', $currentUser);
 		}

 		if ($eventArgs->hasChangedField('updateDate'))
 		{
			$eventArgs->setNewValue('updateDate', strtoupper(date('d-M-y')));
		}
	}


	public function prePersist(LifecycleEventArgs $eventArgs)
	{
		$entity      = $eventArgs->getEntity();
		$currentUser = $this->sl->get('zfcuser_auth_service')->getIdentity();

		if (method_exists($entity,'setCreateUser'))
		{
			$user = $entity->getCreateUser();
			if (empty($user))
			{
				$entity->setCreateUser($currentUser);
			}
		}

		if (method_exists($entity,'setUpdateUser'))
		{
			$entity->setUpdateUser($currentUser);
		}

		if (method_exists($entity,'setCreateDate'))
		{
			$date = $entity->getCreateDate();
			if (empty($date))
			{
				$entity->setCreateDate(strtoupper(date('d-M-y')));
			}
		}

		if (method_exists($entity,'setUpdateDate'))
		{
			$entity->setUpdateDate(strtoupper(date('d-M-y')));
		}

		if (method_exists($entity,'setActiveDate'))
		{
			$date = $entity->getActiveDate();
			if (empty($date))
			{
				$entity->setActiveDate(strtoupper(date('d-M-y')));
			}
		}

		if (method_exists($entity,'setInactiveDate'))
		{
			$date = $entity->getInactiveDate();
			if (empty($date))
			{
				$entity->setInactiveDate('31-DEC-99');
			}
		}



	}
}
