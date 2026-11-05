
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Service Requests</title>

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
            padding: 22px 8%;
        }

        header h2 {
            color: white;
            margin: 0;
        }

        .container {
            max-width: 1100px;
            margin: 35px auto;
            padding: 0 20px;
        }

        h1, h2 {
            color: #801818;
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
            margin-bottom: 8px;
        }

        .top-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-panel {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin: 25px 0;
            box-shadow: 0 4px 14px #80181810;
            border: 1px solid #E5C7C7;
        }

        .search-grid {
            display: grid;
            grid-template-columns: 2fr 1fr auto auto;
            gap: 12px;
            align-items: end;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
            color: #4A2424;
        }

        input, select, textarea {
            width: 100%;
            padding: 11px;
            border: 1px solid #C58B8B;
            border-radius: 7px;
            font: inherit;
            background: white;
            color: #351C1C;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #801818;
            box-shadow: 0 0 0 3px #F0DCDC;
        }

        textarea {
            min-height: 80px;
            resize: vertical;
        }

        .btn {
            display: inline-block;
            padding: 12px 18px;
            background: #801818;
            color: white;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            font: inherit;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: #641212;
        }

        .btn-reset {
            background: #765858;
        }

        .btn-reset:hover {
            background: #543A3A;
        }

        .request-card {
            background: white;
            padding: 25px;
            margin-bottom: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 14px #80181810;
            border: 1px solid #E5C7C7;
        }

        .request-card h3 {
            color: #801818;
            overflow-wrap: anywhere;
            margin-top: 0;
        }

        .request-card p {
            line-height: 1.6;
            overflow-wrap: anywhere;
        }

        .field {
            margin-top: 15px;
        }

        .success {
            padding: 14px;
            background: #E7F5E9;
            color: #216E36;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .empty {
            background: white;
            padding: 30px;
            text-align: center;
            border-radius: 12px;
            border: 1px solid #E5C7C7;
        }

        .error {
            color: #B42318;
            font-size: 14px;
            margin-top: 5px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: bold;
        }

        .status-pending {
            background: #FFF0D2;
            color: #8A5700;
        }

        .status-progress {
            background: #F0DCDC;
            color: #801818;
        }

        .status-completed {
            background: #E7F5E9;
            color: #216E36;
        }

        .results-count {
            color: #765858;
            margin-bottom: 18px;
        }

        .attachment-box {
            background: #F8EEEE;
            border: 1px solid #E5C7C7;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
        }

        .attachment-box p {
            margin-top: 0;
        }

        .attachment-btn {
            display: inline-block;
            margin-top: 5px;
        }

        @media (max-width: 700px) {
            .search-grid {
                grid-template-columns: 1fr;
            }

            header {
                padding: 20px;
            }

            .container {
                margin-top: 25px;
            }

            .request-card {
                padding: 18px;
            }

            .top-buttons {
                width: 100%;
            }

            .top-buttons .btn {
                flex: 1;
            }
        }
    </style>
</head>

<body>

<header>
    <h2>Student Services | Admin Panel</h2>
</header>

<div class="container">

    <div class="top-bar">
        <div>
            <h1>Manage Service Requests</h1>
            <p>View student requests, search records, and update their status.</p>
        </div>

        <div class="top-buttons">
            <a href="{{ route('dashboard') }}" class="btn">
                &larr; Back to Dashboard
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <div class="search-panel">
        <form action="{{ route('admin.service-requests.index') }}" method="GET">
            <div class="search-grid">

                <div>
                    <label for="search">Search Requests</label>
                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ $search ?? '' }}"
                        placeholder="Student name, email, or title..."
                    >
                </div>

                <div>
                    <label for="status-filter">Filter by Status</label>
                    <select id="status-filter" name="status">
                        <option value="">All Statuses</option>

                        <option value="Pending"
                            @selected(($status ?? '') === 'Pending')>
                            Pending
                        </option>

                        <option value="In Progress"
                            @selected(($status ?? '') === 'In Progress')>
                            In Progress
                        </option>

                        <option value="Completed"
                            @selected(($status ?? '') === 'Completed')>
                            Completed
                        </option>
                    </select>
                </div>

                <button type="submit" class="btn">
                    Search / Filter
                </button>

                <a href="{{ route('admin.service-requests.index') }}"
                   class="btn btn-reset">
                    Reset
                </a>

            </div>
        </form>
    </div>

    <p class="results-count">
        Showing {{ $requests->count() }}
        {{ $requests->count() === 1 ? 'request' : 'requests' }}.
    </p>

    @forelse ($requests as $request)

        <div class="request-card">

            <h3>{{ $request->title }}</h3>

            <p>
                <strong>Student:</strong>
                {{ $request->user->name ?? 'Unknown' }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ $request->user->email ?? 'N/A' }}
            </p>

            <p>
                <strong>Category:</strong>
                {{ $request->serviceCategory->name ?? 'N/A' }}
            </p>

            <p>
                <strong>Description:</strong><br>
                {{ $request->description }}
            </p>

            {{-- UPLOADED ATTACHMENT --}}
            <div class="field">
                <strong>Uploaded Attachment:</strong>

                @if ($request->attachment)
                    <div class="attachment-box">
                        <p>
                            Student uploaded an attachment for this request.
                        </p>

                        <a
                            href="{{ route('admin.service-requests.attachment', $request) }}"
                            target="_blank"
                            class="btn attachment-btn"
                        >
                            View Attachment
                        </a>
                    </div>
                @else
                    <p>No attachment uploaded.</p>
                @endif
            </div>

            <p>
                <strong>Date Submitted:</strong>
                {{ $request->created_at->format('M d, Y h:i A') }}
            </p>

            <p>
                <strong>Current Status:</strong>

                @if ($request->status === 'Pending')
                    <span class="status status-pending">Pending</span>
                @elseif ($request->status === 'In Progress')
                    <span class="status status-progress">In Progress</span>
                @elseif ($request->status === 'Completed')
                    <span class="status status-completed">Completed</span>
                @else
                    {{ $request->status }}
                @endif
            </p>

            <form
                action="{{ route('admin.service-requests.update', $request) }}"
                method="POST"
            >
                @csrf
                @method('PATCH')

                <div class="field">
                    <label for="status-{{ $request->id }}">
                        Update Status
                    </label>

                    <select
                        name="status"
                        id="status-{{ $request->id }}"
                        required
                    >
                        <option value="Pending"
                            @selected($request->status === 'Pending')>
                            Pending
                        </option>

                        <option value="In Progress"
                            @selected($request->status === 'In Progress')>
                            In Progress
                        </option>

                        <option value="Completed"
                            @selected($request->status === 'Completed')>
                            Completed
                        </option>
                    </select>
                </div>

                <div class="field">
                    <label for="remarks-{{ $request->id }}">
                        Staff Remarks
                    </label>

                    <textarea
                        name="staff_remarks"
                        id="remarks-{{ $request->id }}"
                        maxlength="1000"
                        placeholder="Enter remarks for the student..."
                    >{{ old('staff_remarks', $request->staff_remarks) }}</textarea>
                </div>

                @if ($errors->any())
                    <div class="error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                <button type="submit" class="btn">
                    Save Changes
                </button>
            </form>

        </div>

    @empty

        <div class="empty">
            <h3>No service requests found</h3>
            <p>Try another search term or select a different status.</p>
        </div>

    @endforelse

</div>

</body>
</html>
