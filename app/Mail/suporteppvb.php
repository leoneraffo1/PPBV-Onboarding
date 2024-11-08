<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;

class suporteppvb extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.send_message')
            ->with('content', $this->data)
            ->subject('Nova Mensagem Recebida');
    }

    // public function envelope()
    // {
    //     return new Envelope(
    //         from: new Address('example@example.com', 'Test Sender'),
    //         subject: 'Test Email',
    //     );
    // }
}
