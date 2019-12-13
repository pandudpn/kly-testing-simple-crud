@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">
                    {{ $title }}
                </h3>
                @if (isset($files))
                    {!! Form::model($files, ['method' => 'put', 'class' => 'form-horizontal', 'files' => true]) !!}
                    <input type="hidden" class="form-control" id="photo_old" name="photo_old" value="{{ $files[5] }}">
                @else
                    {!! Form::open(['class' => 'form-horizontal', 'files' => true]) !!}
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
                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($files) ? $files[0] : "" }}" placeholder="Account Name" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-form-label col-md-4">Email</label>
                        <div class="col-md-8">
                            <input type="email" class="form-control" id="email" name="email" value="{{ isset($files) ? $files[1] : "" }}" placeholder="email@email.com" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telp" class="col-form-label col-md-4">Phone Number</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" id="telp" name="telp" value="{{ isset($files) ? $files[3] : "" }}" placeholder="0821222xxxxx" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="birthday" class="col-form-label col-md-4">Birthday</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control date" id="birthday" name="birthday" value="{{ isset($files) ? $files[2] : "" }}" placeholder="YYYY-MM-DD" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-form-label col-md-4">Gender</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="male">
                                    <input type="radio" name="gender" id="male" value="male" {{ isset($files) ? $files[4] == "male" ? "checked" : null : null }}>
                                    Male
                                </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="female">
                                    <input type="radio" name="gender" id="female" value="female" {{ isset($files) ? $files[4] == "female" ? "checked" : null : null }}>
                                    Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-form-label col-md-4">Photo</label>
                        <div class="col-md-8">
                            <input type="file" class="form-control" name="photo" />
                        </div>
                    </div>
                    @if (isset($files))
                        <div class="mt-2 mb-5 d-block mx-auto" style="width: 200px; height: 200px;">
                            <img src="{{ asset("/images/$files[5]") }}" style="width: 100%; height: 100%; object-fit: cover;">
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

@section('script')
    <script>
        $(document).ready(function() {
            $('.date').datetimepicker({
                autoclose: true,
                timepicker: false,
                format: 'Y-m-d'
            })
        })
    </script>
@endsection