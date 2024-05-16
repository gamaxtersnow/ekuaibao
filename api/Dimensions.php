<?php
namespace eKuaiBao\api;

use eKuaiBao\traits\HttpClientTrait;

class Dimensions {
    use HttpClientTrait;
    /**
     * 获取维度项目的列表。
     *
     * @param array $query 查询参数数组，用于构建API请求的查询字符串。
     * @return array 返回从API请求中获取的维度项目列表数据。
     */
    public function items(array $query):array {
        return $this->httpClient->get('/api/openapi/v1/dimensions/items',$query);
    }
}