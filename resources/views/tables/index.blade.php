@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">All Flower Tables</h2>
</div>

<div class="row g-4">
    @forelse($tables as $table)
        <div class="col-md-4 col-lg-3">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $table->name }}</h5>
                    <p class="text-muted small mb-2">
                        <i class="bi bi-flower2"></i> {{ $table->flower_type ?? 'N/A' }}
                    </p>
                    <p class="mb-2">
                        <span class="badge 
                            @if($table->status == 'available') bg-success
                            @elseif($table->status == 'reserved') bg-warning text-dark
                            @else bg-danger
                            @endif">
                            {{ ucfirst($table->status) }}
                        </span>
                    </p>
                    <p class="small text-muted mb-3">
                        Capacity: <strong>{{ $table->capacity }}</strong> persons
                    </p>
                    <div class="d-flex gap-2">
                        <a href="{{ route('tables.show', $table) }}" class="btn btn-sm btn-outline-primary">View</a>
                        <a href="{{ route('tables.edit', $table) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">No tables found. Please create one.</div>
        </div>
    @endforelse
</div>

<div class="mt-4">
    {{ $tables->links() }}
</div>
@endsection