@component('mail::message')
<h11>Поступил новый заказ!</h11>
<p>Изделие:</p>
{{ $order->product['title'] }}

<hr>
<h3>Информация о заказчике:</h3>

<h6>Имя:</h6>
<p>{{ $order->name }}</p>
<h6>Телефон:</h6>
<p>{{ $order->phone }}</p>
<h6>E-mail:</h6>
<p>{{ $order->email }}</p>
<h6>Город:</h6>
<p>{{ $order->city }}</p>
<h6>Комментарий к заказу:</h6>
<p>{{ $order->comment }}</p>

Спасибо,<br>
{{ config('app.name') }}
@endcomponent
