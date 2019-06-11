<?php

function asset($url) {
    return './assets/' . $url;
}

function bot_url() {
    return 'https://t.me/' . trim(getenv('TELEGRAM_BOTNAME'), '@');
}