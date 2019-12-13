@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $title }}
                </h3>
                @if (isset($account))
                    {!! Form::model($account, ['method' => 'put', 'class' => 'form-horizontal']) !!}
                @else
                    {!! Form::open(['class' => 'form-horizontal']) !!}
                @endif
                @csrf
                <div class="col-md-8 mx-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="text-center">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-form-label col-md-4">Name</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control date" id="name" name="name" placeholder="Account Name" value="{{ isset($account) ? $account->name : '' }}" required>
                        </div>
                    </div>
                    @if (empty($account))
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control date" id="email" name="email" placeholder="Account Email" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-form-label col-md-4">Password</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control date" id="password" name="password" placeholder="Account Password" required>
                        </div>
                    </div>
                    @endif
                    <a href="{{ url('/account') }}" class="btn btn-secondary float-left"><i class="mdi mdi-arrow-left"></i> Kembali</a>
                    <button class="btn btn-primary float-right" type="submit"><i class="mdi mdi-content-save-outline"></i> Simpan</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection