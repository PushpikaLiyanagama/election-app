<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $division->division_name }} - Election Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> <!-- Add Chart.js Data Labels Plugin -->
  <style>
    .result-card {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      height: 400px;
      text-align: center;
    }
    .canvas-container {
      height: 300px;
    }
  </style>
</head>
<body>
  <div class="container my-5">
    <h2>Election Results for {{ $division->division_name }}</h2>

    <div class="row">
      <!-- Year 2015 -->
      <div class="col-md-4">
        <div class="result-card">
          <h5>2015 Result</h5>
          <div class="canvas-container">
            @if($results->where('year', 2015)->isEmpty())
              <p>Results are pending</p>
            @else
              <canvas id="result2015"></canvas>
            @endif
          </div>
        </div>
      </div>

      <!-- Year 2019 -->
      <div class="col-md-4">
        <div class="result-card">
          <h5>2019 Result</h5>
          <div class="canvas-container">
            @if($results->where('year', 2019)->isEmpty())
              <p>Results are pending</p>
            @else
              <canvas id="result2019"></canvas>
            @endif
          </div>
        </div>
      </div>

      <!-- Year 2024 -->
      <div class="col-md-4">
        <div class="result-card">
          <h5>2024 Result</h5>
          <div class="canvas-container">
            @if($results->where('year', 2024)->isEmpty())
              <p>Results are pending</p>
            @else
              <canvas id="result2024"></canvas>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="text-center mt-4">
      <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
  </div>

  <script>
    // Prepare pie chart data for each year

    @if(!$results->where('year', 2015)->isEmpty())
    const result2015 = new Chart(document.getElementById('result2015').getContext('2d'), {
      type: 'pie',
      data: {
        labels: [
          @foreach($results->where('year', 2015) as $result)
            "{{ $result->candidate->candidate_name }}",
          @endforeach
        ],
        datasets: [{
          data: [
            @foreach($results->where('year', 2015) as $result)
              {{ $result->votes }},
            @endforeach
          ],
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          datalabels: {
            formatter: (value, context) => {
              let percentage = ((value / context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0)) * 100).toFixed(2);
              return `${value} votes\n(${percentage}%)`;
            },
            color: '#000',
            font: {
              weight: 'bold'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });
    @endif

    @if(!$results->where('year', 2019)->isEmpty())
    const result2019 = new Chart(document.getElementById('result2019').getContext('2d'), {
      type: 'pie',
      data: {
        labels: [
          @foreach($results->where('year', 2019) as $result)
            "{{ $result->candidate->candidate_name }}",
          @endforeach
        ],
        datasets: [{
          data: [
            @foreach($results->where('year', 2019) as $result)
              {{ $result->votes }},
            @endforeach
          ],
          backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'],
          borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          datalabels: {
            formatter: (value, context) => {
              let percentage = ((value / context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0)) * 100).toFixed(2);
              return `${value} votes\n(${percentage}%)`;
            },
            color: '#000',
            font: {
              weight: 'bold'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });
    @endif

    @if(!$results->where('year', 2024)->isEmpty())
    const result2024 = new Chart(document.getElementById('result2024').getContext('2d'), {
      type: 'pie',
      data: {
        labels: [
          @foreach($results->where('year', 2024) as $result)
            "{{ $result->candidate->candidate_name }}",
          @endforeach
        ],
        datasets: [{
          data: [
            @foreach($results->where('year', 2024) as $result)
              {{ $result->votes }},
            @endforeach
          ],
          backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
          borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          datalabels: {
            formatter: (value, context) => {
              let percentage = ((value / context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0)) * 100).toFixed(2);
              return `${value} votes\n(${percentage}%)`;
            },
            color: '#000',
            font: {
              weight: 'bold'
            }
          }
        }
      },
      plugins: [ChartDataLabels]
    });
    @endif

  </script>
</body>
</html>
