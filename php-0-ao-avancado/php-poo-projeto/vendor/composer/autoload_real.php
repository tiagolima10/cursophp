<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitbd19b44c1333b5b922ef6d404829e94c
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitbd19b44c1333b5b922ef6d404829e94c', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitbd19b44c1333b5b922ef6d404829e94c', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitbd19b44c1333b5b922ef6d404829e94c::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
