<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class admin_new_order_checkout extends Mailable
{
    use Queueable, SerializesModels;

    public $customerinformation;
    public $cartitem;
    public $cartTotalCents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerinformation,$cartitem,$cartTotalCents)
    {
        //
        $this->customerinformation = $customerinformation;
        $this->cartitem = $cartitem;
        $this->cartTotalCents = $cartTotalCents;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.admin_new_order');
        $subject = 'New Order (Pending Payment) - '. $this->customerinformation->name;

        return $this->view('emails.admin_new_order_checkout')
                    ->subject($subject);        
    }
}


