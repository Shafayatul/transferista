<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Credits extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf_credit, $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf_credit, $project)
    {
        $this->pdf_credit = $pdf_credit;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.credit_mail')->attach('emails.credits', [
                    'as' => '5.pdf',
                    'mime' => 'application/pdf',
                ]);
    }
}
