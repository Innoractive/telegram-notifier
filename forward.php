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

    // trim whitespace in first char
    $_POST['stripped-text'] = str_replace("Your faithful employee,", "", $_POST['stripped-text']);
    $_POST['stripped-text'] = preg_replace("/[\r][\n]/", "\n", $_POST['stripped-text']);
    $_POST['stripped-text'] = preg_replace("/[\n][\t ]*[\t ]/", "\n", $_POST['stripped-text']);
    $_POST['stripped-text'] = preg_replace("/[\n\r\t ]+$/", "", $_POST['stripped-text']);

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
        $data = $response->getRawData();
        if(@$data['parameters'] && @$data['parameters']['migrate_to_chat_id']) {

            $response = \Longman\TelegramBot\Request::sendMessage([
                'chat_id' => $data['parameters']['migrate_to_chat_id'],
                'parse_mode' => 'HTML',
                'text' => preg_replace('#<br\s*/?>#i', "\n", $message),
                'disable_web_page_preview' => true,
            ]);
            file_put_contents('error.log', sprintf('[%s]: %s' . PHP_EOL, date('Y-m-d H:i:s'), 'Resend to chat id(' . $to . '): ' . $data['parameters']['migrate_to_chat_id']), FILE_APPEND);
        }
        if(!$response->isOk()) {
            if($_SERVER['SERVER_NAME'] == 'localhost'){
                echo 'error!';
                echo '<br>'.$message;
            }
            file_put_contents('error.log', sprintf('[%s]: %s' . PHP_EOL, date('Y-m-d H:i:s'), print_r(array($_POST, $response), true)), FILE_APPEND);
        }
    }

    if(getenv('DEFAULT_CHAT') && getenv('DEFAULT_CHAT_ID')) {
        $response = \Longman\TelegramBot\Request::sendMessage([
            'chat_id' => getenv('DEFAULT_CHAT_ID'),
            'parse_mode' => 'HTML',
            'text' => preg_replace('#<br\s*/?>#i', "\n",
                sprintf('<b>To Chat:</b> <code>%s</code><br>', $to).
                $message),
            'disable_web_page_preview' => true,
        ]);
    }
}
