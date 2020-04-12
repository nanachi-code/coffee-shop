@component('mail::message')
# Introduction


Order successful!
Thank you!
{{--Total:{{$order->cart_total}}--}}


@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent



