@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="text-center">
            <h4>ADMIN HOME PAGE</h4>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <form method="POST" action="{{ route("admin.status", $user->id) }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary"> {{$user->activated ? "Deactivate" : "Activate" }} </button>
                                    </form>

                                    {{-- @if ($user->activated)
                                        <a href="" class="btn btn-primary">Deactivate</a>
                                    @else
                                        <a href="" class="btn btn-primary">Activate</a>
                                    @endif --}}

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
