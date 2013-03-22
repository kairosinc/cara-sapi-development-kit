<?php

namespace ImmersiveLabs\CaraAPI\Service\API;
use Guzzle\Http\Client;

class AuthAPIService extends BaseAPIService
{
    const SCOPE_USER = 'user';
    const SCOPE_ANALYTIC = 'analytic';
    const GRANT_TYPE = 'http://api.imrsv.com/grant_type/device_app/1.0';

    /**
     * @param $clientId
     * @param $clientSecret
     * @param $username
     * @param $password
     * @param array $scopes
     * @return string
     */
    public function getAccessToken($clientId, $clientSecret, $username, $password, array $scopes)
    {
        $client = new Client($this->getBaseUrl());

        $query = http_build_query(array(
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'grant_type' => self::GRANT_TYPE,
            'scope' => implode(' ', $scopes)
        ));

        $relativePath = '%s%s';

        $path = sprintf($relativePath, $this->getBaseRelativePath(), '/oauth/v2/device').'?'.$query;

        $request = $client->post($path, null, array(
            'username' => $username,
            'password' => $password
        ));

        $responseArray = $request->send()->json();

        return $responseArray['access_token'];
    }
}
