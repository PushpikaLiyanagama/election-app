<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Divisions in {{ $district }}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  

  <div class="container my-5">
    <h4>Divisions in {{ $district }}</h4>

    <div class="row">
      <div class="col-12">
        <div class="division-grid">
          @foreach($divisions as $division)
            <div class="division-item">
              {{ $division->name }}
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
