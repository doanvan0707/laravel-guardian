@extends('layouts.index')
@section('content')
    Dashboard page
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
@endsection