<?php

namespace CCK\LaravelWahaSaloonSdk\Waha\Requests\JoinRequests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Approve pending requests to join the group.
 */
class ApprovePendingRequestsToJoinTheGroup extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/api/{$this->session}/groups/{$this->id}/participants/join-requests/approve";
    }

    public function __construct(
        protected string $session,
        protected string $id,
        protected array $participants,
    ) {}

    public function defaultBody(): array
    {
        $isNotNull = fn ($value) => $value !== null;

        return array_filter([
            'participants' => $this->participants,
        ], $isNotNull);
    }
}
