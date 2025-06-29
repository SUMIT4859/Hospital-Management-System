<?php
/**
 * PHPMailer SPL autoloader.
 * PHP Version 5+
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 */

/**
 * PHPMailer SPL autoloader.
 * @param string $classname The name of the class to load
 */
function PHPMailerAutoload($classname)
{
    $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class.' . strtolower($classname) . '.php';
    if (is_readable($filename)) {
        require $filename;
    }
}

// Register the autoloader if PHP version supports it.
if (version_compare(PHP_VERSION, '5.1.2', '>=')) {
    spl_autoload_register('PHPMailerAutoload', true, true);
}
