<?php

namespace ImmersiveLabs\CaraAPI\Service\API;

use Guzzle\Http\Client;

class CameraAPIService extends BaseAPIService
{
    /**
     * @param $accessToken
     * @return array
     */
    public function getAll($accessToken)
    {
        $params = array(
            'access_token' => $accessToken
        );

        $path = $this->getRelativePath('/cameras').'?'.http_build_query($params);

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }

    /**
     * @param $accessToken
     * @param $cameraKey
     * @return array
     */
    public function getByKey($accessToken, $cameraKey)
    {
        $params = array(
            'access_token' => $accessToken
        );

        $path = $this->getRelativePath(sprintf('/cameras/%s', $cameraKey)).'?'.http_build_query($params);

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }

    /**
     * @param $accessToken
     * @param $cameraKey
     * @param null $status
     * @param null $deviceId
     * @param null $cameraPath
     * @param null $displayName
     * @param null $extraDescription
     * @param null $host
     * @return array
     */
    public function update($accessToken, $cameraKey, $deviceId = null, $cameraPath = null, $displayName = null, $extraDescription = null, $host = null)
    {
        $params = array();

        if (!is_null($deviceId)) {
            $params['device_id'] = $deviceId;
        }

        if (!is_null($cameraPath)) {
            $params['camera_path'] = $cameraPath;
        }

        if (!is_null($displayName)) {
            $params['display_name'] = $displayName;
        }

        if (!is_null($extraDescription)) {
            $params['extra_description'] = $extraDescription;
        }

        if (!is_null($host)) {
            $params['host'] = $host;
        }

        $path = $this->getRelativePath(sprintf('/cameras/%s', $cameraKey)).'?'.http_build_query(array('access_token' => $accessToken));

        $client = new Client($this->getBaseUrl());
        $request = $client->put($path);
        $request->addPostFields(http_build_query($params));
        $request->setBody(http_build_query($params));
        return $request->send()->json();
    }
}
