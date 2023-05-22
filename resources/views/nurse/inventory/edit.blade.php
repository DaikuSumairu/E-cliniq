<!-- resources/views/inventory/edit.blade.php -->

<h1>Edit Inventory Item</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('inventory.update', $inventoryItem->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $inventoryItem->name) }}">
    </div>
    <div class="form-group">
        <label for="dosage">Dosage:</label>
        <input type="number" name="dosage" id="dosage" class="form-control" value="{{ old('name', $inventoryItem->dosage) }}">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity', $inventoryItem->quantity) }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
