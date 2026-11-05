<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ServiceRequestController extends Controller
{
    public function index(Request $request)
    {
        // SECURITY: Logged-in student can only see own requests
        abort_unless(Auth::check(), 403);

        // DATA VALIDATION: Search and status filters
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'status' => [
                'nullable',
                Rule::in(['Pending', 'In Progress', 'Completed']),
            ],
        ]);

        $query = ServiceRequest::with('serviceCategory')
            ->where('user_id', Auth::id());

        if (!empty($filters['search'])) {
            $search = $filters['search'];

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        $requests = $query->latest()->get();

        // Status counts for the logged-in student only
        $pendingCount = ServiceRequest::where('user_id', Auth::id())
            ->where('status', 'Pending')
            ->count();

        $inProgressCount = ServiceRequest::where('user_id', Auth::id())
            ->where('status', 'In Progress')
            ->count();

        $completedCount = ServiceRequest::where('user_id', Auth::id())
            ->where('status', 'Completed')
            ->count();

        return view('service-requests.index', compact(
            'requests',
            'pendingCount',
            'inProgressCount',
            'completedCount'
        ))->with([
            'search' => $filters['search'] ?? '',
            'status' => $filters['status'] ?? '',
        ]);
    }

    public function create()
    {
        abort_unless(Auth::check(), 403);

        $categories = ServiceCategory::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('service-requests.create', compact('categories'));
    }

    public function store(Request $request)
    {
        abort_unless(Auth::check(), 403);

        // DATA VALIDATION
        $validated = $request->validate([
            'service_category_id' => [
                'required',
                'integer',
                Rule::exists('service_categories', 'id')
                    ->where('is_active', true),
            ],
            'title' => [
                'required',
                'string',
                'min:3',
                'max:255',
            ],
            'description' => [
                'required',
                'string',
                'min:10',
                'max:2000',
            ],
            'attachment' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:2048',
            ],
        ]);

        // Store attachment privately
        $attachmentPath = null;

        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')
                ->store('service-attachments', 'local');
        }

        // SECURITY: User ID comes from authenticated account
        ServiceRequest::create([
            'user_id' => Auth::id(),
            'service_category_id' => $validated['service_category_id'],
            'title' => trim($validated['title']),
            'description' => trim($validated['description']),
            'attachment' => $attachmentPath,
            'status' => 'Pending',
        ]);

        return redirect()
            ->route('service-requests.index')
            ->with(
                'success',
                'Your service request was submitted successfully.'
            );
    }
}
