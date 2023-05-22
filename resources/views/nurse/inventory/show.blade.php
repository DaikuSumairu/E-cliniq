<!-- resources/views/inventory/show.blade.php -->

<h1>Inventory Item Details</h1>

<div>
    <strong>Name:</strong> {{ $inventoryItem->name }}
</div>
<div>
    <strong>Dosage:</strong> {{ $inventoryItem->dosage }}
</div>
<div>
    <strong>Quantity:</strong> {{ $inventoryItem->quantity }}
</div>

<a href="{{ route('inventory.edit', $inventoryItem->id) }}" class="btn btn-primary">Edit</a>
