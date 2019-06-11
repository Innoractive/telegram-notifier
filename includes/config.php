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