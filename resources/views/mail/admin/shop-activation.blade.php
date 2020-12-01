@component('mail::message')
**Photographer profile activation request**

Please activate this photographer profile.

Name : {{$shop->name}}<br>
E-Mail : {{$shop->email}}<br>
Contact : {{$shop->contact}}

@component('mail::button', ['url' => url('/admin/shops', $shop->id)])
Activation
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
