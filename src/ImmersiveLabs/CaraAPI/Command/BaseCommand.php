<?php

namespace ImmersiveLabs\CaraAPI\Command;

use ImmersiveLabs\CaraAPI\Model\Impression;
use Symfony\Component\Console\Command\Command;
use ImmersiveLabs\CaraAPI\Service\API\AuthAPIService;
use ImmersiveLabs\CaraAPI\Service\API\AnalyticsAPIService;
use ImmersiveLabs\CaraAPI\Service\API\CameraAPIService;
use ImmersiveLabs\CaraAPI\Service\API\UserAPIService;
use ImmersiveLabs\CaraAPI\Service\APIServiceFactory;

abstract class BaseCommand extends Command
{
    /**
     * @return \ImmersiveLabs\CaraAPI\Service\API\AuthAPIService
     */
    public function getAuthAPIService()
    {
        return APIServiceFactory::getAuthAPIService();
    }

    /**
     * @return \ImmersiveLabs\CaraAPI\Service\API\AnalyticsAPIService
     */
    public function getAnalyticsAPIService()
    {
        return APIServiceFactory::getAnalyticsAPIService();
    }

    /**
     * @return \ImmersiveLabs\CaraAPI\Service\API\CameraAPIService
     */
    public function getCameraAPIService()
    {
        return APIServiceFactory::getCameraAPIService();
    }

    /**
     * @return \ImmersiveLabs\CaraAPI\Service\API\UserAPIService
     */
    public function getUserAPIService()
    {
        return APIServiceFactory::getUserAPIService();
    }

    /**
     * @param array $options
     * @throws \InvalidArgumentException
     */
    protected function checkRequiredOptions($options = array())
    {
        foreach($options as $key => $value) {
            if (is_null($value)) {
                throw new \InvalidArgumentException($key . " is required");
            }
        }
    }

    /**
     * @param array $options
     * @throws \InvalidArgumentException
     */
    protected function checkValidOptions($from, $to, &$gender, &$age)
    {
        if (isset($gender)) {
            $genderOptions = array('male', 'female', 'unknown', null);
            if (!in_array($gender, $genderOptions)) {
                throw new \InvalidArgumentException('Gender value not within the options');
            }

            if (array_key_exists($gender, Impression::$validGenders)) {
                $gender = Impression::$validGenders[$gender];
            } else if (null !== $gender) {
                throw new \InvalidArgumentException('Input gender string is not a valid option');
            }
        }

        if (isset($age)) {
            $ageOptions = array('unknown', 'child', 'young adult', 'adult', 'senior', null);
            if (!in_array($age, $ageOptions)) {
                throw new \InvalidArgumentException('Age value not within the options');
            }

            if (array_key_exists($age, Impression::$validAgeGroups)) {
                $age = Impression::$validAgeGroups[$age];
            } else if (null !== $age) {
                throw new \InvalidArgumentException('Input age string is not a valid option');
            }
        }

        if (isset($options['from'], $options['to']) && $options['to'] < $options['from']) {
            throw new \InvalidArgumentException("To date cannot be earlier than From date");
        }

    }

    protected function validateScopes($scopes = null) {
        if (isset($scopes) && !empty($scopes)) {
            $availableScopes = array('user', 'analytic');
            if(!count(array_intersect($scopes, $availableScopes)) == count($scopes)) {
                throw new \InvalidArgumentException("Invalid or no scopes provided. Please set the scopes to 'user', 'analytic' or a combination of those separated by spaces");
            }
        }
    }
}
