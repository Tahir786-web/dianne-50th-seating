@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Edit Table</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('tables.update', $table) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Table Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name', $table->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Flower Type</label>
                        <input type="text" name="flower_type" class="form-control"
                               value="{{ old('flower_type', $table->flower_type) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="available" {{ old('status', $table->status) == 'available' ? 'selected' : '' }}>Available</option>
                            <option value="reserved"  {{ old('status', $table->status) == 'reserved'  ? 'selected' : '' }}>Reserved</option>
                            <option value="occupied"  {{ old('status', $table->status) == 'occupied'  ? 'selected' : '' }}>Occupied</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Capacity *</label>
                        <input type="number" name="capacity" class="form-control"
                               value="{{ old('capacity', $table->capacity) }}" min="1" max="50" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3">{{ old('description', $table->description) }}</textarea>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update Table</button>
                        <a href="{{ route('tables.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection