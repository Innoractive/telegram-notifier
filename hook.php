<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$commands_paths = [
    __DIR__ . '/commands/',
];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram(getenv('TELEGRAM_API'), getenv('TELEGRAM_BOTNAME'));

    // Add commands paths containing your custom commands
    $telegram->addCommandsPaths($commands_paths);

    // Requests Limiter (tries to prevent reaching Telegram API limits)
    $telegram->enableLimiter();

    // Handle telegram webhook request
    $telegram->handle();
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    echo $e->getMessage();
}