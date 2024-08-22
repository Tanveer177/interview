@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- Button to Add New Product -->
                        <a class="btn btn-info" href="javascript:void(0)" id="createNewProduct">Add New User</a>

                        <!-- Table to Display Products -->
                        <table class="table table-bordered data-table mt-4">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>image</th>
                                    <th width="280px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><img src="{{ asset('images/'.$user->upload_images) }}" alt=""></td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                                            <a href="{{ route('users.update' , $user->id) }}" class="btn btn-info">Update</a>
                                            {{-- <a href="{{ route('users.destroy', $user->id) }}" class="btn btn-danger">Delete</a> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional: Add JavaScript for handling 'Add New Product' button click -->
    <script type="text/javascript">
        document.getElementById('createNewProduct').addEventListener('click', function() {
            // Handle the click event for 'Add New Product' button
            alert('Add New Product button clicked!');
        });
    </script>
@endsection
