<?php

namespace zetsoft\service\socket;

require Root . '/vendors/netapp/vendor/autoload.php';

use Ratchet\ConnectionInterface;
use Ratchet\Http\HttpServer;
use Ratchet\MessageComponentInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Workerman\Worker;
use zetsoft\models\chat\ChatMessage;
use zetsoft\models\user\User;
use zetsoft\system\Az;
use zetsoft\system\helpers\ZJsonHelper;
use zetsoft\system\kernels\ZFrame;

class SocketIo extends ZFrame
{
    public function run()
    {
        $io = new \PHPSocketIO\SocketIO(2020);
        $io->of('/room')->on('connection', function ($socket) {
            $socket->addedUser = false;
            // when the client emits 'new message', this listens and executes
            $socket->on('new message', function ($data) use ($socket) {
                // we tell the client to execute 'new message'
                $socket->broadcast->emit('new message', array(
                    'username' => $socket->username,
                    'message' => $data
                ));
            });

            // when the client emits 'add user', this listens and executes
            $socket->on('add user', function ($username) use ($socket) {
                if ($socket->addedUser)
                    return;
                global $usernames, $numUsers;
                // we store the username in the socket session for this client
                $socket->username = $username;
                ++$numUsers;
                $socket->addedUser = true;
                $socket->emit('login', array(
                    'numUsers' => $numUsers
                ));
                // echo globally (all clients) that a person has connected
                $socket->broadcast->emit('user joined', array(
                    'username' => $socket->username,
                    'numUsers' => $numUsers
                ));
            });

            // when the client emits 'typing', we broadcast it to others
            $socket->on('typing', function () use ($socket) {
                $socket->broadcast->emit('typing', array(
                    'username' => $socket->username
                ));
            });

            // when the client emits 'stop typing', we broadcast it to others
            $socket->on('stop typing', function () use ($socket) {
                $socket->broadcast->emit('stop typing', array(
                    'username' => $socket->username
                ));
            });

            // when the user disconnects.. perform this
            $socket->on('disconnect', function () use ($socket) {
                global $usernames, $numUsers;
                if ($socket->addedUser) {
                    --$numUsers;
                    // echo globally that this client has left
                    $socket->broadcast->emit('user left', array(
                        'username' => $socket->username,
                        'numUsers' => $numUsers
                    ));
                }
            });
        });
        if (!defined('GLOBAL_START')) {
            Worker::runAll();
        }
    }
}
