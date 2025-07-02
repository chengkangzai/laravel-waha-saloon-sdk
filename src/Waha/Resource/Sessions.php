<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\DeleteTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetInformationAboutTheAuthenticatedAccount;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\GetSessionInformation;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\LogoutFromTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\RestartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\StartTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\StopTheSession;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Sessions\UpdateSession;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Sessions extends Resource
{
	/**
	 * @param string $session
	 */
	public function getSessionInformation(string $session): Response
	{
		return $this->connector->send(new GetSessionInformation($session));
	}


	/**
	 * @param string $session
	 * @param mixed $config
	 */
	public function updateSession(string $session, mixed $config): Response
	{
		return $this->connector->send(new UpdateSession($session, $config));
	}


	/**
	 * @param string $session
	 */
	public function deleteTheSession(string $session): Response
	{
		return $this->connector->send(new DeleteTheSession($session));
	}


	/**
	 * @param string $session
	 */
	public function getInformationAboutTheAuthenticatedAccount(string $session): Response
	{
		return $this->connector->send(new GetInformationAboutTheAuthenticatedAccount($session));
	}


	/**
	 * @param string $session
	 */
	public function startTheSession(string $session): Response
	{
		return $this->connector->send(new StartTheSession($session));
	}


	/**
	 * @param string $session
	 */
	public function stopTheSession(string $session): Response
	{
		return $this->connector->send(new StopTheSession($session));
	}


	/**
	 * @param string $session
	 */
	public function logoutFromTheSession(string $session): Response
	{
		return $this->connector->send(new LogoutFromTheSession($session));
	}


	/**
	 * @param string $session
	 */
	public function restartTheSession(string $session): Response
	{
		return $this->connector->send(new RestartTheSession($session));
	}
}
