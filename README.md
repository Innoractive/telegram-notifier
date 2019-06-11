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

### Title Label
- system will auto detect `title label` from `keyword` in email subject / email body
- if multiple keyword in subject / body, system will use icon with higher priority
- eg. following email contain keyword "error" & "info" will use `error` icon instead of `info` icon
> subject: <br> 
> error in api.php<br><br>
> body:<br>
> info => line 39 undefined class API 

| Icon |    Keyword    | Priority |
|:----:|:-------------:|---------:|
|   🚫  |  `error`, `danger` |       10 |
|   ⚠️  | `alert`, `warning` |        9 |
|   ℹ️  |      `info`     |        8 |
|   🧪  |      `test`     |        7 |
|   ✉️  |    `default`    |        0 |

When no keyword detected, will use default icon