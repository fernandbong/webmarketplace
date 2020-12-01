@component('mail::message')
**New Booking from {{$order->user->name}}**

{{$order->order_number}} for {{$order->booking_date}}

Here is the details

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

Total : @currency($order->grand_total)

@component('mail::button', ['url' => url('/project')])
Check Now!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
