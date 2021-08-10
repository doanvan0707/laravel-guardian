@extends('layouts.index')
@section('content')
    <h3>Set Permision</h3>
    <br>
    <div>
        <form action="{{ route('store-permission') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Group</label>
                        <select name="group_id" id="" class="form-control">
                            <option selected disabled>Select group</option>
                            @foreach($groups as $group)
                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <table class="table">
                <tr>
                    <th>Page</th>
                    <th>Cread</th>
                    <th>Read</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
                @foreach ($pages as $page)
                    <tr>
                        <td>
                            {{ $page->name }}
                            <input type="hidden" name="page_id" value="{{ $page->id }}">
                        </td>
                        <td>
                            <input type="checkbox" name="actions[{{ $page->id }}][]" value="1">
                        </td>
                        <td>
                            <input type="checkbox" name="actions[{{ $page->id }}][]" value="2">
                        </td>
                        <td>
                            <input type="checkbox" name="actions[{{ $page->id }}][]" value="3">
                        </td>
                        <td>
                            <input type="checkbox" name="actions[{{ $page->id }}][]" value="4">
                        </td>
                    </tr>
                @endforeach
            </table>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
@endsection