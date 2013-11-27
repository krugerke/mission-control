<?php
/**
 * ZendSentry Global Configuration
 *
 * If you have a ./config/autoload/ directory set up for your project, you can
 * drop this config file in it, remove the .dist extension add your configuration details.
 */
$settings = array(
    /**
     * Turn ZendSentry off or on as a whole package
     */
    'use-module' => true,

    /**
     * Attach a generic logger event listener so you can log custom messages from anywhere in your app
     */
    'attach-log-listener' => true,

    /**
     * Register the Sentry logger as PHP error handler
     */
    'handle-errors' => true,

    /**
     * Should the previously registered error handler be called as well?
     */
    'call-existing-error-handler' => true,

    /**
     * Register Sentry as shutdown error handler
     */
    'handle-shutdown-errors' => true,

    /**
     * Register the Sentry logger as PHP exception handler
     */
    'handle-exceptions' => true,

    /**
     * Should the previously registered exception handler be called as well?
     */
    'call-existing-exception-handler' => true,

    /**
     * Should exceptions be displayed on the screen?
     */
    'display-exceptions' => true,

    /**
     * Should Sentry also log javascript errors?
     */
    'handle-javascript-errors' => true,

    /**
     * Should slow database queries be logged
     * @todo implement
     */
    'log-slow-queries' => false,
);

/**
 * You do not need to edit below this line
 */
return array(
    'zend-sentry' => $settings,
);