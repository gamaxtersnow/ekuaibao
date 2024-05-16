<?php
    namespace eKuaiBao\api;

    use eKuaiBao\traits\HttpClientTrait;

    /**
     * 附件操作类，用于文件的上传和下载URL的获取
     */
    class Attachment {
        use HttpClientTrait; // 使用HttpClientTrait来处理HTTP请求

        /**
         * 上传文件
         * @param string $path 文件的本地路径
         * @param string $name 上传后希望的文件名，默认为空，若为空则从路径中提取文件名
         * @return array 返回上传结果，包含上传信息的数组
         */
        public function upload(string $path,string $name=''):array{
            // 如果未指定文件名，则从路径中提取文件名
            if ($name == ''){
                $name = mb_substr($path,mb_strrpos($path,'/'));
            }
            // 准备文件multipart数据
            $multiParts = [
                [
                  'name'=>$name,
                  'file'=>fopen($path,'r')
                ]
            ];
            // 执行文件上传
            return $this->httpClient->postFile('/api/openapi/v2/attachment/upload',$multiParts);
        }
        /**
         * 获取文件下载URL
         * @param array $query 包含下载信息的查询字符串，具体结构依赖于后端接口要求
         * @return array 返回包含下载URL的数组
         */
        public function downloadUrls(array $query):array{
            return $this->httpClient->postJson('/api/openapi/v2/attachment/downloadurls',$query);
        }
    }

