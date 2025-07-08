<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $top5produk;

    public function __construct($top5produk)
    {
        $this->top5produk = $top5produk;
    }

    public function build()
    {
        return $this->subject('Test Email from Laravel')
            ->view('emails.test', [
                'top5produk' => $this->top5produk
            ]);
    }
}
