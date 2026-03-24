<?php

namespace App\Mail;

use App\Models\Reservation;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation;

    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

  public function build()
{
    // Ghadi n-diro PDF simple f l-lowel bach n-testiw


    // Hna kan-passiw l-data l-views b-jouj (PDF w Body)
    $pdf = \PDF::loadView('emails.pdf_contract', ['res' => $this->reservation]);

    return $this->subject('Booking Confirmation - Taghazout Wash')
                ->view('emails.confirmation_body', ['res' => $this->reservation]) // Pass 'res' hna!
                ->attachData($pdf->output(), "contract_{$this->reservation->id}.pdf");
}
}