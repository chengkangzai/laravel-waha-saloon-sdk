<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels\DeleteLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels\GetChatsByLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Labels\UpdateLabel;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Labels extends Resource
{
	/**
	 * @param string $session
	 * @param string $labelId
	 * @param mixed $name
	 * @param mixed $colorHex
	 * @param mixed $color
	 */
	public function updateLabel(string $session, string $labelId, mixed $name, mixed $colorHex, mixed $color): Response
	{
		return $this->connector->send(new UpdateLabel($session, $labelId, $name, $colorHex, $color));
	}


	/**
	 * @param string $session
	 * @param string $labelId
	 */
	public function deleteLabel(string $session, string $labelId): Response
	{
		return $this->connector->send(new DeleteLabel($session, $labelId));
	}


	/**
	 * @param string $session
	 * @param string $labelId
	 */
	public function getChatsByLabel(string $session, string $labelId): Response
	{
		return $this->connector->send(new GetChatsByLabel($session, $labelId));
	}
}
