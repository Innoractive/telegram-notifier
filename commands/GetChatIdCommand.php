<?php
/**
 * This file is part of the TelegramBot package.
 *
 * (c) Avtandil Kikabidze aka LONGMAN <akalongman@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Request;
/**
 * User "/shortener" command
 *
 * Create a shortened URL using Botan.
 */
class GetChatIdCommand extends UserCommand
{
    /**
     * @var string
     */
    protected $name = 'getChatId';
    /**
     * @var string
     */
    protected $description = 'Get chat Id';
    /**
     * @var string
     */
    protected $usage = '/getChatId';
    /**
     * @var string
     */
    protected $version = '1.0.0';
    /**
     * Command execute method
     *
     * @return \Longman\TelegramBot\Entities\ServerResponse
     * @throws \Longman\TelegramBot\Exception\TelegramException
     */
    public function execute()
    {
        $message = $this->getMessage();
        $chat_id = $message->getChat()->getId();
        $user_id = $message->getFrom()->getId();
        $chat_id = str_replace('-', 't', $chat_id);

        $text = sprintf(
            '<b>Chat Id</b>: <code>%s</code>' . PHP_EOL
            .'<b>User Id</b>: <code>%s</code>' . PHP_EOL
            .'<b>Email</b>: %s' . PHP_EOL
            .'<b>Message</b>: <code>%s</code>' . PHP_EOL,
            $chat_id, $user_id, $chat_id . getenv('MAIL_DOMAIN'), $message->getText()
        );

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
            'parse_mode' => 'HTML',
        ];

        return Request::sendMessage($data);
    }
}
