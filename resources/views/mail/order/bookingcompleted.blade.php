@component('mail::message')
Your project {{$order->order_number}} is **COMPLETED**

@component('mail::table')
**THIS IS THE DETAILS OF YOUR INCOME**

|    |              |
|--- |--------------|
| **Booking Number :**    | {{$order->order_number}}  |
| **Customer Payment :**    | {{$order->payment_method}}  |
| **Amount :**  | @currency($order->grand_total)        |
@endcomponent


**IMPORTANT**<br>
**If customer payment is PayPal, you can request withdrawal of your income. Check using button bellow!**

@component('mail::button', ['url' => url('/project')])
Check your project here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
