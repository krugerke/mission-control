<?php
return array(
    'zfctwig' => array(
        'environment_options' => array(
            'debug' => true
        ),
        'extensions' => array(
            'zfctwig' => 'ZfcTwigExtension',
            'dump'    => 'ZfcTwigExtension',
            'twigdebug' => 'Twig_Extensions_Extension_Debug',
			'twigtext'  => 'Twig_Extensions_Extension_Text',
        ),
    ),
);