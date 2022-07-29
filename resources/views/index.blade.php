@extends('layouts.app')

@section('content')
@php
    $users = DB::table('users')->paginate(6);
@endphp
@foreach ($users as $user)
<div class="card col-6">
    <div class="card-header">
        {{ $user->name }}
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> {{ $user->email }} </p>
    </div>
    <div class="card-footer">
        <div class="row">
            <a href="update/{{ $user->id }}" class="btn btn-primary mx-1">Edit</a>
            <a href="api/user/{{ $user->id }}" class="btn btn-primary mx-1">Details</a>
            <a href="api/user/delete/{{ $user->id }}" class="btn btn-danger mx-1">Delete</a>
        </div>
    </div>
</div>
@endforeach
<div class="row">
{{ $users->onEachSide(0)->links() }}
</div>
@endsection
