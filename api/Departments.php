<?php
namespace eKuaiBao\api;
use eKuaiBao\traits\HttpClientTrait;

class Departments {
    use HttpClientTrait;
    /**
     * 获取部门列表
     * @param array $query 查询参数数组
     * @return array 返回请求结果的数组
     */
    public function departments(array $query):array {
        return $this->httpClient->get('/api/openapi/v1/departments',$query);
    }

    /**
     * 获取角色定义组列表
     * @param array $query 查询参数数组
     * @return array 返回请求结果的数组
     */
    public function roleDefGroups(array $query):array {
        return $this->httpClient->get('/api/openapi/v1/roleDefGroups',$query);
    }
}
