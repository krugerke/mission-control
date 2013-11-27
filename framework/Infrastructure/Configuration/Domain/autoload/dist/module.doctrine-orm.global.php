<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'orm_default' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\XmlDriver',
                'cache' =>  'array',
                'paths' => array('./Infrastructure/Persistence/DoctrineORMModule/Mapper')
            ),
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache'     => 'array',
                'driver'             => 'orm_default'
            ),
             'generate_proxies'   => false,
        ),
        'connection' => array(
            'orm_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
                'params' => array(
                    'host'     => 'host',
                    'port'     => '1521',
                    'user'     => 'user',
                    'password' => 'pass',
                    'dbname'   => 'dbname',
                )
            ),
            'orm_not_default' => array(
                'driverClass' => 'Doctrine\DBAL\Driver\OCI8\Driver',
                'params' => array(
                    'host'     => 'host',
                    'port'     => '1521',
                    'user'     => 'user',
                    'password' => 'pass',
                    'dbname'   => 'dbname',
                )
            )
        )
    )
);
