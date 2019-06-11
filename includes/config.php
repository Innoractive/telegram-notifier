<?php

$dotenv = Dotenv\Dotenv::create(__DIR__ . '/..');
$dotenv->load();

function getIcon($content) {
    if(contains($content, ['error', 'danger']) !== false) {
        return '🚫';
    }

    if(contains($content, ['alert','warning']) !== false) {
        return '⚠️';
    }

    if(contains($content, ['info']) !== false) {
        return 'ℹ️';
    }

    if(contains($content, ['test']) !== false) {
        return '🧪';
    }

    return '✉️';
}

function contains($str, array $arr) {
    foreach($arr as $a) {
        if (stripos($str,$a) !== false) return true;
    }
    return false;
}

function bold_text($text) {
    return preg_replace("#\*{1}([^ \t\r\n][^\t\r\n]*)\*{1}#", '<b>$1</b>', $text);
}

function remove_arrow($text) {
    return str_replace(['<','>'], '', $text);
}