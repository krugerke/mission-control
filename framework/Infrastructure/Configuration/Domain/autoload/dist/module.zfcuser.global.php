<?php
return array(
    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'Persistence\Model\Entity\User',
        'auth_identity_fields' => array('username'),
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
        'login_redirect_route' => 'default',
     	'use_redirect_parameter_if_present' => true
    )
);
