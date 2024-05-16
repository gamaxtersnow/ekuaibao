<?php
    namespace eKuaiBao\api;

    use eKuaiBao\traits\HttpClientTrait;

    class Flow {
       use HttpClientTrait;
       /**
        * 获取流程数据
        * @param array $query 查询参数数组
        * @return array API响应结果
        */
       public function flowData(array $query):array{
           // 使用HTTP客户端发起POST请求获取流程数据
           return $this->httpClient->post('/api/openapi/v2.2/flow/data',$query);
       }

       /**
        * 获取流程详情
        * @param array $query 查询参数数组
        * @return array API响应结果
        */
       public function flowDetail(array $query):array {
           return $this->httpClient->get('api/openapi/v1/flowDetails',$query);
       }

       /**
        * 获取审批状态
        * @param array $query 查询参数数组
        * @return array API响应结果
        */
       public function approveStates(array $query):array{
           return $this->httpClient->get('/api/openapi/v1.1/approveStates/[%s]',$query);
       }
    }