<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShopNotification extends Mailable
{
    use Queueable, SerializesModels;
    var $user, $shop;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $shop)
    {
        //
        $this->user = $user;
        $this->shop = $shop;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('vendor.notification.shop');
    }
}
