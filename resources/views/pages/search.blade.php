@extends('layouts.main-layouts')

@section('title', 'Все контакты')

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/button.css">
@endsection

@section('content')
        
        <div class="row">
        <div class="col-lg-6 mx-auto">
        @if(count($contacts) == 0)
        <div class="alert alert-warning">
            <strong>Извините!</strong> Контакты не найдены.... <br>
        </div>
        <a href="{{route('contacts.index')}}" class="btn btn-primary">Вернуться ко всем постам</a> 
        @else
        <a href="{{route('contacts.create')}}" class="btn btn-success">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
        </svg>
        Создать контакт
        </a>

        <table class="table table-striped mt-3">
        <thead>
            <tr>
            <th scope="col">№</th>
            <th scope="col">ФИО</th>
            <th scope="col">Emails</th>
            <th scope="col">Номера телефонов</th>
            </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
            <th scope="row">{{$contact->id}}</th>
            <td>{{$contact->name}}</td>
            <td>
                @foreach($contact->emails as $emails)
                    {{$emails->title}} <br>
                @endforeach
            </td>
            <td>
                @foreach($contact->phones as $phones)
                  +  {{number_format($phones->title, 0, '', ' ') }} <br>
                @endforeach
            </td>
            <td class="table-buttons"> 
            <a href="{{route('contacts.show' , $contact)}}" class="btn btn-success">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.134 13.134 0 0 0 1.66 2.043C4.12 11.332 5.88 12.5 8 12.5c2.12 0 3.879-1.168 5.168-2.457A13.134 13.134 0 0 0 14.828 8a13.133 13.133 0 0 0-1.66-2.043C11.879 4.668 10.119 3.5 8 3.5c-2.12 0-3.879 1.168-5.168 2.457A13.133 13.133 0 0 0 1.172 8z"/>
                    <path fill-rule="evenodd" d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
            </a>
                 <a href="{{route('contacts.edit' , $contact)}}" class="btn btn-primary">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"/>
            </svg>
            </a> 
            <form method="post" action="{{route('contacts.destroy' , $contact)}}">
            @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                    </svg>
                </button>
            </form>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
        <a href="{{route('contacts.index')}}" class="btn btn-primary">Вернуться ко всем постам</a>
        </div>
        </div>
        @endif
@endsection