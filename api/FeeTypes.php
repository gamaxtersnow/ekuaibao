<?php
    namespace eKuaiBao\api;
    use eKuaiBao\traits\HttpClientTrait;

    class FeeTypes {
        use HttpClientTrait;
        /**
         * 获取费用类型
         * @param string $query 查询参数，通常包含费用类型的ID或代码等信息
         * @return array 返回一个包含费用类型信息的数组
         */
        public function getFeeTypes(string $query):array {
            return $this->httpClient->get('/api/openapi/v1/feeTypes',$query);
        }

        /**
         * 根据ID和代码获取费用类型信息
         * @param string $query 查询参数，通常包含费用类型的ID和代码等信息
         * @return array 返回一个包含根据ID和代码获取的费用类型信息的数组
         */
        public function byIdsAndCodes(string $query):array {
            return $this->httpClient->post('/api/openapi/v2/specifications/feeType/byIdsAndCodes',$query);
        }
    }