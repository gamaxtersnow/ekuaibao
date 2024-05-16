<?php

namespace EKuaiBao\Think;

use EKuaiBao\App;
use think\Service;

class EKuaiBaoService extends Service
{
    public function register()
    {
        $config = config('ekuaibao');
        if(empty($config)) {
            $config = require __DIR__.'/config.php';
        }
        $this->app->bind('ekuaibao',new App($config));
    }

    public function boot()
    {
        // 服务启动
    }

}



