<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6a17d1f4b8a72f67b4570564556eeb9c
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6a17d1f4b8a72f67b4570564556eeb9c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6a17d1f4b8a72f67b4570564556eeb9c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6a17d1f4b8a72f67b4570564556eeb9c::$classMap;

        }, null, ClassLoader::class);
    }
}