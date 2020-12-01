<?php

namespace App\Observers;

use App\Mail\WithdrawFundsDone;
use App\WithdrawFunds;
use Illuminate\Support\Facades\Mail;

class WithdrawFundsObserver
{
    /**
     * Handle the withdraw funds "created" event.
     *
     * @param  \App\WithdrawFunds  $withdrawFunds
     * @return void
     */
    public function created(WithdrawFunds $withdrawFunds)
    {
        //
    }

    /**
     * Handle the withdraw funds "updated" event.
     *
     * @param  \App\WithdrawFunds  $withdrawFunds
     * @return void
     */
    public function updated(WithdrawFunds $withdrawFunds)
    {
         //cek jika kolom active berubah dari false ke true
         if($withdrawFunds->getOriginal('is_done') == false && $withdrawFunds->is_done == true) {

            //kirim email
            $user = WithdrawFunds::select('*')
                        ->leftJoin('users', 'users.id', '=', 'withdraw_funds.user_id')
                        ->where('withdraw_funds.id', $withdrawFunds->id)->first();

            Mail::to($user->email)->send(new WithdrawFundsDone($withdrawFunds));
        }else {


        }
    }

    /**
     * Handle the withdraw funds "deleted" event.
     *
     * @param  \App\WithdrawFunds  $withdrawFunds
     * @return void
     */
    public function deleted(WithdrawFunds $withdrawFunds)
    {
        //
    }

    /**
     * Handle the withdraw funds "restored" event.
     *
     * @param  \App\WithdrawFunds  $withdrawFunds
     * @return void
     */
    public function restored(WithdrawFunds $withdrawFunds)
    {
        //
    }

    /**
     * Handle the withdraw funds "force deleted" event.
     *
     * @param  \App\WithdrawFunds  $withdrawFunds
     * @return void
     */
    public function forceDeleted(WithdrawFunds $withdrawFunds)
    {
        //
    }
}
