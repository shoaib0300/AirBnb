<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit69089534e29489c0ec34c4a140ec23bb
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'B' => 
        array (
            'Bramus' => 
            array (
                0 => __DIR__ . '/..' . '/bramus/router/src',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit69089534e29489c0ec34c4a140ec23bb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit69089534e29489c0ec34c4a140ec23bb::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit69089534e29489c0ec34c4a140ec23bb::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit69089534e29489c0ec34c4a140ec23bb::$classMap;

        }, null, ClassLoader::class);
    }
}
