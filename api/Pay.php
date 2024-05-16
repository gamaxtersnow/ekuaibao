<?php
    namespace eKuaiBao\api;

    use eKuaiBao\traits\HttpClientTrait;

    class Pay {
        use HttpClientTrait;
        /**
         * 获取收款人信息
         *
         * @param array $query 查询参数数组，用于构建API请求的查询字符串
         * @return array 返回从API获取的收款人信息数组
         */
        public function payeeInfos(array $query):array {
            return $this->httpClient->get('/api/openapi/v2/payeeInfos',$query);
        }
    }

