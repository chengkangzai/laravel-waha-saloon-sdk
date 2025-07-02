<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\DeleteSentStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\GenerateMessageIdYouCanUseToBatchContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendImageStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendTextStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendVideoStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Status\SendVoiceStatus;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Status extends Resource
{
	/**
	 * @param string $session
	 * @param mixed $text
	 * @param mixed $backgroundColor
	 * @param mixed $font
	 * @param mixed $id
	 * @param mixed $contacts
	 * @param mixed $linkPreview
	 * @param mixed $linkPreviewHighQuality
	 */
	public function sendTextStatus(
		string $session,
		mixed $text,
		mixed $backgroundColor,
		mixed $font,
		mixed $id,
		mixed $contacts,
		mixed $linkPreview,
		mixed $linkPreviewHighQuality,
	): Response
	{
		return $this->connector->send(new SendTextStatus($session, $text, $backgroundColor, $font, $id, $contacts, $linkPreview, $linkPreviewHighQuality));
	}


	/**
	 * @param string $session
	 * @param mixed $file
	 * @param mixed $id
	 * @param mixed $contacts
	 * @param mixed $caption
	 */
	public function sendImageStatus(string $session, mixed $file, mixed $id, mixed $contacts, mixed $caption): Response
	{
		return $this->connector->send(new SendImageStatus($session, $file, $id, $contacts, $caption));
	}


	/**
	 * @param string $session
	 * @param mixed $file
	 * @param mixed $backgroundColor
	 * @param mixed $id
	 * @param mixed $contacts
	 */
	public function sendVoiceStatus(
		string $session,
		mixed $file,
		mixed $backgroundColor,
		mixed $id,
		mixed $contacts,
	): Response
	{
		return $this->connector->send(new SendVoiceStatus($session, $file, $backgroundColor, $id, $contacts));
	}


	/**
	 * @param string $session
	 * @param mixed $file
	 * @param mixed $id
	 * @param mixed $contacts
	 * @param mixed $caption
	 */
	public function sendVideoStatus(string $session, mixed $file, mixed $id, mixed $contacts, mixed $caption): Response
	{
		return $this->connector->send(new SendVideoStatus($session, $file, $id, $contacts, $caption));
	}


	/**
	 * @param string $session
	 * @param mixed $id
	 * @param mixed $contacts
	 */
	public function deleteSentStatus(string $session, mixed $id, mixed $contacts): Response
	{
		return $this->connector->send(new DeleteSentStatus($session, $id, $contacts));
	}


	/**
	 * @param string $session
	 */
	public function generateMessageIdYouCanUseToBatchContacts(string $session): Response
	{
		return $this->connector->send(new GenerateMessageIdYouCanUseToBatchContacts($session));
	}
}
