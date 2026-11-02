<?php

use CCK\LaravelWahaSaloonSdk\Waha\Requests\Chats\GetsMessagesInTheChat;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Keys\CreateOrGetMediaApiKey;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\Misc\StarOrUnstarMessage;
use CCK\LaravelWahaSaloonSdk\Waha\Requests\SendText\SendTextMessage;

describe('default query/body filtering', function () {
    it('keeps empty strings in both existing and new request bodies', function () {
        $text = new SendTextMessage(text: '');
        $key = new CreateOrGetMediaApiKey('');

        expect($text->body()->all())->toBe(['text' => ''])
            ->and($key->body()->all())->toBe(['session' => '']);
    });

    it('keeps an explicit false in the body so unstar actually sends star=false', function () {
        $request = new StarOrUnstarMessage(
            messageId: 'msg-1',
            chatId: '123@c.us',
            star: false,
            session: 'default',
        );

        $body = $request->body()->all();

        expect($body)->toHaveKey('star')
            ->and($body['star'])->toBeFalse();
    });

    it('keeps a falsy "0" string in the query while still dropping nulls', function () {
        $request = new GetsMessagesInTheChat(
            session: 'default',
            chatId: '123@c.us',
            sortBy: null,
            sortOrder: null,
            downloadMedia: 'false',
            limit: null,
            offset: '0',
            filterTimestampLte: null,
            filterTimestampGte: null,
            filterFromMe: null,
            filterAck: null,
        );

        $query = $request->query()->all();

        expect($query)->toHaveKey('offset')
            ->and($query['offset'])->toBe('0')
            ->and($query)->toHaveKey('downloadMedia')
            ->and($query['downloadMedia'])->toBe('false')
            ->and($query)->not->toHaveKey('sortBy')
            ->and($query)->not->toHaveKey('limit');
    });
});
