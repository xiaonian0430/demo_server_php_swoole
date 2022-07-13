<?php
/**
 * tcp 服务
 */
$server = new Swoole\Server('0.0.0.0', 9502);

$server->on('start', function ($server) {
    echo "TCP Server is started at tcp://0.0.0.0:9502\n";
});

$server->on('connect', function ($server, $fd){
    echo "connection open: {$fd}\n";
});

$server->on('receive', function ($server, $fd, $reactor_id, $data) {
    $server->send($fd, "Swoole: {$data}");
});

$server->on('close', function ($server, $fd) {
    echo "connection close: {$fd}\n";
});

$server->start();