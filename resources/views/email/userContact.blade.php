@component('mail::message')
Вы получили сообщение с Вашего сайта с таким содержаением:
<p>{{ $contact->comment }}</p>
<br>
{{ $contact->created_at }}
<hr>
От пользователя:
{{ $contact->name }}

Связаться с ним можно через:
{{ $contact->email }}


Сообщение доставлено от,<br>
{{ config('app.name') }}
@endcomponent
