@extends('admin.layouts.app')

@section('title', 'Students Management')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Students Management</h3>
    @if(auth()->user()->hasRole('Admin'))
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addStudentModal"><i class="fas fa-plus"></i> Add Student</button>
    @endif
</div>

<!-- Filters Section -->
<div class="card shadow-sm mb-4">
    <div class="card-body">
        <form method="GET" action="{{ route('admin.dashboard') }}" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Degree</label>
                <input type="text" name="degree" class="form-control" value="{{ request('degree') }}" placeholder="e.g. B.Tech">
            </div>
            <div class="col-md-3">
                <label class="form-label">Branch</label>
                <input type="text" name="branch" class="form-control" value="{{ request('branch') }}" placeholder="e.g. Computer Science">
            </div>
            <div class="col-md-3">
                <label class="form-label">Registration Status</label>
                <select name="status" class="form-select">
                    <option value="">All Status</option>
                    <option value="registered" {{ request('status') == 'registered' ? 'selected' : '' }}>Registered (Paid)</option>
                    <option value="unregistered" {{ request('status') == 'unregistered' ? 'selected' : '' }}>Unregistered</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-dark w-100 me-2"><i class="fas fa-filter"></i> Filter</button>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Reset</a>
            </div>
        </form>
    </div>
</div>

<!-- Students Table -->
<div class="card shadow">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover mb-0 align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Roll No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Degree / Branch</th>
                        <th>Status</th>
                        @if(auth()->user()->hasRole('Admin'))
                            <th class="text-end">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->roll_no }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->degree }} / {{ $student->branch }}</td>
                            <td>
                                @if($student->is_registered)
                                    <span class="badge bg-success">Registered</span>
                                @else
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @endif
                            </td>
                            @if(auth()->user()->hasRole('Admin'))
                                <td class="text-end">
                                    <form action="{{ route('admin.students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this student?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">No students found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-white">
        {{ $students->withQueryString()->links() }}
    </div>
</div>

<!-- Add Student Modal -->
@if(auth()->user()->hasRole('Admin'))
<div class="modal fade" id="addStudentModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.students.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Roll Number</label>
                        <input type="text" name="roll_no" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Degree</label>
                        <input type="text" name="degree" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Branch</label>
                        <input type="text" name="branch" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Passing Year</label>
                        <input type="text" name="passing_year" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection