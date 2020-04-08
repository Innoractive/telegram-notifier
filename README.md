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

### Send Email
- send email to `chat-id@your-domain.com`
- chat-id with negative symbol "-" will replace with character "t"
- system will convert email to telegram message

### Title Label
- system will auto detect `title label` from `keyword` in email subject / email body
- if multiple keyword in subject / body, system will use icon with higher priority
- eg. following email contain keyword "error" & "info" will use `error` icon instead of `info` icon
> subject: <br> 
> error in api.php<br><br>
> body:<br>
> info => line 39 undefined class API 


|   Icon   |               Keyword               | Priority |
|:--------:|:-----------------------------------:|---------:|
|    🚫    |     `error`, `danger`, `failed`     |       10 |
|   ⚠️  |        `warning`, `unexpected`      |        9 |
|    ✅    |  `success`, `succeeded`, `passed`   |        8 |
|   ℹ️  |          `info`, `recovered`        |        7 |
|   🧪    |               `test`                |        6 |
|   ✉️ |              `default`              |        0 |

- When no keyword detected, will use default icon