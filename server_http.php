<?php
/**
 * http 服务
 */
$http = new Swoole\Http\Server('0.0.0.0', 9501);

$http->on('start', function ($server) {
    echo "Swoole http server is started at http://0.0.0.0:9501\n";
});

$http->on('request', function ($request, $response) {
    $response->header('Content-Type', 'text/plain');
    $response->end('Hello World');
});

$http->start();