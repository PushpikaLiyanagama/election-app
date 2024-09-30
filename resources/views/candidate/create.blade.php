@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Candidate</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('candidate.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <input type="number" name="year" class="form-control" id="year" required min="1900" max="{{ date('Y') }}">
        </div>
        <div class="mb-3">
            <label for="team" class="form-label">Team</label>
            <input type="text" name="team" class="form-control" id="team" required>
        </div>
        <div class="mb-3">
            <label for="candidate_name" class="form-label">Candidate Name</label>
            <input type="text" name="candidate_name" class="form-control" id="candidate_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Candidate</button>
    </form>
</div>
@endsection
