<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\InviteCode\GetsTheInviteCodeForTheGroup;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\InviteCode\InvalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class InviteCode extends Resource
{
	/**
	 * @param string $session
	 * @param string $id
	 */
	public function getsTheInviteCodeForTheGroup(string $session, string $id): Response
	{
		return $this->connector->send(new GetsTheInviteCodeForTheGroup($session, $id));
	}


	/**
	 * @param string $session
	 * @param string $id
	 */
	public function invalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne(string $session, string $id): Response
	{
		return $this->connector->send(new InvalidatesTheCurrentGroupInviteCodeAndGeneratesNewOne($session, $id));
	}
}
