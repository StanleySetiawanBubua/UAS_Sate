<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $order_id;
    protected $total;
    protected $number;
    protected $address;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->order_id = $data['order_id'];
        $this->total = $data['total'];
        $this->number = $data['number'];
        $this->address = $data['address'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.welcome_mail')
                    ->with([
                        'name' => $this->name,
                        'order_id' => $this->order_id,
                        'total' => $this->total,
                        'number' => $this->number,
                        'address' => $this->address,
                    ]);
    }
}
