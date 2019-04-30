<?php
// Load composer
require __DIR__ . '/vendor/autoload.php';

$botApiKey = getenv('TELEGRAM_API');
$botName   = getenv('TELEGRAM_BOTNAME');
$hookUrl   = getenv('TELEGRAM_WEBHOOK_URL');

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($botApiKey, $botName);

    // Set webhook
    $result = $telegram->setWebhook($hookUrl);
	
    if ($result->isOk()) {
        echo $result->getDescription();
    }
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // log telegram errors
    // echo $e->getMessage();
}