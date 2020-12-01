@component('mail::message')
Congrats,

Your Photographer profile is now active. Add more photos portfolio for your profile.

@component('mail::button', ['url' => url('/admin/shops', $shop->id)])
Set Up Your Profile
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
