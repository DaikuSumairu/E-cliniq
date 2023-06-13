@extends('adminlte::page')

@section('title', "Inventory")

@section('content_header')
    <h1>Inventory</h1>
@stop



<!--Include in the Batch Model the following: 
    1. ID
    2. Inventory ID (FK)
    3. Stock ID
    4. Date of Purchase
    5. Expiration Date
-->

@section('content')

<!-- Pop-up form for the Adding Medicine Inventory Items-->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-item-modal">Add Item</button>

<div class="modal fade" id="add-item-modal" tabindex="-1" role="dialog" aria-labelledby="add-item-modal-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add-item-modal-label">Add Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('inventory.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="dosage">Dosage</label>
                        <input type="number" class="form-control" id="dosage" name="dosage" required>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Main table for the Inventory Items-->
<div class="table-responsive pb-4">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Dosage (mg)</th>
                <th>Quantity</th>
                <th>Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->dosage }} mg</td>
                    <td>{{ $item->quantity }} pcs</td>
                    <td>
                    <button type="button" class="btn btn-primary" onclick="openEditForm({{ $item->id }})">Edit</button>
                    <form method="POST" action="{{ route('inventory.destroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                         @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {!! $inventoryItems->links('custom.pagination', ['paginator' => $inventoryItems]) !!}
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

<!--Pop-up Form-->
<script>
    $(document).ready(function() {
        $('#add-item-modal').on('shown.bs.modal', function() {
            $('#name').focus();
        });
    });
</script>

<!--Deletion Confirmation Pop-up-->
<script>
    $(document).ready(function() {
        $('form').submit(function() {
            return confirm('Are you sure you want to delete this item?');
        });
    });
</script>

<script>
function openEditForm(id) {
    window.open('{{ url('inventory') }}/' + id + '/edit', 'Edit Item', 'width=600,height=400');
}
</script>