<?php

namespace eKuaiBao\traits;

trait AppKeyTrait
{
    /**
     * @var string
     */
    protected $appKey;
    public function setAppKey(string $appKey): void
    {
        $this->appKey = $appKey;
    }
}
