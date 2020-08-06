@extends('base')

@section('main')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />

    <div class="row">
        <div class="col-sm-8 offset-sm-2">
            <h1 class="display-3">Добавить заявку</h1>
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif
                <form method="post" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="number">Номер заявки:</label>
                        <input type="text" class="form-control" name="number"/>
                    </div>

                    <div class="form-group">
                        <label for="accepted_at">Дата получения от клиента:</label>
                        <input id="datepicker" type="text" class="form-control" name="accepted_at"/>
                    </div>

                    <div class="form-group">
                        <label for="title">Название клиента:</label>
                        <input type="text" class="form-control" name="title"/>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст заявки:</label>
                        <input type="text" class="form-control" name="text"/>
                    </div>
                    <div class="form-group">
                        <label for="contact_name">Перевозчик контакт:</label>
                        <input type="text" class="form-control" name="contact_name"/>
                    </div>
                    <div class="form-group">
                        <label for="contact_phone">Телефон перевозчика:</label>
                        <input type="text" class="form-control" name="contact_phone"/>
                    </div>
                    <div class="form-group">
                        <label for="ati">АТИ:</label>
                        <input type="text" class="form-control" name="ati"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать заявку</button>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#datepicker').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        });
    </script>
@endsection
