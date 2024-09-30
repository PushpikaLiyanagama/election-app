<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $district->name }} - Election Divisions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .division-item {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 15px;
      background-color: #f8f9fa;
      margin-bottom: 10px;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <!-- District Header -->
    <div class="text-center mb-4">
      <h2>Election Divisions in {{ $district->name }}</h2>
    </div>

    <!-- Division List -->
    <div class="row">
      @if($divisions->isEmpty())
        <div class="col-12">
          <p class="text-center">No divisions available for this district.</p>
        </div>
      @else
        @foreach($divisions as $division)
        <div class="col-md-4">
          <div class="division-item">
            <p>{{ $division->division_name }}</p>
            <a href="{{ route('division.results', $division->id) }}" class="btn btn-primary">View Results</a>
          </div>
        </div>
        @endforeach
      @endif
    </div>

    <!-- Back Button -->
    <div class="text-center mt-4">
      <a href="{{ url('/') }}" class="btn btn-secondary">Back to District List</a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
