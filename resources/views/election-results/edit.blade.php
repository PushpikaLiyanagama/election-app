@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Election Result</h2>

    <form action="{{ route('election-results.update', $result->id) }}" method="POST">
        @csrf
        @method('PUT')
        <!-- District Selection -->
        <div class="mb-3">
            <label for="district_id" class="form-label">Select District</label>
            <select name="district_id" class="form-control" required>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}" {{ $result->district_id == $district->id ? 'selected' : '' }}>
                        {{ $district->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Election Division Selection -->
        <div class="mb-3">
            <label for="division_id" class="form-label">Select Election Division</label>
            <select name="division_id" class="form-control" required>
                @foreach($divisions as $division)
                    <option value="{{ $division->id }}" {{ $result->division_id == $division->id ? 'selected' : '' }}>
                        {{ $division->division_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Year Selection -->
        <div class="mb-3">
            <label for="year" class="form-label">Select Year</label>
            <select name="year" class="form-control" required>
                @foreach($years as $year)
                    <option value="{{ $year }}" {{ $result->year == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
        </div>

        <!-- Candidate Selection -->
        <div class="mb-3">
            <label for="candidate_id" class="form-label">Select Candidate</label>
            <select name="candidate_id" class="form-control" required>
                @foreach($candidates as $candidate)
                    <option value="{{ $candidate->id }}" {{ $result->candidate_id == $candidate->id ? 'selected' : '' }}>
                        {{ $candidate->candidate_name }} (Team: {{ $candidate->team }})
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Votes Input -->
        <div class="mb-3">
            <label for="votes" class="form-label">Number of Votes</label>
            <input type="number" name="votes" class="form-control" value="{{ $result->votes }}" required min="0">
        </div>

        <button type="submit" class="btn btn-primary">Update Election Result</button>
    </form>
</div>
@endsection

