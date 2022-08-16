@extends("layouts.user")
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class=" col-md-6 card">
                <div class="card-header">
                    User Registration
                </div>
                <div class="card-body">
                    @if (Session::get('success'))
                        <div class="alert alert-info">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    {{-- <form action="{{ route('user.create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter Name"
                                value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Enter email address"
                                value="{{ old('email') }}">
                        </div>
                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password ">
                        </div>
                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div class="mb-3">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control"
                                placeholder="Confirm password ">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <a href="{{ route('user.login') }}">I already have an account</a>
                    </form> --}}

                    <form action="{{ route("user.create") }}" method="post">
                        @csrf
                    <div class="mb-3">
                        <label for="name">Name:</label>
                        <input type="text" name="name" placeholder="Enter Name" class="form-control" value="{{ old("name") }}">

                        @error("name")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter Email" class="form-control" value="{{ old("email") }}">

                        @error("email")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter Password">

                        @error("email")
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
