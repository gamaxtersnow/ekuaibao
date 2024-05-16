<?php
    namespace eKuaiBao\traits;

    use eKuaiBao\http\HttpClientInterface;

    trait HttpClientTrait
    {
    protected $httpClient;
        public function setHttpClient(HttpClientInterface $httpClient): void
        {
            $this->httpClient = $httpClient;
        }
}