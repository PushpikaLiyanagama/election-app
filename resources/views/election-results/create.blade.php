@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Election Result</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('election-results.store') }}" method="POST">
        @csrf
        <!-- District Selection -->
        <div class="mb-3">
            <label for="district_id" class="form-label">Select District</label>
            <select name="district_id" class="form-control" required>
                <option value="">-- Select District --</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Election Division Selection -->
        <div class="mb-3">
            <label for="division_id" class="form-label">Select Election Division</label>
            <select name="division_id" class="form-control" required>
                <option value="">-- Select Election Division --</option>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Year Selection -->
        <div class="mb-3">
            <label for="year" class="form-label">Select Year</label>
            <select name="year" class="form-control" required>
                <option value="">-- Select Year --</option>
                @foreach($years as $year)
                    <option value="{{ $year }}">{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <!-- Candidate Selection -->
        <div class="mb-3">
            <label for="candidate_id" class="form-label">Select Candidate</label>
            <select name="candidate_id" class="form-control" required>
                <option value="">-- Select Candidate --</option>
                @foreach($candidates as $candidate)
                    <option value="{{ $candidate->id }}">{{ $candidate->candidate_name }} (Team: {{ $candidate->team }})</option>
                @endforeach
            </select>
        </div>

        <!-- Votes Input -->
        <div class="mb-3">
            <label for="votes" class="form-label">Number of Votes</label>
            <input type="number" name="votes" class="form-control" id="votes" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Add Election Result</button>
    </form>
</div>
@endsection
