<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitadfa3aa2d73badf6f54f1a743ab89ca9
{
    public static $files = array (
        'ca09daf1383b4968897974d04a850c75' => __DIR__ . '/../..' . '/system/functions.php',
        '289f74155544dbe235a0f610e6309689' => __DIR__ . '/../..' . '/core/config/database.php',
    );

    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'system\\' => 7,
        ),
        'c' => 
        array (
            'core\\' => 5,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'system\\' => 
        array (
            0 => __DIR__ . '/../..' . '/system',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitadfa3aa2d73badf6f54f1a743ab89ca9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitadfa3aa2d73badf6f54f1a743ab89ca9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
