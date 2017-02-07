<h1>Here is new order</h1>
<h3>Order info:</h3>
<table>
    <tr>
        <td>Product id</td>
        <td>Title:</td>
    </tr>
    <tr>
        <td>{{ $order->product['id'] }}</td>
        <td>{{ $order->product['title'] }}</td>
    </tr>
</table>
<h3>User info:</h3>
<table>
    <tr>
        <td>Name</td>
        <td>Phone</td>
        <td>Email</td>
        <td>City</td>
        <td>Comment</td>
    </tr>
    <tr>
        <td>{{ $order->name }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->city }}</td>
        <td>{{ $order->comment }}</td>
    </tr>
</table>