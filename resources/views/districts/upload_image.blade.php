@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Upload District Image</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('district-image.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="district_image" class="form-label">Upload Image</label>
            <input type="file" name="district_image" class="form-control" id="district_image" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Image</button>
    </form>
</div>
@endsection
