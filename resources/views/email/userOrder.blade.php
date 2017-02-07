<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1  {
            color: #1b6d85;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        }

        p {
            color: gray;
            font-family: "Courier New", Courier, monospace;
            font-style: italic;
        }
    </style>
</head>
<body>
<h1>Thank you for order!!!</h1>

<p>Your order is: {{ $order->product['title'] }}</p>

<P>We will call you!</P>
</body>
</html>