<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceRequestController extends Controller
{
    // ADMIN SERVICE REQUEST LIST
    public function index(Request $request)
    {
        // Admin access only
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );

        // Validate filters
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => [
                'nullable',
                'in:Pending,In Progress,Completed'
            ],
        ]);

        $search = $filters['search'] ?? null;
        $status = $filters['status'] ?? null;

        $query = ServiceRequest::with(['user', 'serviceCategory'])
            ->latest();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    });
            });
        }

        if ($status) {
            $query->where('status', $status);
        }

        $requests = $query->get();

        return view('admin.service-requests.index', compact(
            'requests',
            'search',
            'status'
        ));
    }

    // UPDATE REQUEST STATUS
    public function updateStatus(
        Request $request,
        ServiceRequest $serviceRequest
    ) {
        // Admin access only
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );

        // Validate input
        $validated = $request->validate([
            'status' => [
                'required',
                'in:Pending,In Progress,Completed'
            ],
            'staff_remarks' => [
                'nullable',
                'string',
                'max:1000'
            ],
        ]);

        $statusChanged = $serviceRequest->status !== $validated['status'];

        $remarksChanged = $serviceRequest->staff_remarks !==
            ($validated['staff_remarks'] ?? null);

        if ($statusChanged || $remarksChanged) {
            $serviceRequest->update($validated);

            return redirect()
                ->route('admin.service-requests.index')
                ->with('success', 'Request updated successfully.');
        }

        return redirect()
            ->route('admin.service-requests.index')
            ->with('success', 'No changes were made to this request.');
    }

    // VIEW UPLOADED ATTACHMENT
    public function viewAttachment(ServiceRequest $serviceRequest)
    {
        // Admin access only
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );

        // Check if attachment exists
        if (!$serviceRequest->attachment) {
            abort(404, 'No attachment found.');
        }

        $disk = Storage::disk('local');
        $path = $serviceRequest->attachment;

        // Check if file exists
        if (!$disk->exists($path)) {
            abort(404, 'Attachment not found.');
        }

        // Get actual file path
        $fullPath = $disk->path($path);

        // Detect file type
        $mimeType = mime_content_type($fullPath);

        // Allow only supported attachment types
        abort_unless(
            in_array($mimeType, [
                'image/jpeg',
                'image/png',
                'application/pdf'
            ]),
            415,
            'Unsupported attachment type.'
        );

        // Display image or PDF in browser
        return response()->file($fullPath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline',
            'X-Content-Type-Options' => 'nosniff',
        ]);
    }

    // HISTORY & ANALYTICS
    public function analytics()
    {
        // Admin access only
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403
        );

        // Count requests by status
        $pendingCount = ServiceRequest::where('status', 'Pending')->count();

        $inProgressCount = ServiceRequest::where('status', 'In Progress')->count();

        $completedCount = ServiceRequest::where('status', 'Completed')->count();

        $totalRequests = ServiceRequest::count();

        return view('admin.analytics', compact(
            'pendingCount',
            'inProgressCount',
            'completedCount',
            'totalRequests'
        ));
    }
}
