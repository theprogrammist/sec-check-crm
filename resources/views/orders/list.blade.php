@extends('base')

@section('main')
    <div class="row">
        <div class="col-sm-12">
            <h1 class="display-3">Заявки</h1>

            <div>
                <a style="margin: 19px;" href="{{ route('orders.create')}}" class="btn btn-primary">Создать заявку</a>
            </div>

            <div class="col-sm-12">

                @if(session()->get('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
            </div>

            <table class="table table-striped">
                <thead>
                <tr>
                    <td>Номер</td>
                    <td>Получена</td>
                    <td>Название</td>
                    <td>Текст</td>
                    <td>Контакт</td>
                    <td>АТИ</td>
                    <td colspan = 2>действия</td>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->number}}</td>
                        <td class="nowrap">{{date('Y-m-d', $order->accepted_at->getTimestamp())}}</td>
                        <td>{{$order->title}}</td>
                        <td>{{$order->text}}</td>
                        <td>{{$order->contact_name}} {{$order->contact_phone}}</td>
                        <td><a href="https://ati.su/firms/{{$order->ati}}" target="_blank">{{$order->ati}}</a></td>
                        <td>
                            <a href="{{ route('orders.edit',$order->id)}}" class="btn btn-primary">Редактировать</a>
                        </td>
                        <td>
                            <form action="{{ route('orders.destroy', $order->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
            </div>
@endsection
