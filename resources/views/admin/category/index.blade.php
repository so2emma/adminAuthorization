@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>All Categories</h4>
            <a href="{{ route("admin.category.create") }}" class="btn btn-success">New</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <div class="table-responsive m-3">
                <table class="table text-center ">
                    <thead>
                        <tr>
                            <td>S/N</td>
                            <td>Title</td>
                            <td>Status</td>
                            <td>Actions</td>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->status }}</td>
                            <td class="d-flex justify-content-center">
                                    <a href="{{ route("admin.category.edit", $category->id) }}" class="btn btn-primary mx-1">Edit</a>

                                    <form action="{{ route("admin.category.destroy", $category->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>

    </div>
@endsection
