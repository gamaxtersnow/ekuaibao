<?php

namespace eKuaiBao\apiCache;

use eKuaiBao\traits\AppKeyTrait;
use eKuaiBao\traits\AppSecurityTrait;
use eKuaiBao\traits\HttpClientTrait;

class Token extends AbstractApiCache
{
    use AppKeyTrait, AppSecurityTrait, HttpClientTrait;

    protected function getCacheKey(): string
    {
        $unique = md5($this->appKey.$this->appSecurityKey);

        return md5('ekb.api.token.' . $unique);
    }

    /**
     * @return array
     */
    protected function getTokenFromServer(): array
    {
        $data = $this->httpClient->postJson('/api/openapi/v1/auth/getAccessToken', ['appKey' => $this->appKey, 'appSecurity' => $this->appSecurityKey]);
        return ['accessToken'=>$data['value']['accessToken']??'','refreshToken'=>$data['value']['refreshToken']??''];
    }
    protected function refreshServerToken(array $token):array {
        $data = $this->httpClient->post('/api/openapi/v2/auth/refreshToken/expireDate', $token);
        return ['accessToken'=>$data['value']['accessToken']??'','refreshToken'=>$data['value']['refreshToken']??''];
    }
}
