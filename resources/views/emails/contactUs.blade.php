@component('mail::message')

Hello Sir,

{{ $data->msg }}


Thanks,<br>
{{ $data->name }}<br>
{{ $data->email }}<br>
{{ $data->phone }}<br>
@endcomponent
