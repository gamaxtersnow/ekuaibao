<?php
    namespace eKuaiBao\api;

    use eKuaiBao\traits\HttpClientTrait;

    class DataLink {
        use HttpClientTrait;
        /**
         * 根据平台名称获取平台信息
         * @param array $query 包含查询参数的数组，一般为平台名称
         * @return array 返回从API获取的平台信息数组
         */
        public function getPlatformByName(array $query):array {
            return $this->httpClient->postJson('/api/openapi/v2/datalink/getPlatformByName',$query);
        }

        /**
         * 获取实体信息
         * @param array $query 包含查询参数的数组，具体取决于API要求
         * @return array 返回从API获取的实体信息数组
         */
        public function entity(array $query):array {
           return $this->httpClient->get('/api/openapi/v2/datalink/entity/%s',$query);
        }

    }
