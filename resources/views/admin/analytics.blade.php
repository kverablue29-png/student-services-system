
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History & Analytics</title>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #F8EEEE;
            color: #351C1C;
            padding: 30px;
        }

        .container {
            max-width: 1100px;
            margin: auto;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            color: #801818;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #765858;
        }

        .summary {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            border: 1px solid #E5C7C7;
            box-shadow: 0 3px 10px rgba(100, 18, 18, 0.06);
        }

        .summary-card p {
            color: #765858;
            font-size: 14px;
            margin-bottom: 12px;
        }

        .summary-card h2 {
            color: #801818;
            font-size: 30px;
        }

        .chart-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            border: 1px solid #E5C7C7;
            box-shadow: 0 3px 10px rgba(100, 18, 18, 0.06);
        }

        .chart-card h2 {
            color: #801818;
            font-size: 20px;
            margin-bottom: 8px;
        }

        .chart-card p {
            color: #765858;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .chart-container {
            max-width: 420px;
            height: 350px;
            margin: auto;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #801818;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            color: #641212;
        }
    </style>
</head>

<body>

<div class="container">

    <a href="{{ route('dashboard') }}" class="back-link">
        ← Back to Dashboard
    </a>

    <div class="header">
        <h1>History & Analytics</h1>
        <p>Overview of all student service requests.</p>
    </div>

    <div class="summary">

        <div class="summary-card">
            <p>Total Requests</p>
            <h2>{{ $totalRequests }}</h2>
        </div>

        <div class="summary-card">
            <p>Pending</p>
            <h2>{{ $pendingCount }}</h2>
        </div>

        <div class="summary-card">
            <p>In Progress</p>
            <h2>{{ $inProgressCount }}</h2>
        </div>

        <div class="summary-card">
            <p>Completed</p>
            <h2>{{ $completedCount }}</h2>
        </div>

    </div>

    <div class="chart-card">
        <h2>Request Status Distribution</h2>
        <p>Distribution of student requests based on their current status.</p>

        <div class="chart-container">
            <canvas id="statusChart"></canvas>
        </div>
    </div>

</div>

<script>
    const pending = {{ $pendingCount }};
    const inProgress = {{ $inProgressCount }};
    const completed = {{ $completedCount }};

    const ctx = document.getElementById('statusChart');

    new Chart(ctx, {
        type: 'doughnut',

        data: {
            labels: ['Pending', 'In Progress', 'Completed'],

            datasets: [{
                data: [pending, inProgress, completed],

                backgroundColor: [
                    '#D9A441',
                    '#801818',
                    '#6D9B75'
                ],

                borderColor: '#FFFFFF',
                borderWidth: 4,
                hoverOffset: 8
            }]
        },

        options: {
            responsive: true,
            maintainAspectRatio: false,

            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        usePointStyle: true
                    }
                }
            },

            cutout: '65%'
        }
    });
</script>

</body>
</html>
