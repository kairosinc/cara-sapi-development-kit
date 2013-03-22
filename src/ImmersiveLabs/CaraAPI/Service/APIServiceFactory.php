<?php

namespace ImmersiveLabs\CaraAPI\Service;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Yaml\Yaml;
use ImmersiveLabs\CaraAPI\Service\API\AnalyticsAPIService;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;
use ImmersiveLabs\CaraAPI\Service\API\CameraAPIService;
use ImmersiveLabs\CaraAPI\Service\API\UserAPIService;

class APIServiceFactory
{
    private static $container = null;

    /**
     * @return \Symfony\Component\DependencyInjection\ContainerBuilder
     */
    private static function getContainer()
    {
        if (!self::$container) {
            $parameters = self::getParameters();
            $container = new ContainerBuilder();
            foreach ($parameters as $key => $value) {
                $container->setParameter($key, $value);
            }

            $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../../../../'));
            $loader->load('services.yml');

            $container->compile();

            self::$container = $container;
        }

        return self::$container;
    }

    /**
     * @return array
     */
    private static function getParameters()
    {
        $locator = new FileLocator(__DIR__.'/../../../../');
        $configLoc = $locator->locate('config.yml');

        $config = Yaml::parse($configLoc);
        return $config['parameters'];
    }

    /**
     * @return AnalyticsAPIService
     */
    public static function getAnalyticsAPIService()
    {
        return self::getContainer()->get('analytics_api_service');
    }

    /**
     * @return AuthAPIService
     */
    public static function getAuthAPIService()
    {
        return self::getContainer()->get('auth_api_service');
    }

    /**
     * @return CameraAPIService
     */
    public static function getCameraAPIService()
    {
        return self::getContainer()->get('camera_api_service');
    }

    /**
     * @return UserAPIService
     */
    public static function getUserAPIService()
    {
        return self::getContainer()->get('user_api_service');
    }
}
