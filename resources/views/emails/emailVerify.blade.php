@component('mail::message')


Hello,<br>
<br>
Your 4-Digit verification Code is {{$code}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent
