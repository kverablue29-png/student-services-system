
<x-app-layout>
    <style>
        :root {
            --falu-red: #801818;
            --dark-falu-red: #641212;
            --soft-falu-red: #C58B8B;
            --light-red: #F8EEEE;
            --white: #FFFFFF;
            --text: #351C1C;
            --muted: #765858;
            --border: #E5C7C7;
        }

        body {
            background: var(--light-red);
        }

        .dashboard-wrapper {
            min-height: 100vh;
            background: var(--light-red);
            padding: 32px 20px 48px;
            color: var(--text);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .welcome-header {
            background: linear-gradient(
                135deg,
                var(--dark-falu-red),
                var(--falu-red)
            );
            color: var(--white);
            padding: 32px;
            border-radius: 18px;
            margin-bottom: 28px;
            box-shadow: 0 8px 22px rgba(100, 18, 18, 0.16);
        }

        .welcome-header h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .welcome-header p {
            color: #F8EEEE;
            line-height: 1.7;
        }

        .dashboard-label {
            display: inline-block;
            background: var(--soft-falu-red);
            color: var(--dark-falu-red);
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .dashboard-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .dashboard-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 11px 18px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            border: 1px solid transparent;
            transition: 0.2s ease;
        }

        .dashboard-btn:hover {
            transform: translateY(-2px);
        }

        .btn-white {
            background: var(--white);
            color: var(--dark-falu-red);
        }

        .btn-white:hover {
            background: var(--light-red);
        }

        .btn-falu {
            background: var(--falu-red);
            color: var(--white);
        }

        .btn-falu:hover {
            background: var(--dark-falu-red);
        }

        .btn-outline {
            background: transparent;
            color: var(--white);
            border-color: #E5C7C7;
        }

        .btn-outline:hover {
            background: var(--dark-falu-red);
        }

        .section-heading {
            color: var(--dark-falu-red);
            font-size: 22px;
            font-weight: 800;
            margin: 30px 0 16px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .summary-card {
            background: var(--white);
            padding: 23px;
            border: 1px solid var(--border);
            border-top: 4px solid var(--soft-falu-red);
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(100, 18, 18, 0.05);
        }

        .summary-card.total {
            border-top-color: var(--falu-red);
        }

        .summary-card.pending {
            border-top-color: #D99A2B;
        }

        .summary-card.progress {
            border-top-color: var(--soft-falu-red);
        }

        .summary-card.completed {
            border-top-color: #32805A;
        }

        .card-label {
            color: var(--muted);
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .card-number {
            color: var(--dark-falu-red);
            font-size: 32px;
            font-weight: 800;
        }

        .card-description {
            color: var(--muted);
            font-size: 12px;
            margin-top: 8px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-top: 22px;
        }

        .content-card {
            background: var(--white);
            padding: 25px;
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 4px 12px rgba(100, 18, 18, 0.05);
        }

        .content-card h3 {
            color: var(--dark-falu-red);
            font-size: 18px;
            font-weight: 800;
            margin-bottom: 10px;
        }

        .content-card p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        .shortcut-list {
            display: grid;
            gap: 12px;
            margin-top: 18px;
        }

        .shortcut-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            background: var(--light-red);
            color: var(--dark-falu-red);
            padding: 15px;
            border: 1px solid var(--border);
            border-radius: 10px;
            text-decoration: none;
            font-weight: 700;
            font-size: 14px;
            transition: 0.2s ease;
        }

        .shortcut-link:hover {
            background: #F0DCDC;
            border-color: var(--soft-falu-red);
        }

        .shortcut-arrow {
            color: var(--falu-red);
            font-size: 18px;
        }

        .status-list {
            display: grid;
            gap: 13px;
            margin-top: 18px;
        }

        .status-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding-bottom: 13px;
            border-bottom: 1px solid var(--border);
        }

        .status-item:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .status-name {
            color: var(--text);
            font-size: 14px;
            font-weight: 600;
        }

        .status-badge {
            display: inline-block;
            padding: 6px 11px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 800;
            min-width: 38px;
            text-align: center;
        }

        .badge-pending {
            background: #FFF0D2;
            color: #805400;
        }

        .badge-progress {
            background: #F0DCDC;
            color: var(--dark-falu-red);
        }

        .badge-completed {
            background: #DDF3E6;
            color: #206642;
        }

        .badge-total {
            background: var(--falu-red);
            color: var(--white);
        }

        .dashboard-footer {
            text-align: center;
            color: var(--muted);
            font-size: 12px;
            margin-top: 30px;
        }

        @media (max-width: 900px) {
            .summary-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .dashboard-wrapper {
                padding: 20px 14px 35px;
            }

            .welcome-header {
                padding: 24px 20px;
            }

            .welcome-header h1 {
                font-size: 23px;
            }

            .summary-grid,
            .content-grid {
                grid-template-columns: 1fr;
            }

            .summary-card {
                padding: 20px;
            }

            .dashboard-actions {
                flex-direction: column;
            }

            .dashboard-btn {
                width: 100%;
            }
        }
    </style>

    <div class="dashboard-wrapper">
        <div class="dashboard-container">

            <section class="welcome-header">
                <span class="dashboard-label">
                    {{ auth()->user()->role === 'admin' ? 'ADMINISTRATOR' : 'STUDENT PORTAL' }}
                </span>

                <h1>Welcome back, {{ auth()->user()->name }}!</h1>

                <p>
                    {{ auth()->user()->role === 'admin'
                        ? 'Manage student service requests and monitor their progress in one place.'
                        : 'Manage your service requests and check their status through your dashboard.' }}
                </p>

                <div class="dashboard-actions">
                    @if (auth()->user()->role === 'admin')
                        <a href="{{ route('admin.service-requests.index') }}"
                           class="dashboard-btn btn-white">
                            Manage Requests
                        </a>

                        <a href="{{ route('admin.analytics') }}"
                           class="dashboard-btn btn-outline">
                            History & Analytics
                        </a>
                    @else
                        <a href="{{ route('service-requests.create') }}"
                           class="dashboard-btn btn-white">
                            + Submit Request
                        </a>

                        <a href="{{ route('service-requests.index') }}"
                           class="dashboard-btn btn-outline">
                            My Requests
                        </a>
                    @endif

                    <a href="{{ route('profile.edit') }}"
                       class="dashboard-btn btn-outline">
                        Edit Profile
                    </a>
                </div>
            </section>

            <h2 class="section-heading">Request Overview</h2>

            <section class="summary-grid">
                @if (auth()->user()->role === 'admin')
                    <div class="summary-card total">
                        <div class="card-label">Total Requests</div>
                        <div class="card-number">{{ $totalRequests }}</div>
                        <div class="card-description">All submitted requests</div>
                    </div>
                @endif

                <div class="summary-card pending">
                    <div class="card-label">Pending</div>
                    <div class="card-number">{{ $pendingCount }}</div>
                    <div class="card-description">Awaiting review</div>
                </div>

                <div class="summary-card progress">
                    <div class="card-label">In Progress</div>
                    <div class="card-number">{{ $inProgressCount }}</div>
                    <div class="card-description">Currently being processed</div>
                </div>

                <div class="summary-card completed">
                    <div class="card-label">Completed</div>
                    <div class="card-number">{{ $completedCount }}</div>
                    <div class="card-description">Successfully completed</div>
                </div>
            </section>

            <section class="content-grid">
                <div class="content-card">
                    <h3>
                        {{ auth()->user()->role === 'admin'
                            ? 'Admin Quick Actions'
                            : 'Quick Actions' }}
                    </h3>

                    <p>
                        {{ auth()->user()->role === 'admin'
                            ? 'Open the request management page to review and update student requests.'
                            : 'Use these shortcuts to submit a new request or view your existing requests.' }}
                    </p>

                    <div class="shortcut-list">
                        @if (auth()->user()->role === 'admin')
                            <a href="{{ route('admin.service-requests.index') }}"
                               class="shortcut-link">
                                <span>Manage Service Requests</span>
                                <span class="shortcut-arrow">→</span>
                            </a>

                            <a href="{{ route('admin.analytics') }}"
                               class="shortcut-link">
                                <span>History & Analytics</span>
                                <span class="shortcut-arrow">→</span>
                            </a>
                        @else
                            <a href="{{ route('service-requests.create') }}"
                               class="shortcut-link">
                                <span>Submit a New Request</span>
                                <span class="shortcut-arrow">→</span>
                            </a>

                            <a href="{{ route('service-requests.index') }}"
                               class="shortcut-link">
                                <span>View My Requests</span>
                                <span class="shortcut-arrow">→</span>
                            </a>
                        @endif

                        <a href="{{ route('profile.edit') }}"
                           class="shortcut-link">
                            <span>Update My Profile</span>
                            <span class="shortcut-arrow">→</span>
                        </a>
                    </div>
                </div>

                <div class="content-card">
                    <h3>Request Status Summary</h3>
                    <p>Review the current status of service requests.</p>

                    <div class="status-list">
                        @if (auth()->user()->role === 'admin')
                            <div class="status-item">
                                <span class="status-name">All Requests</span>
                                <span class="status-badge badge-total">
                                    {{ $totalRequests }}
                                </span>
                            </div>
                        @endif

                        <div class="status-item">
                            <span class="status-name">Pending</span>
                            <span class="status-badge badge-pending">
                                {{ $pendingCount }}
                            </span>
                        </div>

                        <div class="status-item">
                            <span class="status-name">In Progress</span>
                            <span class="status-badge badge-progress">
                                {{ $inProgressCount }}
                            </span>
                        </div>

                        <div class="status-item">
                            <span class="status-name">Completed</span>
                            <span class="status-badge badge-completed">
                                {{ $completedCount }}
                            </span>
                        </div>
                    </div>
                </div>
            </section>

            <div class="dashboard-footer">
                Student Services Request System &copy; {{ date('Y') }}
            </div>

        </div>
    </div>
</x-app-layout>
