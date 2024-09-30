@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New District</h2>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('district.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">District Name</label>
            <input type="text" name="name" class="form-control" id="name" required>
        </div>
        <button type="submit" class="btn btn-primary">Add District</button>
    </form>
</div>
@endsection
