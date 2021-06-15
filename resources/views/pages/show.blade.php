@extends('layouts.main-layouts')

@section('title', 'Просмотр контакта '.$contact->id )

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/button.css">
@endsection

@section('content')
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card text-center">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{$contact->name}}</h5>
                        <p class="card-text">
                        <h5>Электронная почта : </h5>
                        @foreach($contact->emails as $emails)
                            {{$emails->title}} <br>
                        @endforeach 
                        </p>
                        <h5>Контакты : </h5>
                        @foreach($contact->phones as $phones)
                        +  {{number_format($phones->title, 0, '', ' ') }}  <br>
                        @endforeach 
                        </p>
                        <a href="{{route('contacts.index')}}" class="btn btn-primary">Вернуться ко всем постам</a>
                    </div>
                    <div class="card-footer text-muted">
                        Был создан : {{$contact->created_at}}
                    </div>
                </div> 
            </div>
        </div>
@endsection