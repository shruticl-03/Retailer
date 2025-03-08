@extends('user.layout.app')
@section('content')
    <div class="main-content">
        <h1>Hello, {{ @$user->name }}</h1>
    </div>
@endsection
