<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

// forward mail to telegram
if(isset($_POST['recipient'])) {
    list($to, $domail) = explode('@', trim($_POST['recipient'], '<>'));

    \Longman\TelegramBot\Request::sendMessage([
        'chat_id' => $to,
        'parse_mode' => 'HTML',
        'text' => $_POST['stripped-text'],
        'disable_web_page_preview' => true,
    ]);
}
