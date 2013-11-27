<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'zfphpcrodm-xmldriver' => 'Doctrine\ODM\PHPCR\Mapping\Driver\XmlDriver',
                'zfphpcrodm-filelocator' => 'Doctrine\Common\Persistence\Mapping\Driver\DefaultFileLocator'
            ),
            'zfphpcrodm-session' => array(
                'parameters' => array(
                    'workspace' => 'default'
                )
            ),

            'zfphpcrodm-jackrabbittransport' => array(
                'parameters' => array(
                    'serverUri' => 'http://localhost:8080/server',
                ),
            ),
            'zfphpcrodm-credentials' => array(
                'parameters' => array(
                    'userID' => 'admin',
                    'password' => 'admin',
                ),
            ),
            'zfphpcrodm-metadatadriver' => array(
                'injections' => array(
                    'zfphpcrodm-xmldriver'
                ),
            ),
            'zfphpcrodm-xmldriver' => array(
                'parameters' => array(
                    'locator' => 'zfphpcrodm-filelocator'
                ),
            ),
            'zfphpcrodm-filelocator' => array(
                'parameters' => array(
                    'paths' => array('Infrastructure/Persistence/DoctrinePHPCRModule/Mapper'),
                    'fileExtension' => Doctrine\ODM\PHPCR\Mapping\Driver\XmlDriver::DEFAULT_FILE_EXTENSION
                ),
            ),
        ),
    ),
);