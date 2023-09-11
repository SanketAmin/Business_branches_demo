@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Branch Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $branch->name }}</h5>
                <p class="card-text">Business Name: {{ $branch->business->name }}</p>
            </div>
        </div>

        <h2>Timings</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
            </thead>
            <tbody>
            @foreach($days as $day)

                @php
                    $dayTimings = $branch->timings->where('day_id', $day->id);
                @endphp
                @if(count($dayTimings) > 0)
                    @foreach($dayTimings as $timing)
                <tr>
                    <td>{{ $day->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($timing->start_time)->format('h:i A') }}</td>
                    <td>{{ \Carbon\Carbon::parse($timing->end_time)->format('h:i A') }}</td>
                </tr>
                    @endforeach
                @else

                    <tr>
                        <td>{{ $day->name }}</td>
                        <td>Closed</td>
                        <td>Closed</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>

        <a href="{{ route('branches.index') }}" class="btn btn-primary">Back to Branches</a>
    </div>
@endsection
