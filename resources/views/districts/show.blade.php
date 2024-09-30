@extends('layouts.app') <!-- Assuming you're using a layout -->

@section('content')
    <h1>{{ $district->name }}</h1>
    <a href="{{ route('district.divisions', ['district' => $district->name]) }}">View Divisions</a>
@endsection
