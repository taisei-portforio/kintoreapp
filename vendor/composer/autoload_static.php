<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd81e690af96e5f5c9647d0a0949a6d19
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitd81e690af96e5f5c9647d0a0949a6d19::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd81e690af96e5f5c9647d0a0949a6d19::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd81e690af96e5f5c9647d0a0949a6d19::$classMap;

        }, null, ClassLoader::class);
    }
}
