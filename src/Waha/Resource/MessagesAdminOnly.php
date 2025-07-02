<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\MessagesAdminOnly\GetSettingsWhoCanSendMessages;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\MessagesAdminOnly\UpdateSettingsWhoCanSendMessages;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class MessagesAdminOnly extends Resource
{
	/**
	 * @param string $session
	 * @param string $id
	 * @param mixed $adminsOnly
	 */
	public function updateSettingsWhoCanSendMessages(string $session, string $id, mixed $adminsOnly): Response
	{
		return $this->connector->send(new UpdateSettingsWhoCanSendMessages($session, $id, $adminsOnly));
	}


	/**
	 * @param string $session
	 * @param string $id
	 */
	public function getSettingsWhoCanSendMessages(string $session, string $id): Response
	{
		return $this->connector->send(new GetSettingsWhoCanSendMessages($session, $id));
	}
}
