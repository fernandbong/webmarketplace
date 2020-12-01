@component('mail::message')
New Withdraw Request from Oder ID {{$withdrawFunds->order_id}}

@component('mail::table')
**WITHDRAWAL DETAILS**

|    |                  |
|--- |------------------|
| **Date :**    | {{$withdrawFunds->created_at}}  |
| **Amount :**  | {{$withdrawFunds->dana}}        |
@endcomponent

@component('mail::table')
**BANK ACCOUNT DETAILS**

|    |                 |
|--- |-----------------|
| **Pemilik :**          | {{$withdrawFunds->atas_nama}}  |
| **Bank Name :**        | {{$withdrawFunds->bank}}  |
| **Account Number :**   | {{$withdrawFunds->no_rek}}|
@endcomponent

@component('mail::button', ['url' => url('/admin/withdraw-funds', $withdrawFunds->id)])
Manage Withdraw Request
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
