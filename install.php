<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram(getenv('TELEGRAM_API'), getenv('TELEGRAM_BOTNAME'));

    // Set webhook
    $result = $telegram->setWebhook(getenv('TELEGRAM_WEBHOOK_URL'));
	
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}