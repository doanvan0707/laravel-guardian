@extends('layouts.index')
@section('content')
    <h3>Join group</h3>
    <br>
    <form action="{{ route('store-join-group') }}" method="POST">
        @csrf
        <div class="col-md-6">
            <div class="form-group">
                <label for="">User</label>
                <select name="user_id" id="" class="form-control">
                    <option selected disabled>Select User</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Group</label>
                <select name="group_id" id="" class="form-control">
                    <option selected disabled>Select Group</option>
                    @foreach ($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </form>
@endsection