<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $district->name }} - Divisions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .division-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
      text-align: center;
    }
    .division-item {
      padding: 20px;
      border: 1px solid #ddd;
      border-radius: 15px;
      background-color: #f8f9fa;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <h2 class="text-center mb-4">{{ $district->name }} - Election Divisions</h2>
    <div class="division-grid">
      @foreach ($divisions as $division)
        <div class="division-item">
          {{ $division->name }}
          <button class="btn btn-primary mt-2">View</button>
        </div>
      @endforeach
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
