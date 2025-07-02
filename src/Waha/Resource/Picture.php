<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture\DeleteGroupPicture;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture\DeleteProfilePicture;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture\GetGroupPicture;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture\SetGroupPicture;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Picture\SetProfilePicture;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Picture extends Resource
{
	/**
	 * @param string $session
	 * @param mixed $file
	 */
	public function setProfilePicture(string $session, mixed $file): Response
	{
		return $this->connector->send(new SetProfilePicture($session, $file));
	}


	/**
	 * @param string $session
	 */
	public function deleteProfilePicture(string $session): Response
	{
		return $this->connector->send(new DeleteProfilePicture($session));
	}


	/**
	 * @param string $session
	 * @param string $id
	 * @param string $refresh Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
	 */
	public function getGroupPicture(string $session, string $id, ?string $refresh): Response
	{
		return $this->connector->send(new GetGroupPicture($session, $id, $refresh));
	}


	/**
	 * @param string $session
	 * @param string $id
	 * @param mixed $file
	 */
	public function setGroupPicture(string $session, string $id, mixed $file): Response
	{
		return $this->connector->send(new SetGroupPicture($session, $id, $file));
	}


	/**
	 * @param string $session
	 * @param string $id
	 */
	public function deleteGroupPicture(string $session, string $id): Response
	{
		return $this->connector->send(new DeleteGroupPicture($session, $id));
	}
}
