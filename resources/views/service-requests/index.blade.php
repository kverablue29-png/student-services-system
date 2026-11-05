
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Service Requests</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #F8EEEE;
            color: #351C1C;
        }

        header {
            background: linear-gradient(135deg, #641212, #801818);
            color: white;
            padding: 20px 8%;
            box-shadow: 0 3px 12px rgba(100, 18, 18, 0.15);
        }

        header h2 {
            margin: 0;
            font-size: 23px;
        }

        .container {
            max-width: 1000px;
            margin: 35px auto;
            padding: 0 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .top-bar h1 {
            color: #801818;
            margin: 0 0 10px;
            font-size: 28px;
        }

        .top-bar p {
            color: #765858;
            line-height: 1.6;
            margin: 0;
        }

        .top-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-block;
            background: #801818;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            text-align: center;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: #641212;
        }

        .success {
            background: #DCFCE7;
            color: #166534;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #239653;
        }

        .filter-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin: 20px 0 30px;
            background: white;
            padding: 18px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(100, 18, 18, 0.06);
            border: 1px solid #E5C7C7;
        }

        .filter-form input,
        .filter-form select {
            flex: 1;
            min-width: 180px;
            padding: 12px;
            border: 1px solid #D9B1B1;
            border-radius: 8px;
            font-size: 14px;
            background: white;
            color: #351C1C;
        }

        .filter-form input:focus,
        .filter-form select:focus {
            outline: none;
            border-color: #801818;
            box-shadow: 0 0 0 3px rgba(128, 24, 24, 0.12);
        }

        .filter-btn,
        .reset-btn {
            display: inline-block;
            padding: 12px 18px;
            border: none;
            border-radius: 8px;
            background: #801818;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            font-weight: bold;
        }

        .filter-btn:hover {
            background: #641212;
        }

        .reset-btn {
            background: #EEDDDD;
            color: #641212;
        }

        .reset-btn:hover {
            background: #E5C7C7;
        }

        .status-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 30px;
        }

        .status-card {
            background: white;
            padding: 22px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(100, 18, 18, 0.06);
            border: 1px solid #E5C7C7;
            border-top: 4px solid #801818;
        }

        .status-card h3 {
            margin: 0 0 12px;
            font-size: 15px;
            color: #765858;
        }

        .status-number {
            font-size: 32px;
            font-weight: bold;
            color: #801818;
        }

        .pending {
            border-top-color: #D99A2B;
        }

        .pending .status-number {
            color: #996600;
        }

        .in-progress {
            border-top-color: #801818;
        }

        .completed {
            border-top-color: #239653;
        }

        .completed .status-number {
            color: #239653;
        }

        .section-title {
            color: #641212;
            margin-bottom: 18px;
            font-size: 22px;
        }

        .request-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 18px;
            box-shadow: 0 3px 12px rgba(100, 18, 18, 0.06);
            border: 1px solid #E5C7C7;
        }

        .request-card h3 {
            margin-top: 0;
            color: #801818;
            overflow-wrap: anywhere;
            font-size: 20px;
        }

        .request-card p {
            line-height: 1.6;
        }

        .request-card strong {
            color: #641212;
        }

        .status {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-pending {
            background: #FFF0C2;
            color: #805800;
        }

        .status-in-progress {
            background: #F0DCDC;
            color: #641212;
        }

        .status-completed {
            background: #DCFCE7;
            color: #166534;
        }

        .update-notice {
            background: #FFF7D6;
            border-left: 4px solid #D99A2B;
            padding: 14px;
            border-radius: 6px;
            margin: 18px 0;
            color: #805800;
            line-height: 1.6;
        }

        .update-notice p {
            margin: 6px 0 0;
        }

        .completed-notice {
            background: #DCFCE7;
            border-left-color: #239653;
            color: #166534;
        }

        .remarks {
            background: #F8EEEE;
            border-left: 4px solid #801818;
            padding: 14px;
            border-radius: 6px;
            margin-top: 18px;
            overflow-wrap: anywhere;
            line-height: 1.6;
        }

        .remarks p {
            margin-bottom: 0;
            white-space: pre-wrap;
        }

        .empty {
            background: white;
            padding: 35px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #E5C7C7;
            box-shadow: 0 3px 12px rgba(100, 18, 18, 0.05);
        }

        .empty h3 {
            color: #801818;
        }

        .empty p {
            color: #765858;
            line-height: 1.7;
        }

        .description {
            white-space: pre-wrap;
            overflow-wrap: anywhere;
        }

        .date {
            color: #765858;
            font-size: 13px;
        }

        @media (max-width: 650px) {
            .status-grid {
                grid-template-columns: 1fr;
            }

            .container {
                margin-top: 20px;
                padding: 0 14px;
            }

            .top-buttons {
                width: 100%;
            }

            .top-buttons .btn {
                flex: 1;
            }

            .filter-form {
                flex-direction: column;
            }

            .filter-form input,
            .filter-form select,
            .filter-btn,
            .reset-btn {
                width: 100%;
            }

            .request-card {
                padding: 18px;
            }

            .top-bar h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>Student Services</h2>
</header>

<div class="container">

    <div class="top-bar">
        <div>
            <h1>My Service Requests</h1>
            <p>View your requests and monitor updates from the staff.</p>
        </div>

        <div class="top-buttons">
            <a href="{{ route('dashboard') }}" class="btn">
                &larr; Back to Dashboard
            </a>

            <a href="{{ route('service-requests.create') }}" class="btn">
                + New Request
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <form
        method="GET"
        action="{{ route('service-requests.index') }}"
        class="filter-form"
    >
        <input
            type="text"
            name="search"
            placeholder="Search by title or description..."
            value="{{ $search ?? '' }}"
        >

        <select name="status">
            <option value="">All Statuses</option>

            <option
                value="Pending"
                {{ ($status ?? '') === 'Pending' ? 'selected' : '' }}
            >
                Pending
            </option>

            <option
                value="In Progress"
                {{ ($status ?? '') === 'In Progress' ? 'selected' : '' }}
            >
                In Progress
            </option>

            <option
                value="Completed"
                {{ ($status ?? '') === 'Completed' ? 'selected' : '' }}
            >
                Completed
            </option>
        </select>

        <button type="submit" class="filter-btn">
            Search / Filter
        </button>

        <a href="{{ route('service-requests.index') }}" class="reset-btn">
            Reset
        </a>
    </form>

    <div class="status-grid">
        <div class="status-card pending">
            <h3>⏳ Pending Requests</h3>
            <div class="status-number">{{ $pendingCount }}</div>
        </div>

        <div class="status-card in-progress">
            <h3>🔄 In Progress</h3>
            <div class="status-number">{{ $inProgressCount }}</div>
        </div>

        <div class="status-card completed">
            <h3>✅ Completed Requests</h3>
            <div class="status-number">{{ $completedCount }}</div>
        </div>
    </div>

    <h2 class="section-title">Request History</h2>

    @forelse ($requests as $request)
        <div class="request-card">

            <h3>{{ $request->title }}</h3>

            <p>
                <strong>Category:</strong>
                {{ $request->serviceCategory->name ?? 'N/A' }}
            </p>

            <p><strong>Description:</strong></p>
            <p class="description">{{ $request->description }}</p>

            @php
                $statusClass = match ($request->status) {
                    'Pending' => 'status-pending',
                    'In Progress' => 'status-in-progress',
                    'Completed' => 'status-completed',
                    default => 'status-pending',
                };
            @endphp

            <p>
                <strong>Current Status:</strong>
                <span class="status {{ $statusClass }}">
                    {{ $request->status }}
                </span>
            </p>

            @if ($request->status === 'In Progress')
                <div class="update-notice">
                    🔔 <strong>Request Update!</strong>
                    <p>Your request is now being processed by the staff.</p>
                </div>
            @elseif ($request->status === 'Completed')
                <div class="update-notice completed-notice">
                    ✅ <strong>Request Completed!</strong>
                    <p>
                        Your request has been completed.
                        Please check the staff remarks below.
                    </p>
                </div>
            @endif

            <p class="date">
                <strong>Date Submitted:</strong>
                {{ $request->created_at->format('M d, Y h:i A') }}
            </p>

            <p class="date">
                <strong>Last Updated:</strong>
                {{ $request->updated_at->format('M d, Y h:i A') }}
            </p>

            @if ($request->staff_remarks)
                <div class="remarks">
                    <strong>💬 Staff Remarks</strong>
                    <p>{{ $request->staff_remarks }}</p>
                </div>
            @else
                <p class="date">No staff remarks yet.</p>
            @endif

        </div>
    @empty
        <div class="empty">
            <h3>No matching service requests found</h3>
            <p>
                No requests match your search or selected status.
                Try another search or click Reset.
            </p>

            <a href="{{ route('service-requests.create') }}" class="btn">
                Submit a New Request
            </a>
        </div>
    @endforelse

</div>

</body>
</html>
