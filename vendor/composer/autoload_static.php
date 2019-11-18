<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita759005fa5270b51eb94bffbbd198a6c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita759005fa5270b51eb94bffbbd198a6c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita759005fa5270b51eb94bffbbd198a6c::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
