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
    <meta name="application-name" content="<?php echo bot_name(); ?>"/>
    <link rel="icon" sizes="192x192" href="<?php echo asset('img/icon-192.png'); ?>">
    <link rel="shortcut icon" type="image/png" href="<?php echo asset('img/icon.png'); ?>"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
    <title><?php echo bot_name();?> | Telegram Notifier for Innoractive.com</title>
    <link href="<?php echo asset('css/nes.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('css/style.css'); ?>" rel="stylesheet" />
    <script src="<?php echo asset('js/app.js'); ?>"></script>
    <script>
      var mail_domain = '<?php echo getenv('MAIL_DOMAIN'); ?>';
    </script>
    <script src="<?php echo asset('js/script.js?v=1'); ?>"></script>
</head>
<body id="nescss">
    <header>
        <div class="container">
            <div class="nav-brand">
                <a href="<?php echo bot_url();?>" target="_blank" rel="noopener" title="Link to Telegram">
                    <h1 class="typewriter"><img class="brand-logo" src="<?php echo asset('img/icon.png'); ?>" > <?php echo bot_name();?></h1>
                </a>
                <p>Telegram Notifier for <a  href="https://www.innoractive.com/" target="_blank" rel="noopener">Innoractive.com</a></p>
            </div>
            <div class="social-buttons">
                <section>
                    <button type="button" class="nes-btn is-warning show-large" onclick="document.getElementById('dialog-default').showModal();">
                        About
                    </button>
                </section>
            </div>
        </div>
    </header>
    <div class="container">
        <main class="main-content">
            <dialog class="nes-dialog is-rounded" id="dialog-default">
                <form method="dialog">
                    <p class="title">About</p>
                    <p><?php echo bot_link();?> is a TelegramBot to convert your email into telegram message.</p>
                    <menu class="dialog-menu is-centered">
                        <button class="nes-btn is-primary" style="width: 150px">OK</button>
                    </menu>
                </form>
            </dialog>
            <section class="topic show-small">
                <section class="nes-container is-centered">
                    <button type="button" class="nes-btn is-warning" onclick="document.getElementById('dialog-default').showModal();">
                        About
                    </button>
                </section>
            </section>

            <section class="topic">
                <h2 id="how-to-use"><a href="#how-to-use">#</a>How To Use</h2>

                <section class="item">
                    <section class="nes-container">
                        <p>1. Add <?php echo bot_link();?> To Your Telegram Group</p>
                    </section>

                    <section class="nes-container with-title" id="step-2">
                        <h3 class="title">2. Go To Your Telegram Group</h3>
                        <div id="balloons" class="item">
                            <section class="message-list">
                                <section class="message -right">
                                    <!-- Balloon -->
                                    <div class="nes-balloon from-right">
                                        <p>You:</p>
                                        <p>/getChatId </p>
                                    </div>
                                    <i class="nes-bcrikko"></i>
                                </section>
                                <section class="message -left">
                                    <i class="nes-bcrikko"></i>
                                    <!-- Balloon -->
                                    <div class="nes-balloon from-left">
                                        <p><?php echo bot_link(); ?>:</p>
                                        <p>Chat Id: t4XXX8</p>
                                        <p>Chat Id: 543XXXX80</p>
                                        <p>Email &nbsp;:<br>
                                            &nbsp; t4XXX8@notty.innoractive.com</p>
                                        <p>Message: /getChatId</p>
                                    </div>
                                </section>
                            </section>
                        </div>
                    </section>

                    <section class="nes-container with-title">
                        <h3 class="title">3. Type Your Chat ID</h3>
                        <div id="inputs" class="item">
                            <div class="nes-field">
                                <label for="name_field">Your Chat ID</label>
                                <input type="number" id="chat-id" class="nes-input" placeholder="eg. 543XXXX80">
                            </div>
                        </div>
                    </section>

                    <section class="nes-container with-title" id="email-block" style="display:none">
                        <h3 class="title">4. This is your <?php echo bot_link();?> email</h3>
                        <div id="inputs" class="item">
                            <div class="nes-field">
                                <label for="name_field"><?php echo bot_name(); ?> Email</label>
                                <button type="button" id="copy-btn" class="nes-btn is-primary">Copy</button>
                                <input type="text" id="telegram-email" class="nes-input" placeholder="543XXXX80<?php echo getenv('MAIL_DOMAIN'); ?>" readonly>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </section>

                    <section class="nes-container" id="last-step" style="display:none">
                        <p>5. Send an email to <a id="email-link" href="mailto:" target="_blank">543XXXX80<?php echo getenv('MAIL_DOMAIN'); ?></a> Now!</p>
                    </section>
                </section>
            </section>

            <section class="topic">
                <h2 id="setup"><a href="#setup">#</a>Setup your own?</h2>
                <p>
                    <i class="nes-icon github is-small"></i>
                    <a href="https://github.com/Innoractive/telegram-notifier" target="_blank" rel="noopener">
                        <span class="show-large">/Innoractive</span>/telegram-notifier
                    </a>
                </p>
            </section>
        </main>
        <footer>
            <p><span class="footer-year">© <?php echo date('Y'); ?></span> <a href="https://www.innoractive.com/" target="_blank" rel="noopener">Innoractive Sdn Bhd</a> <span>-</span> <?php echo bot_link(); ?></p>
        </footer>

        <button type="button" class="nes-btn is-error scroll-btn" id="fab-btn" onclick="window.scrollTo({ top:0, behavior: 'smooth' })"><span>&lt;</span></button>
    </div>
    <textarea id="copy-textarea"></textarea>
</body>
</html>