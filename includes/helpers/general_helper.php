<?php

function getIcon($content) {
    $content = strtolower($content);

    if(contains($content, ['error', 'danger', 'failed']) !== false) {
        return '🚫';
    }

    if(contains($content, ['warning']) !== false) {
        return '⚠️';
    }

    if(contains($content, ['info']) !== false) {
        return 'ℹ️';
    }

    if(contains($content, ['success', 'succeeded', 'passed']) !== false) {
        return '✅';
    }

    if(contains($content, ['test']) !== false) {
        return '🧪';
    }

    return '✉️';
}