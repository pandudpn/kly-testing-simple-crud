@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $title }}</h3>
                <div class="col-md-8 mx-auto">
                    @if (session('success'))
                        <div class="alert alert-success">
                            <h5 class="text-center">{{ session('success') }}</h5>
                        </div>
                    @elseif(session('error'))
                        <div class="alert alert-danger">
                            <h5 class="text-center">{{ session('error') }}</h5>
                        </div>
                    @endif
                </div>
                <table class="table table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>
                                <center>No</center>
                            </th>
                            <th>
                                <center>Name</center>
                            </th>
                            <th>
                                <center>Email</center>
                            </th>
                            <th>
                                <center>Birthday</center>
                            </th>
                            <th>
                                <center>Phone Number</center>
                            </th>
                            <th>
                                <center>Gender</center>
                            </th>
                            <th>
                                <center>Photo</center>
                            </th>
                            <th>
                                <center>Actions</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($files as $row)
                            @php
                                $content    = \File::get(public_path()."/data/".$row->getFilename());
                                $data       = explode(',', $content);
                                $url        = explode('.', $row->getFilename());
                            @endphp
                            <tr>
                                <td>
                                    <center>{{ $no++ }}</center>
                                </td>
                                <td>
                                    <center>{{ $data[0] }}</center>
                                </td>
                                <td>
                                    <center>{{ $data[1] }}</center>
                                </td>
                                <td>
                                    <center>{{ $data[2] }}</center>
                                </td>
                                <td>
                                    <center>{{ $data[3] }}</center>
                                </td>
                                <td>
                                    <center>{{ $data[4] }}</center>
                                </td>
                                <td>
                                    <center>
                                        <div style="width: 100px; height: 100px;">
                                            <img src="{{ asset("/images/$data[5]") }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        </div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <form action="{{ url('/crud/delete/'.$row->getFilename()) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{ url('/crud/edit/'.$url[0]) }}" class="btn btn-sm btn-primary"><i class="mdi mdi-pencil"></i> Edit</a>
                                            <button class="btn btn-sm btn-danger" type="submit"><i class="mdi mdi-delete"></i> Delete</button>
                                        </form>
                                    </center>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('.alert').delay(5000).fadeOut('slow');
            $('#table').DataTable({
                oLanguage: {
                    sLengthMenu: '_MENU_ Data Per Pages <a href={{ url("/crud/new") }} class="btn btn-info btn-sm">New Data</a>'
                },
                scrollX: true
            });
        })
    </script>
@endsection