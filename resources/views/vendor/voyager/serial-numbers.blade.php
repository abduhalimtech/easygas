@extends('voyager::master')

@section('content')
    <div class="container">
        <h3>Excel fayl yuklash</h3>

        <form action="{{ route('serial-numbers.store') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="excel_file" required>
            <button type="submit">Saqlash</button>
        </form>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <hr>
        <h3>Yuklangan Fayllar</h3>
        <ul>
            @foreach ($files as $file)
                <li>{{ $file->name }}</li>
            @endforeach
        </ul>
    </div>

    <style>
        .container {
            padding-right: 2%;
            padding-left: 2%;
        }
    </style>
@stop
