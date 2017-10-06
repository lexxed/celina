<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class admin_new_order extends Mailable
{
    use Queueable, SerializesModels;

    public $customerinformation;
    public $customer;
    public $cartitem;
    public $cartTotalCents;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customerinformation,$customer,$cartitem,$cartTotalCents)
    {
        //
        $this->customerinformation = $customerinformation;
        $this->customer = $customer;
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
        $subject = 'New Order - '. $this->customerinformation->name;

        return $this->view('emails.admin_new_order')
                    ->subject($subject);        
    }
}

