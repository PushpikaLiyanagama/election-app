<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Election Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('district.create') }}">Add District</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('election-division.create') }}">Add Election Division</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('candidate.create') }}">Add Candidate Name</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('election-results.create') }}">Add Election Result</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('district-image.create') }}">Upload District Image</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mt-4">
        <h1>Election Results</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>District</th>
                    <th>Division</th>
                    <th>Year</th>
                    <th>Team</th>
                    <th>Candidate Name</th>
                    <th>Votes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($electionResults as $result)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $result->district->name }}</td>
                    <td>{{ $result->division->division_name }}</td>
                    <td>{{ $result->year }}</td>
                    <td>{{ $result->candidate->team }}</td>
                    <td>{{ $result->candidate->candidate_name }}</td>
                    <td>{{ $result->votes }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('election-results.edit', $result->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Delete Button -->
                        <form action="{{ route('election-results.destroy', $result->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies (Popper.js, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
