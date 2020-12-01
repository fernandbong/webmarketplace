@component('mail::message')
Hello,

Kami telah mentransfer penarikan sebesar Rp.{{$withdrawFunds->dana}}  ke rekening Anda. Harap menunggu sampai dengan 1 hari kerja untuk dana penarikan muncul pada rekening bank Anda, tergantung jenis bank.


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
| **Bank Name :**        | {{$withdrawFunds->bank}}  |
| **Account Number :**   | {{$withdrawFunds->no_rek}}|
| **Amount Credited :**  | {{$withdrawFunds->dana}}  |
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
