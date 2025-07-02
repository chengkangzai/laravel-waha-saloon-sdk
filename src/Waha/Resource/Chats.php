<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\ClearsAllMessagesFromTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetsMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\ReadUnreadMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Chats extends Resource
{
	/**
	 * @param string $session
	 * @param string $chatId
	 * @param string $downloadMedia Download media for messages
	 * @param string $limit (Required)
	 * @param string $offset
	 * @param string $filterTimestampLte Filter messages before this timestamp (inclusive)
	 * @param string $filterTimestampGte Filter messages after this timestamp (inclusive)
	 * @param string $filterFromMe From me filter (by default shows all messages)
	 * @param string $filterAck Filter messages by acknowledgment status
	 */
	public function getsMessagesInTheChat(
		string $session,
		string $chatId,
		?string $downloadMedia,
		?string $limit,
		?string $offset,
		?string $filterTimestampLte,
		?string $filterTimestampGte,
		?string $filterFromMe,
		?string $filterAck,
	): Response
	{
		return $this->connector->send(new GetsMessagesInTheChat($session, $chatId, $downloadMedia, $limit, $offset, $filterTimestampLte, $filterTimestampGte, $filterFromMe, $filterAck));
	}


	/**
	 * @param string $session
	 * @param string $chatId
	 */
	public function clearsAllMessagesFromTheChat(string $session, string $chatId): Response
	{
		return $this->connector->send(new ClearsAllMessagesFromTheChat($session, $chatId));
	}


	/**
	 * @param string $session
	 * @param string $chatId
	 * @param string $messages How much messages to read (latest first)
	 * @param string $days How much days to read (latest first)
	 */
	public function readUnreadMessagesInTheChat(
		string $session,
		string $chatId,
		?string $messages,
		?string $days,
	): Response
	{
		return $this->connector->send(new ReadUnreadMessagesInTheChat($session, $chatId, $messages, $days));
	}
}
