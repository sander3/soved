<?php

namespace App\Repositories\Contracts;

interface PushoverRepository
{
    public const ENDPOINT = 'https://api.pushover.net/1/messages.json';

    public function sendMessage(string $message, string $userKey = null, array $optionalParameters = []): bool;
}
