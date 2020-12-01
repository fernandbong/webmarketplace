@component('mail::message')
Your booking {{$order->order_number}} is **REJECTED** by {{$order->name}}

You booked {{$order->nama_jasa}} for {{$order->booking_date}}

**Reply this mail to refund with format bellow, and fill the blank form**

Booking Number : {{$order->order_number}} <br>
Date of Booking was made : {{$order->created_at}} <br>
Amount : @currency($order->grand_total) <br>

Bank : _____________ <br>
Nama Pemilik : _____________ <br>
No. Rekening/Akun : _____________ <br>
No. Telp : _____________ <br>

Please wait up to 2 business day for the refund to appear in your bank account, depending on the type of bank.

Thanks,<br>
{{ config('app.name') }}
@endcomponent
