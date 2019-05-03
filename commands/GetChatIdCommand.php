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
use Longman\TelegramBot\Command;
use Longman\TelegramBot\Request;
/**
 * User "/shortener" command
 *
 * Create a shortened URL using Botan.
 */
class GetChatIdCommand extends Command
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

        $text = sprintf(
            '<b>Chat Id</b>: %s' . PHP_EOL
            .'<b>User Id</b>: %s' . PHP_EOL
            .'<b>Message</b>: %s' . PHP_EOL,
            $chat_id, $user_id, $message
        );

        $data = [
            'chat_id' => $chat_id,
            'text'    => $text,
        ];

        return Request::sendMessage($data);
    }
}
