<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__).DIRECTORY_SEPARATOR."..".DIRECTORY_SEPARATOR."..");

/*** Setup autoloading ***/
require './Infrastructure/System/init/init-autoloader.php';

/**
 * ZendHeadless - Singleton class for holding the currently running application instance.
 */
class ZendInitApplication {
    
    protected static $_Application; 
    
    const APPLICATION_CONFIG = './Infrastructure/Configuration/Domain/application.config.php';
    
    /**
     * init - Singleton method to get the current running instance of the application.
     * 
     * @return Zend\Mvc\Application
     */
    public static function init() {
        if(!isset(ZendInitApplication::$_Application)) {
            return ZendInitApplication::$_Application = Zend\Mvc\Application::init(require self::APPLICATION_CONFIG);
        }
        else return ZendInitApplication::$_Application;
    }
    
    /**
     * getDoctrineOrmEntityManager() - Gets the running Doctrine Entity Manager.
     * 
     * @return Doctrine\ORM\EntityManager
     */
    public static function getDoctrineOrmEntityManager() {
        return ZendInitApplication::init()->getServiceManager()->get('Doctrine\ORM\EntityManager');
    } 
}