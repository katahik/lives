@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            ユーザー情報
        </div>
        <div class="card-body">
        <div class="row">
            <label class="col-2"><i class="far fa-user"></i></label>
            <div class="col-10">
                <h3 class="card-title">{{ $user->name }}</h3>
            </div>
        </div>

        <div class="row">
            <label class="col-2"><i class="far fa-envelope"></i></label>
            <div class="col-10">
                <h3 class="card-title">{{ $user->email }}</h3>
            </div>
        </div>
        </div>
    </div>

@endsection
