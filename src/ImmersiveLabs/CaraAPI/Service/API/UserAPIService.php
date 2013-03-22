<?php

namespace ImmersiveLabs\CaraAPI\Service\API;
use Guzzle\Http\Client;
class UserAPIService extends BaseAPIService
{
    /**
     * @param $accessToken
     * @return array
     */
    public function getInfo($accessToken)
    {
        $path = $this->getRelativePath('/users').'?'.http_build_query(array('access_token' => $accessToken));

        $client = new Client($this->getBaseUrl());
        return $client->get($path)->send()->json();
    }
}
