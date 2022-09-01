@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <h4>Create Categories</h4>
            <a href="{{ route('admin.category.index') }}" class="btn btn-success">Back</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form class="m-3" action="{{ route("admin.category.store") }}" method="POST">
                @csrf
                <div class="m-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" >

                </div>

                <div class="m-3">
                    <label for="title" class="form-label">Status:</label>
                    <select name="status" id="" class="form-control">
                        <option  selected value=""></option>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>

                <div class="m-3">
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </form>
        </div>

    </div>
@endsection
