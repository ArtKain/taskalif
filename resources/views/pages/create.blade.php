@extends('layouts.main-layouts')

@section('title', 'Создать контакт')

@section('content')
        <div class="row">
            <div class="col-lg-6 mx-auto">
             <form  action="{{route('contacts.store')}}"  method="post">
             @csrf
                <label class=" col-form-label">ФИО :</label><br>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" id="name" placeholder="Введите фамилию имя очество">
                </div><br>
                <label class=" col-form-label">Email :</label><br>
                <div id="emails">
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="emails[]" placeholder="Введите email">
                    </div>
                </div><br>
                <button type="button" class="btn btn-primary" id="addEmail">Ещё</button><br>
                <label class=" col-form-label">Телефон :</label><br>
                <div id="phones">
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="phones[]" placeholder="Введите телефон">
                    </div>
                </div><br>
                <button type="button" class="btn btn-primary" id="addPhone">Ещё</button><br><br>
                <button type="submit" class="btn btn-success">Отправить</button>
                </form>
            </div>
        </div>

        <script>
        
        document.getElementById('addEmail').addEventListener('click', function () {
            let div = document.createElement('div');
            div.classList.add('col-sm-10');
            let input = document.createElement('input');
            input.type = 'email';
            input.name = 'emails[]';
            input.placeholder = 'Введите Email';
            input.classList.add('form-control');
            div.appendChild(input);

            document.getElementById('emails').appendChild(div);
            

        })
        
        document.getElementById('addPhone').addEventListener('click', function () {
            let div = document.createElement('div');
            div.classList.add('col-sm-10');
            let input = document.createElement('input');
            input.type = 'phone';
            input.name = 'phones[]';
            input.placeholder = 'Введите телефон';
            input.classList.add('form-control');
            div.appendChild(input);

            document.getElementById('phones').appendChild(div);
            

        })
        </script>
@endsection