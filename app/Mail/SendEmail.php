<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

//    public $order;

    public function __construct()
    {
       //
    }

//    public function __construct(Order $order)
//    {
//        $this->order = $order;
//    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('Emailform.form');
//        return $this->markdown('Emailform.form')->with(['order'=>$this->order]);
    }
}
