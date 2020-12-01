<?php

namespace App\Mail;

use App\WithdrawFunds;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WithdrawFundsDone extends Mailable
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
        return $this->markdown('mail.withdrawfund.withdrawfundsdone');
    }
}
