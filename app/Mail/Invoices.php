<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use File;
use PDF;

class Invoices extends Mailable
{
    use Queueable, SerializesModels;
    public $project;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        $this->project = $project;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $project = $this->project;
        $company = $this->project->user->userInfo;
        // dd($company);
        $transferista = $this->project->transferista;
        $transferista_info = $this->project->transferista->userInfo;
        $pdf = PDF::loadView('emails.invoices', compact('project', 'company', 'transferista', 'transferista_info'))->setPaper('A4');
        return $this->from(env('INFO_MAIL'), 'Transferista')->subject('Invoices')->view('emails.invoice_mail')->attachData($pdf->output(), $this->project->id.".pdf");
    }
}
