<?php

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