@extends('admin.base')

@section('content')
    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>E-mail</td>
                <td>Phone</td>
                <td>City</td>
                <td>Comment</td>
                <td>Date</td>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->comment }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="#" class="btn btn-info my_show">Show Details</a>
                        <div class="product">


                            <table class="table table-striped" >
                                <thead>
                                <tr>
                                    <td>Id</td>
                                    <td>Product</td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $order->product['id'] }}</td>
                                    <td>{{ $order->product['title'] }}</td>
                                    <td><a href="#" class="btn btn-info my_hide">Hide</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="/admin/orders" class="btn btn-primary">Back</a>
    </div>

    <script>
        $(document).ready(function () {
            $('.product').css({'display' : 'none', 'position' : 'absolute', 'top' : '30%', 'left' : '5%', 'width':
                '85%', 'border': '3px solid gray'});

            $('.my_show').on('click', function (e) {
                e.preventDefault();
                $(this).next().show("slow");
                $(this).hide("slow");
            });

            $('.my_hide').on('click', function (e) {
                e.preventDefault();
                $('.product').hide("slow");
                $('.my_show').show("slow");
            });

        });
    </script>
@stop
