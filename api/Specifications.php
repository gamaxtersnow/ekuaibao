<?php
namespace eKuaiBao\api;

use eKuaiBao\traits\HttpClientTrait;

class Specifications  {
    use HttpClientTrait;
    /**
     * 根据类型获取最新的规范信息
     *
     * @param array $query 包含查询条件的数组，用于指定类型和其他可能的查询参数
     * @return array 返回从API获取的最新规范数据
     */
    public function latestByType(array $query):array{
        return $this->httpClient->get('/api/openapi/v1/specifications/latestByType', $query);
    }

    /**
     * 根据ID数组获取规范信息
     *
     * @param array $query 包含查询条件的数组，其中必须包含一个'idList'字段，该字段为规范ID的数组
     * @return array 返回从API根据指定ID数组获取的规范数据
     */
    public function byIds(array $query):array{
        return $this->httpClient->get('/api/openapi/v1/specifications/byIds/', $query);
    }
}