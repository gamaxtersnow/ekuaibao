<?php

namespace eKuaiBao\apiCache;

use eKuaiBao\traits\CacheTrait;
use Psr\SimpleCache\InvalidArgumentException;

abstract class AbstractApiCache
{
    use CacheTrait;
    abstract protected function getCacheKey(): string;
    abstract protected function getTokenFromServer():array;
    abstract protected function refreshServerToken(array $token):array;
    /**
     * @param bool $refresh
     * @return array
     * @throws InvalidArgumentException
     */
    public function get(bool $refresh = false):array
    {
        $key = $this->getCacheKey();
        $token = $this->cache->get($key);
        $token = json_decode($token,true);
        if($refresh) {
            if(!empty($token)){
                $token = $this->refreshServerToken($token + ['expireDate'=>1,'powerCode'=>219904]);
                $this->cache->set($key, json_encode($token), 86400);
            }else{
                $token = $this->getTokenFromServer();
                $this->cache->set($key, json_encode($token), 7100);
            }

        }
        if(empty($token)){
            $token = $this->getTokenFromServer();
            $this->cache->set($key, json_encode($token), 7100);
        }
        return $token;
    }
}
