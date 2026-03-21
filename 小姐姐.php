<?php
/**
 * 精选黑丝视频API的PHP实现
 * API文档: https://yunzhiapi.cn/API/jxhssp.php
 */

// 必填参数
$token = 'cZSYhqct8Ttg'; // 请替换为实际获取的用户密钥

// 可选参数（注释掉的参数可以根据需要取消注释并设置值）
// $param1 = 'value1'; // 参数1的说明
// $param2 = 'value2'; // 参数2的说明

// 请求URL
$requestUrl = 'https://yunzhiapi.cn/API/jxhssp.php';

// 初始化cURL会话
$ch = curl_init();

// 设置cURL选项
curl_setopt($ch, CURLOPT_URL, $requestUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json'
]);

// 构建查询参数
$queryParams = [
    'token' => $token,
    // 'param1' => $param1, // 取消注释以使用参数1
    // 'param2' => $param2, // 取消注释以使用参数2
];

// 将查询参数添加到URL
$requestUrl .= '?' . http_build_query($queryParams);
curl_setopt($ch, CURLOPT_URL, $requestUrl);

// 执行cURL请求
$response = curl_exec($ch);

// 检查cURL错误
if (curl_errno($ch)) {
    $errorMessage = 'cURL请求错误: ' . curl_error($ch);
    error_log($errorMessage);
    echo $errorMessage;
} else {
    // 获取HTTP状态码
    $httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    // 根据HTTP状态码处理响应
    if ($httpStatusCode == 200) {
        // 请求成功，处理响应数据
        echo $response;
    } else {
        // 请求失败，输出错误信息
        $errorMessage = '请求失败，HTTP状态码: ' . $httpStatusCode;
        error_log($errorMessage);
        echo $errorMessage;
    }
}

// 关闭cURL会话
curl_close($ch);
?>