<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly\GetTheGroupInfoAdminOnlySettings;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\InfoAdminOnly\UpdatesTheGroupInfoAdminOnlySettings;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class InfoAdminOnly extends Resource
{
	/**
	 * @param string $session
	 * @param string $id
	 * @param mixed $adminsOnly
	 */
	public function updatesTheGroupInfoAdminOnlySettings(string $session, string $id, mixed $adminsOnly): Response
	{
		return $this->connector->send(new UpdatesTheGroupInfoAdminOnlySettings($session, $id, $adminsOnly));
	}


	/**
	 * @param string $session
	 * @param string $id
	 */
	public function getTheGroupInfoAdminOnlySettings(string $session, string $id): Response
	{
		return $this->connector->send(new GetTheGroupInfoAdminOnlySettings($session, $id));
	}
}
