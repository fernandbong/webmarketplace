@component('mail::message')
Your booking {{$order->order_number}} is **ACCEPTED** by {{$order->name}}

You booked {{$order->nama_jasa}} for {{$order->booking_date}}

**Don't forget, keep the date not to be missed!**

@component('mail::button', ['url' => url('/history')])
See your book details here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
