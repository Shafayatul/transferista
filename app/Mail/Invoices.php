<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use File;

class Invoices extends Mailable
{
    use Queueable, SerializesModels;
    public $pdf_invoice, $project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdf_invoice, $project)
    {
        $this->pdf_invoice = $pdf_invoice;
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.invoice_mail')->attachData(base64_decode($this->fileContents), 'file.pdf');
    }
}
