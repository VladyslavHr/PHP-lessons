<?php

use Workerman\Worker;

require_once __DIR__ . '/../vendor/autoload.php';

// Create a Websocket server
$ws_worker = new Worker('websocket://localhost:2346');

// Emitted when new connection come
$ws_worker->onConnect = function ($connection) {
    echo "New connection\n";
    // print_r($connection);

//   send_telegram('New connection');
};

// Emitted when data received
$ws_worker->onMessage = function ($connection, $data) {

    $data_obj = json_decode($data);

    // print_r($data_obj);

    if (is_object($data_obj) && $data_obj->s === 'new') {
        echo $data_obj->u . PHP_EOL;
        send_telegram('New connection: <b>' . $data_obj->u . '</b>');
    }
    if (is_object($data_obj) && $data_obj->s === 'msg'){
        echo $data . PHP_EOL;
        foreach ($connection->worker->connections as $key => $conn ) {
            if ( $connection !== $conn) {
                $conn->send($data);
            }

        }
    }
    // Send hello $data

};

// Emitted when connection closed
$ws_worker->onClose = function ($connection) {
    echo "Connection closed\n";
};

// Run worker
Worker::runAll();


// логин в окне 1 и номер 2 под собой  сообщения как от себя


function send_telegram($message)
{
    return; // telegrm off

    $data = http_build_query([
        'chat_id' => '-1001741099979',
        'text' => $message,
        'parse_mode' => 'HTML'
    ]);

    $send_message_url = 'https://api.telegram.org/bot5193208083:AAFA7HE-qZwbB3I24aL034RnrFmcbsntcEU/sendMessage?' . $data;

    file_get_contents($send_message_url);
}
