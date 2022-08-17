@extends('layouts.user')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="text-center py-5">All Messages sent by {{ Auth::guard("web")->user()->name }}. </h4>
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
            </div>
        </div>
    </div>
@endsection
