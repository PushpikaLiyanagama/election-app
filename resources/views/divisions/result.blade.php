<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $division->division_name }} - Election Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container my-5">
    <h2>Election Results for {{ $division->division_name }}</h2>

    @if($results->isEmpty())
      <p>No election results available for this division.</p>
    @else
      <table class="table table-striped">
        <thead>
          <tr>
            <th>Year</th>
            <th>Candidate</th>
            <th>Votes</th>
          </tr>
        </thead>
        <tbody>
          @foreach($results as $result)
          <tr>
            <td>{{ $result->year }}</td>
            <td>{{ $result->candidate->name }}</td>
            <td>{{ $result->votes }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    @endif

    <div class="text-center mt-4">
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
