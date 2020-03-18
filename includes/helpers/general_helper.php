<?php
function getChannelType($content) {
    $content = strtolower($content);

    if(contains($content, ['error', 'danger', 'failed']) !== false) {
        return 'Error';
    }

    if(contains($content, ['warning', 'unexpected']) !== false) {
        return 'Warning';
    }

    if(contains($content, ['info']) !== false) {
        return 'Information';
    }

    if(contains($content, ['success', 'succeeded', 'passed']) !== false) {
        return 'Success';
    }

    if(contains($content, ['test']) !== false) {
        return 'Testing';
    }

    return 'General';
}

function getIcon($type) {
    $type = strtolower($type);
    if($type == 'error') {
        return '🚫';
    }

    if($type == 'warning') {
        return '⚠️';
    }

    if($type == 'information') {
        return 'ℹ️';
    }

    if($type == 'success') {
        return '✅';
    }

    if($type == 'test') {
        return '🧪';
    }

    return '✉️';
}