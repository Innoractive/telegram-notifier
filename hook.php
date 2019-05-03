<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram(getenv('TELEGRAM_API'), getenv('TELEGRAM_BOTNAME'));

    // Add commands paths containing your custom commands
    $telegram->addCommandsPath(__DIR__ . '/commands/');

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}