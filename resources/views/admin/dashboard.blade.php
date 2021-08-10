@extends('layouts.index')
@section('content')
    <h3>Dashboard page</h3>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <br>
    <a href="{{ route('create-permission') }}" class="btn btn-success">Set Permision</a>
    <a href="{{ route('set-join-group') }}" class="btn btn-success">Set user join group</a>
@endsection