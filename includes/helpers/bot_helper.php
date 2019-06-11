<?php

function bot_name() {
    return getenv('TELEGRAM_BOTNAME');
}

function bot_url() {
    return 'https://t.me/' . trim(bot_name(), '@');
}

function bot_link() {
    return '<a href="' . bot_url() . '" target="_blank" rel="noopener">' . bot_name() . '</a>';
}