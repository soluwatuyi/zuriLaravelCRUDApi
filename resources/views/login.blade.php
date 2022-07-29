@extends('layouts.app')

@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="api/user/login" method="GET">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <strong>
                            Email:
                        </strong>
                    </label>
                    <input type="text" class="form-control" name="email" value="">
                </div>
                <div class="form-group">
                    <label for="password">
                        <strong>
                            Password:
                        </strong>
                    </label>
                    <input type="password" class="form-control" name="password" value="">
                </div>
                <div class="row">
                    <button class="btn btn-primary" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
