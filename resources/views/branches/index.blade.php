@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h3>
                    All Branches
                </h3>
                <div class="mb-3">
                    <a href="{{ route('branches.create') }}" class="btn btn-primary">Create Branch</a>
                </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
