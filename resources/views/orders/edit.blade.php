@extends('base')
@section('main')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Редактировать заявку</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <br />
            @endif
            <form method="post" action="{{ route('orders.update', $order->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">

                    <label for="number">Номер заявки:</label>
                    <input type="text" class="form-control" name="number" value={{ $order->number }} />
                </div>

                <div class="form-group">
                    <label for="text">Дата получения от клиента:</label>
                    <input id="datepicker" type="text" class="form-control" name="accepted_at" value={{ $order->accepted_at }} />
                </div>

                <div class="form-group">
                    <label for="title">Название клиента:</label>
                    <input type="text" class="form-control" name="title" value={{ $order->title }} />
                </div>
                <div class="form-group">
                    <label for="text">Текст заявки:</label>
                    <input type="text" class="form-control" name="text" value={{ $order->text }} />
                </div>
                <div class="form-group">
                    <label for="contact_name">Перевозчик контакт:</label>
                    <input type="text" class="form-control" name="contact_name" value={{ $order->contact_name }} />
                </div>
                <div class="form-group">
                    <label for="contact_phone">Телефон перевозчика:</label>
                    <input type="text" class="form-control" name="contact_phone" value={{ $order->contact_phone }} />
                </div>
                <div class="form-group">
                    <label for="ati">АТИ:</label>
                    <a class="float-right" href="https://ati.su/firms/{{$order->ati}}" target="_blank">{{$order->ati}}</a>
                    <input type="text" class="form-control" name="ati" value={{ $order->ati }} />
                </div>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
        /*$( document ).ready(function() {

            $("input[name=ati]").change(function ($el) {
                alert($( this ).val());

            })

        });*/
    </script>
@endsection
