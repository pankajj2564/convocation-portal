@extends('admin.layouts.app')

@section('title', 'Import Students')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Import Students via CSV / Excel</h4>
            </div>
            <div class="card-body">
                <p class="text-muted">Ensure your file has the following column headers in the first row: <code>roll_no</code>, <code>name</code>, <code>email</code>, <code>phone</code>, <code>degree</code>, <code>branch</code>, <code>passing_year</code>.</p>
                <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="file" class="form-label">Upload File (.csv, .xlsx, .xls)</label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Upload & Import Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection