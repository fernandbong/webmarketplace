<?php

namespace App\Mail;

use App\WithdrawFunds;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawRequest extends Mailable
{
    use Queueable, SerializesModels;

    public $withdrawFunds;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(WithdrawFunds $withdrawFunds)
    {
        $this->withdrawFunds = $withdrawFunds;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.withdrawfund.withdrawrequest');
    }
}
