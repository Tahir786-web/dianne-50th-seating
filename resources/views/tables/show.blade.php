@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">{{ $table->name }}</h4>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <th width="150">Flower Type</th>
                        <td>{{ $table->flower_type ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>
                            <span class="badge 
                                @if($table->status == 'available') bg-success
                                @elseif($table->status == 'reserved') bg-warning text-dark
                                @else bg-danger
                                @endif">
                                {{ ucfirst($table->status) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Capacity</th>
                        <td>{{ $table->capacity }} persons</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{ $table->description ?? 'No description available.' }}</td>
                    </tr>
                    <tr>
                        <th>Created</th>
                        <td>{{ $table->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                </table>

                <div class="mt-4 d-flex gap-2">
                    <a href="{{ route('tables.edit', $table) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('tables.index') }}" class="btn btn-secondary">Back to List</a>

                    <form action="{{ route('tables.destroy', $table) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this table?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection