<!-- resources/views/inventory/create.blade.php -->

<h1>Create New Inventory Item</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('inventory.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label for="dosage">Dosage:</label>
        <input type="number" name="dosage" id="dosage" class="form-control" value="{{ old('dosage') }}">
    </div>
    <div class="form-group">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('quantity') }}">
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>
