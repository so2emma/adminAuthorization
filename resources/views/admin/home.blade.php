<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Dashboard | Home</title>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 45px">
                <h4>Admin Dashboard</h4>
                <table class="table table-stripped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td scope="row">{{ Auth::guard("admin")->user()->name }}</td>
                            <td>{{ Auth::guard("web")->user()->email }}</td>
                            <td>{{ Auth::guard("web")->user()->phone }}</td>
                            <td><a href="{{ route("user.logout") }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="btn btn-success">Logout</a>
                                <form action="{{ route("user.logout") }}" id="logout-form" class="d-none" method="post">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
