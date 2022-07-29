@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            Create new user
        </div>
        <div class="card-body">
            <form action="/api/user/create" method="GET">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Name:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="name" value="" required>
                </div>
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Email:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="email" value="" required>
                </div>
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Password:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="password" value="" required>
                </div>
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Confirm password:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="password_confirmation" value="" required>
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit">Create user</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
