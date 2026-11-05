
<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\Admin\ServiceRequestController as AdminServiceRequestController;
use App\Models\ServiceRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'admin') {
        $totalRequests = ServiceRequest::count();

        $pendingCount = ServiceRequest::where('status', 'Pending')->count();

        $inProgressCount = ServiceRequest::where('status', 'In Progress')->count();

        $completedCount = ServiceRequest::where('status', 'Completed')->count();
    } else {
        $userId = $user->id;

        $totalRequests = ServiceRequest::where('user_id', $userId)->count();

        $pendingCount = ServiceRequest::where('user_id', $userId)
            ->where('status', 'Pending')->count();

        $inProgressCount = ServiceRequest::where('user_id', $userId)
            ->where('status', 'In Progress')->count();

        $completedCount = ServiceRequest::where('user_id', $userId)
            ->where('status', 'Completed')->count();
    }

    return view('dashboard', compact(
        'totalRequests',
        'pendingCount',
        'inProgressCount',
        'completedCount'
    ));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Student Service Request Routes
    Route::get('/service-requests', [ServiceRequestController::class, 'index'])
        ->name('service-requests.index');

    Route::get('/service-requests/create', [ServiceRequestController::class, 'create'])
        ->name('service-requests.create');

    Route::post('/service-requests', [ServiceRequestController::class, 'store'])
        ->name('service-requests.store');

    // Admin Service Request Routes
    Route::get('/admin/service-requests', [AdminServiceRequestController::class, 'index'])
        ->name('admin.service-requests.index');

    Route::patch('/admin/service-requests/{serviceRequest}', [AdminServiceRequestController::class, 'updateStatus'])
        ->name('admin.service-requests.update');

    // Admin View Uploaded Attachment
    Route::get(
        '/admin/service-requests/{serviceRequest}/attachment',
        [AdminServiceRequestController::class, 'viewAttachment']
    )->name('admin.service-requests.attachment');

    // Admin History & Analytics Route
    Route::get('/admin/analytics', [AdminServiceRequestController::class, 'analytics'])
        ->name('admin.analytics');
});

require __DIR__.'/auth.php';
