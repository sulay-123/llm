@component('mail::message')

Hello,<br>
<br>
{{$message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
