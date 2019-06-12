<?php

namespace App\Mail;

use App\models\client;
use App\models\Reservation;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class carReserved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('automa.ensa.2019@gmail.com')->to(User::find(client::find($this->reservation->client_id)->user_id)->email)
        ->view('emails.carReserved')->with('reservation',$this->reservation);
    }
}
