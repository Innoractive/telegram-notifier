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
    <title><?php echo bot_name();?> | Telegram Notifier for Innoractive.com</title>
    <link href="<?php echo asset('css/nes.css'); ?>" rel="stylesheet" />
    <link href="<?php echo asset('css/style.css'); ?>" rel="stylesheet" />
    <script src="<?php echo asset('js/app.js'); ?>"></script>
    <script>
      var mail_domain = '<?php echo getenv('MAIL_DOMAIN'); ?>';
    </script>
    <script src="<?php echo asset('js/script.js'); ?>"></script>
</head>
<body id="nescss">
    <header>
        <div class="container">
            <div class="nav-brand">
                <a href="<?php echo bot_url();?>" target="_blank" rel="noopener" title="Link to Telegram">
                    <h1 class="typewriter"><i class="snes-jp-logo brand-logo"></i><?php echo bot_name();?></h1>
                </a>
                <p>Telegram Notifier for <a  href="https://www.innoractive.com/" target="_blank" rel="noopener">Innoractive.com</a></p>
            </div>
        </div>
    </header>
    <div class="container">
        <main class="main-content">
            <section class="topic">
                <h2 id="about"><a href="#about">#</a>About</h2>
                <p><?php echo bot_link();?> is a TelegramBot to convert your email into telegram message.</p>
            </section>

            <section class="topic">
                <h2 id="how-to-use"><a href="#how-to-use">#</a>How To Use</h2>

                <section class="item">
                    <section class="nes-container">
                        <p>1. Add <?php echo bot_link();?> To Your Telegram Group</p>
                    </section>

                    <section class="nes-container with-title">
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
                                        <p>Chat Id: 543XXXX80</p>
                                        <p>User Id: 543XXXX80</p>
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
                                <input type="text" id="chat-id" class="nes-input" placeholder="eg. 543XXXX80">
                            </div>
                        </div>
                    </section>

                    <section class="nes-container with-title">
                        <h3 class="title">4. This is your <?php echo bot_link();?> email</h3>
                        <div id="inputs" class="item">
                            <div class="nes-field">
                                <label for="name_field"><?php echo bot_name(); ?> Email</label>
                                <button type="button" id="copy-btn" class="nes-btn is-primary" style="float:right;width:15%">Copy</button>
                                <input type="text" id="telegram-email" class="nes-input" placeholder="543XXXX80<?php echo getenv('MAIL_DOMAIN'); ?>" readonly style="float:left; width: 80%">
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </section>

                    <section class="nes-container" id="last-step" style="display:none">
                        <p>5. Send an email to <a id="email-link" href="mailto:" target="_blank">543XXXX80<?php echo getenv('MAIL_DOMAIN'); ?></a> Now!</p>
                    </section>
                </section>
            </section>
        </main>
        <footer>
            <p><span>©<?php echo date('Y'); ?></span> <a href="https://www.innoractive.com/" target="_blank" rel="noopener">Innoractive Sdn Bhd</a> <span>-</span> <?php echo bot_link(); ?></p>
        </footer>
    </div>
</body>
</html>