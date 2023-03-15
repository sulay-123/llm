@component('mail::message')
Hello,<br>
<br>

{{$content}}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
