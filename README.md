# telegram-notifier
 ![php 5.5+](https://img.shields.io/badge/php-5.5+-brightgreen.svg?style=flat&logo=php&labelColor=777BB4&logoColor=white&color=lightgrey) ![author](https://img.shields.io/badge/author-kch-brightgreen.svg?style=flat&logo=bitbucket&color=lightgrey)
  
PubSub based notification service in Telegram.

## Installation

- run following composer command
```shell
composer create-project innoractive/telegram-notifier --repository "{\"type\":\"vcs\",\"url\":\"git@github.com:Innoractive/telegram-notifier.git\"}"
```

- update telegram credential in `.env` file

- run `php install.php` to register
 telegram webhook


## Usage
### Get chat Id
- open telegram app

- add your telegram bot into telegram group

- run telegram command `/getChatId` to get chat id

### Setup mailhook
- forward email to `http://path.to/forward.php`