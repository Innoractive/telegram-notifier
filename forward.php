<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

// forward mail to telegram
if(isset($_POST['recipient'])) {
    list($to, $domail) = explode('@', trim($_POST['recipient'], '<>'));
    $to = str_replace('t', '-', $to);

    $telegram = new Longman\TelegramBot\Telegram(getenv('TELEGRAM_API'), getenv('TELEGRAM_BOTNAME'));

    if(getenv('DEBUG') == true) {
        file_put_contents('debug.log', print_r($_POST, true), FILE_APPEND);
    }
    $type = getChannelType($_POST['subject'] . ' ' . $_POST['stripped-text']);

    $message = sprintf(file_get_contents('view/telegram-template.html'),
        getIcon($type),
        $_POST['subject'],
        $_POST['stripped-text'],
        remove_arrow($_POST['from']),
        $type);

    $response = \Longman\TelegramBot\Request::sendMessage([
        'chat_id' => $to,
        'parse_mode' => 'HTML',
        'text' => preg_replace('#<br\s*/?>#i', "\n", $message),
        'disable_web_page_preview' => true,
    ]);

    if(!$response->isOk()) {
        if($_SERVER['SERVER_NAME'] == 'localhost'){
            echo 'error!';
            echo '<br>'.$message;
        }
        file_put_contents('error.log', sprintf('[%s]: %s' . PHP_EOL, date('Y-m-d H:i:s'), print_r(array($_POST, $response), true)), FILE_APPEND);
    }
}
