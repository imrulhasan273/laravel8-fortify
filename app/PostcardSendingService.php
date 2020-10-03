<?php

namespace App;

use Illuminate\Support\Facades\Mail;


class PostcardSendingService
{
    private $country;
    private $width;
    private $height;

    public function __construct($country, $width, $height)
    {
        $this->country = $country;
        $this->height = $height;
        $this->width = $width;
    }

    public function hello($message, $email)
    {
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email);
        });

        # Mail out postcard through some service
        # $this->country, $this->width, $this->height

        dump('Postcard was sent with the message: ' . $message);
    }
}
