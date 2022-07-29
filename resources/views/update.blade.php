@extends('layouts.app')

@section('content')
@php
    $user = \App\Models\User::findOrFail($id);
@endphp
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            {{ $user->name }}'s Profile
        </div>
        <div class="card-body">
            <form action="../api/user/update/{{ $user->id }}" method="GET">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Name:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Email:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
