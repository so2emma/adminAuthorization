@extends('layouts.admin')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 overflow-auto">
                <h4 class="text-center py-5">All Messages sent to ADMIN </h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Message Sent</th>
                        </tr>
                    </thead>
                    @if (!(count($messages) == 0))
                        @foreach ($messages as $message)
                            <tbody>
                                <tr>
                                    <td>{{ $message->user->name }}</td>
                                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->toFormattedDateString() }}</td>
                                    <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $message->created_at)->toTimeString() }}</td>
                                    <td>{{ $message->message }}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    @else
                        <div class="text-info">
                            No messages Yet.
                        </div>
                    @endif

                </table>

                {{ $messages->links() }}
            </div>
        </div>
    </div>
@endsection
