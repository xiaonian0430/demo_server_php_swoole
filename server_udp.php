<?php
/**
 * udp 服务
 */
$server = new Swoole\Server('0.0.0.0', 9503, SWOOLE_PROCESS, SWOOLE_SOCK_UDP);

$server->on('start', function ($server) {
    echo "UDP Server is started at udp://0.0.0.0:9503\n";
});

$server->on('packet', function ($server, $data, $clientInfo) {
    $server->sendTo($clientInfo['address'], $clientInfo['port'], "Server：{$data}");
});

$server->start();