<?php
return array(
    'zfcuser' => array(
        // telling ZfcUser to use our own class
        'user_entity_class'       => 'SleepUM\Model\Entity\User',
        // telling ZfcUserDoctrineORM to skip the entities it defines
        'enable_default_entities' => false,
        'enable_user_state' => false,
        'auth_identity_fields' => array('username'),
        'login_redirect_route' => 'loggedin',
     	'use_redirect_parameter_if_present' => true
    )
);
