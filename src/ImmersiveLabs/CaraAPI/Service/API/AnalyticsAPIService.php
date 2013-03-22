<?php

namespace ImmersiveLabs\CaraAPI\Service\API;
use Guzzle\Http\Client;

class AnalyticsAPIService extends BaseAPIService
{
    /**
     * @param $accessToken
     * @param $cameraKey
     * @param \DateTime $from
     * @param \DateTime $to
     * @param null $age
     * @param null $gender
     * @param null $page
     * @return array
     */
    public function getRaw($accessToken, $cameraKey, \DateTime $from = null, \DateTime $to = null, $age = null, $gender = null, $page = null)
    {
        $params = array(
            'access_token' => $accessToken,
            'camera_key' => $cameraKey
        );

        if (!is_null($from)) {
            $params['from'] = $from->format('Y-m-d H:i:s');
        }

        if (!is_null($to)) {
            $params['to'] = $to->format('Y-m-d H:i:s');
        }

        if (!is_null($age)) {
            $params['age'] = $age;
        }

        if (!is_null($gender)) {
            $params['gender'] = $gender;
        }

        if (!is_null($page)) {
            $params['page'] = $page;
        }

        $path = $this->getRelativePath('/analytics').'?'.http_build_query($params);

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }

    /**
     * @param $accessToken
     * @param $cameraKey
     * @param \DateTime $from
     * @param \DateTime $to
     * @param null $age
     * @param null $gender
     * @return array
     */
    public function getAverages($accessToken, $cameraKey, \DateTime $from, \DateTime $to, $age = null, $gender = null)
    {
        $params = array(
            'access_token' => $accessToken,
            'camera_key' => $cameraKey,
            'from' => $from->format('Y-m-d H:i:s'),
            'to' => $to->format('Y-m-d H:i:s')
        );

        if (!is_null($age)) {
            $params['age'] = $age;
        }

        if (!is_null($gender)) {
            $params['gender'] = $gender;
        }

        $path = $this->getRelativePath('/analytics/averages').'?'.http_build_query($params);

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }

    /**
     * @param $accessToken
     * @param $cameraKey
     * @param \DateTime $from
     * @param \DateTime $to
     * @param $gender
     * @param $age
     * @return array
     */
    public function getTotals($accessToken, $cameraKey, \DateTime $from, \DateTime $to, $gender = null, $age = null)
    {
        $params = array(
            'access_token' => $accessToken,
            'camera_key' => $cameraKey,
            'from' => $from->format('Y-m-d H:i:s'),
            'to' => $to->format('Y-m-d H:i:s'),
            'gender' => $gender,
            'age' => $age
        );

        $path = $this->getRelativePath('/analytics/totals').'?'.http_build_query($params);

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }
}
