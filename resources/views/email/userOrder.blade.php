@component('mail::message')
Вы заказали {{ $order->product['title'] }}.
Номер Вашего заказа {{ $order->id }}

@component('mail::button', ['url' => 'http://test.com'])
Заказать еще
@endcomponent

Спасибо,<br>
в скором времени мы с Вами свяжемся
@endcomponent
