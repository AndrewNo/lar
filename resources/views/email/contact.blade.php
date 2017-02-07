<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            color: #2ab27b;
            text-align: center;
            font-family: Avenir, Helvetica, sans-serif;
        }

        .ms {
            width: 500px;
            margin: 0 auto;
            text-align: center;
            font-style: italic;
            font-size: 18px;
            font-family: "Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Geneva, Verdana, sans-serif;
            color: #6b9dbb;
        }

    </style>
</head>
<body>
<h1>You have new message</h1>
<p>Message from {{ $contact->name }}</p>
<div class="ms">
    <p>{{ $contact->comment }}</p>
</div>
<p>From {{ $contact->created_at }}</p>
<hr>
<p>You can contact with this user by email: {{ $contact->email }}</p>
</body>
</html>