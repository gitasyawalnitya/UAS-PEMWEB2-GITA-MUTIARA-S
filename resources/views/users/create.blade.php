@extends('layout.app')
@section('title', 'Users')

@section('breadcrumb')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Users</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Create</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Create new User</h4>
    </div>
    <div class="card-body">
        <div class="basic-form">
            <form action="{{ route('users-store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control input-default " placeholder="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control input-default " placeholder="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control input-default " placeholder="password" name="password" required>
                </div>

                <div class="row">
                    <div class="mb-3">
                        <label class="form-label">Level</label>
                        <select id="inputState" class="default-select form-control wide" name="level">
                            <option selected="">Choose Level</option>
                            <option value="admin">Admin</option>
                            <option value="writer">Writer</option>
                        </select>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
