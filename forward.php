<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

// forward mail to telegram
if(isset($_POST['recipient'])) {
    list($to, $domail) = explode('@', trim($_POST['recipient'], '<>'));

    $telegram = new Longman\TelegramBot\Telegram(getenv('TELEGRAM_API'), getenv('TELEGRAM_BOTNAME'));

    $message = sprintf(file_get_contents('view/telegram-template.html'), getIcon($_POST['subject'] . ' ' . $_POST['stripped-text']), $_POST['subject'], $_POST['stripped-text']);

    \Longman\TelegramBot\Request::sendMessage([
        'chat_id' => $to,
        'parse_mode' => 'HTML',
        'text' => preg_replace('#<br\s*/?>#i', "\n", $message),
        'disable_web_page_preview' => true,
    ]);
}
