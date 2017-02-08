@extends('admin.base')

@section('content')
    <div class="page-header">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>Id</td>
                <td>Имя</td>
                <td>E-mail</td>
                <td>Сообщение</td>
            </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->comment }}</td>
                </tr>

            @endforeach

            </tbody>
        </table>
    </div>
@stop
