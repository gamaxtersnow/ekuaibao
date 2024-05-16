<?php
namespace eKuaiBao\api;

use eKuaiBao\traits\HttpClientTrait;

class Staffs {
    use HttpClientTrait;
    /**
     * 获取员工ID列表
     * @param string $query 查询参数，用于指定获取员工ID的条件
     * @return array 员工ID列表
     */
    public function getStaffIds(string $query):array {
        return $this->httpClient->post('/api/openapi/v1/staffs/getStaffIds',$query);
    }

    /**
     * 获取员工信息
     * @param string $query 查询参数，用于指定获取员工信息的条件
     * @return array 员工信息列表
     */
    public function staffs(string $query):array {
        return $this->httpClient->get('/api/openapi/v1/staffs',$query);
    }

}
