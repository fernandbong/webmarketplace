@component('mail::message')
**Booking {{$order->order_number}} for {{$order->booking_date}}**

Thanks for your booking

**Here is your receipt**

<table class="table">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Day(s)</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td scope="row">{{ $item->nama_jasa }}</td>
            <td>{{ $item->pivot->quantity }}</td>
            <td>@currency($item->pivot->price)</td>
        </tr>
        @endforeach
    </tbody>
</table>

**Total Cash On Delivery: @currency($order->grand_total)**


Thanks,<br>
{{ config('app.name') }}
@endcomponent
