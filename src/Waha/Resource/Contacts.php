<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Resource;

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\BlockContact;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\CheckPhoneNumberIsRegisteredInWhatsApp;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetAllContacts;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetContactBasicInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetContactProfilePictureUrl;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\GetsTheContactAboutInfo;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Contacts\UnblockContact;
use CCK\LaravelWahaSaloonSdk\Waha\Resource;
use Saloon\Http\Response;

class Contacts extends Resource
{
	/**
	 * @param string $contactId (Required)
	 * @param string $session (Required)
	 */
	public function getContactBasicInfo(?string $contactId, ?string $session): Response
	{
		return $this->connector->send(new GetContactBasicInfo($contactId, $session));
	}


	/**
	 * @param string $session (Required)
	 * @param string $sortBy Sort by field
	 * @param string $sortOrder Sort order - <b>desc</b>ending (Z => A, New first) or <b>asc</b>ending (A => Z, Old first)
	 * @param string $limit
	 * @param string $offset
	 */
	public function getAllContacts(
		?string $session,
		?string $sortBy,
		?string $sortOrder,
		?string $limit,
		?string $offset,
	): Response
	{
		return $this->connector->send(new GetAllContacts($session, $sortBy, $sortOrder, $limit, $offset));
	}


	/**
	 * @param string $phone (Required) The phone number to check
	 * @param string $session (Required)
	 */
	public function checkPhoneNumberIsRegisteredInWhatsApp(?string $phone, ?string $session): Response
	{
		return $this->connector->send(new CheckPhoneNumberIsRegisteredInWhatsApp($phone, $session));
	}


	/**
	 * @param string $contactId (Required)
	 * @param string $session (Required)
	 */
	public function getsTheContactAboutInfo(?string $contactId, ?string $session): Response
	{
		return $this->connector->send(new GetsTheContactAboutInfo($contactId, $session));
	}


	/**
	 * @param string $contactId (Required)
	 * @param string $refresh Refresh the picture from the server (24h cache by default). Do not refresh if not needed, you can get rate limit error
	 * @param string $session (Required)
	 */
	public function getContactProfilePictureUrl(?string $contactId, ?string $refresh, ?string $session): Response
	{
		return $this->connector->send(new GetContactProfilePictureUrl($contactId, $refresh, $session));
	}


	/**
	 * @param mixed $contactId
	 * @param mixed $session
	 */
	public function blockContact(mixed $contactId, mixed $session): Response
	{
		return $this->connector->send(new BlockContact($contactId, $session));
	}


	/**
	 * @param mixed $contactId
	 * @param mixed $session
	 */
	public function unblockContact(mixed $contactId, mixed $session): Response
	{
		return $this->connector->send(new UnblockContact($contactId, $session));
	}
}
