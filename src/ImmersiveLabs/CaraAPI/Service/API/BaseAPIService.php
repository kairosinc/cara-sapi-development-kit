<?php

namespace ImmersiveLabs\CaraAPI\Service\API;

abstract class BaseAPIService
{
    protected $baseUrl;

    protected $baseRelativePath;

    const BASE_RELATIVE_PATH = '%s/api/v1.0%s';

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param $baseUrl
     * @return BaseAPIService
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @param $endpoint
     * @return string
     */
    public function getRelativePath($endpoint)
    {
        return sprintf(self::BASE_RELATIVE_PATH, $this->getBaseRelativePath(), $endpoint);
    }

    public function getBaseRelativePath()
    {
        return $this->baseRelativePath;
    }

    public function setBaseRelativePath($baseRelativePath)
    {
        $this->baseRelativePath = $baseRelativePath;

        return $this;
    }
}
