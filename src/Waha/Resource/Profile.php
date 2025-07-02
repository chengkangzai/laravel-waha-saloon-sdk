<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile\GetMyProfile;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile\SetMyProfileName;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Profile\SetProfileStatusAbout;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Profile extends Resource
{
	/**
	 * @param string $session
	 */
	public function getMyProfile(string $session): Response
	{
		return $this->connector->send(new GetMyProfile($session));
	}


	/**
	 * @param string $session
	 * @param mixed $name
	 */
	public function setMyProfileName(string $session, mixed $name): Response
	{
		return $this->connector->send(new SetMyProfileName($session, $name));
	}


	/**
	 * @param string $session
	 * @param mixed $status
	 */
	public function setProfileStatusAbout(string $session, mixed $status): Response
	{
		return $this->connector->send(new SetProfileStatusAbout($session, $status));
	}
}
