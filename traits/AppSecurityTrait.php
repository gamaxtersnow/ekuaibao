<?php

namespace eKuaiBao\traits;

trait AppSecurityTrait
{
    /**
     * @var string
     */
    protected $appSecurityKey;
    public function setAppSecurityKey(string $appSecurityKey): void
    {
        $this->appSecurityKey = $appSecurityKey;
    }
}
