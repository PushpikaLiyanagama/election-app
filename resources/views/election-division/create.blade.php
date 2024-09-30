@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Election Division</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('election-division.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="district_id" class="form-label">Select District</label>
            <select name="district_id" class="form-control" required>
                <option value="">-- Select District --</option>
                @foreach($districts as $district)
                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="division_name" class="form-label">Election Division Name</label>
            <input type="text" name="division_name" class="form-control" id="division_name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Election Division</button>
    </form>
</div>
@endsection
