@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
        <h4 class="">All Messages sent by {{ Auth::guard('web')->user()->name }}. </h4>

        <a href="{{ route("user.message.create") }}" class="btn btn-success">New Message</a>
        </div>

    </div>

    <div class="container">
        <div class="card">
            <div class="m-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message Sent</th>
                        </tr>
                    </thead>
                    @if (!(count($messages) == 0))
                        @foreach ($messages as $message)
                            <tbody>
                                <tr>
                                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->toFormattedDateString() }}
                                    </td>
                                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->toTimeString() }}
                                    </td>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            No messages Yet.
                        </div>
                    @endif

                </table>
            </div>

        </div>
    </div>
@endsection
