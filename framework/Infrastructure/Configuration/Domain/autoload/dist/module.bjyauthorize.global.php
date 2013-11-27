<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'bjyauthorize' => array(
        // Using the authentication identity provider, which basically reads the roles from the auth service's identity
        'identity_provider' => 'BjyAuthorize\Provider\Identity\AuthenticationIdentityProvider',

        'role_providers'        => array(
            // using an object repository (entity repository) to load all roles into our ACL
            'BjyAuthorize\Provider\Role\ObjectRepositoryProvider' => array(
                'object_manager'    => 'doctrine.entitymanager.orm_default',
                'role_entity_class' => 'Persistence\Model\Entity\User\Role',
             ),
        ),
		'resource_providers' => array(
			'BjyAuthorize\Provider\Resource\Config' => array(
				'reports' => array(),
			),
		),
		'rules_providers' => array(
			'BjyAuthorize\Provider\Rule\Config' => array(
				'allow' => array(
					array(array('Reporters'), 'reports', 'view'),
				),
			),
		),
    )
);
