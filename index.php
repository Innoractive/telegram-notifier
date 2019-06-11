<?php

// Load composer
require __DIR__ . '/vendor/autoload.php';

?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="theme-color" content="#212529"/>
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <title><?php echo getenv('TELEGRAM_BOTNAME');?> | Telegram Notifier for Innoractive.com</title>
    <link href="<?php echo asset('css/nes.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('css/style.css'); ?>" rel="stylesheet" />
    <script src="<?php echo asset('js/dialog-polyfill.js'); ?>"></script>
    <script src="<?php echo asset('js/script.js'); ?>"></script>
</head>
<body id="nescss">
    <header>
        <div class="container">
            <div class="nav-brand">
                <a href="https://nostalgic-css.github.io/NES.css/">
                    <h1><i class="snes-jp-logo brand-logo"></i><?php echo getenv('TELEGRAM_BOTNAME');?></h1>
                </a>
                <p>Telegram Notifier for Innoractive.com.</p>
            </div>
        </div>
    </header>
    <div class="container">
        <main class="main-content">
            <section class="topic">
                <h2 id="about"><a href="#about">#</a>About</h2>
                <p><?php echo getenv('TELEGRAM_BOTNAME');?> is a TelegramBot to convert your email into telegram message.</p>
            </section>
        </main>
        <footer>
            <p><span>©2018</span> <a href="https://www.innoractive.com/" target="_blank" rel="noopener">Innoractive Sdn Bhd</a> <span>-</span> <a href="https://t.me/<?php echo trim(getenv('TELEGRAM_BOTNAME'), '@');?>" target="_blank" rel="noopener"><?php echo getenv('TELEGRAM_BOTNAME');?></a></p>
        </footer>
    </div>
</body>
</html>