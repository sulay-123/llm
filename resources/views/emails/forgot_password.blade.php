@component('mail::message')
Hello,<br>
<br>
Here is your new password {{$password}}



Thanks,<br>
{{ config('app.name') }}
@endcomponent