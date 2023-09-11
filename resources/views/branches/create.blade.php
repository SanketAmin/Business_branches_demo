@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create a New Branch</h2>
        <form method="POST" action="{{ route('branches.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Branch Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="business_id">Select Business</label>
                <select name="business_id" id="business_id" class="form-control" required>
                    @foreach($businesses as $business)
                        <option value="{{ $business->id }}">{{ $business->name }}</option>
                    @endforeach
                </select>
            </div>
            <div id="days-container">
                <div class="day-entry">
                    <div class="form-group">
                        <label for="day">Select Day</label>
                        <select name="day[]" class="form-control day-select" required>
                            @foreach($days as $day)
                                <option value="{{ $day->id }}">{{ $day->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Start Time</label>
                        <input type="time" name="start_time[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>End Time</label>
                        <input type="time" name="end_time[]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-danger remove-time">-</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-success add-time">+</button>
            <button type="submit" class="btn btn-primary">Create Branch</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        // Add and remove time slots dynamically
        $(document).ready(function () {
            $('.add-time').click(function () {
                const dayEntry = $('.day-entry:first').clone();
                dayEntry.find('select').val('');
                dayEntry.find("input[type='time']").val('');
                $('#days-container').append(dayEntry);
                $('.day-entry:last .add-time').remove();
            });

            $('#days-container').on('click', '.remove-time', function () {
                const dayEntry = $(this).closest('.day-entry');
                if ($('.day-entry').length > 1) {
                    dayEntry.remove();
                } else {
                    alert('At least one day entry is required.');
                }
            });
        });
    </script>
@endpush
