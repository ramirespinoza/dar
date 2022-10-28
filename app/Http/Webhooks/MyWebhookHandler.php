<?php
namespace App\Http\Controllers;
// app/Http/Webhooks/MyWebhookHandler.php

class MyWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    public function myCustomHandler(): void
    {
        // ... My awesome code
        $this->chat->html("Received: $text")->send();
    }
}
