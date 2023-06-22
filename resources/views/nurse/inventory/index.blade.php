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
<button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#add-item-modal">Add Item</button>

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
                <form method="POST" action="{{ route('nurse.inventoryStore') }}" onsubmit="return confirm('Are you sure you want to Add this item?');">
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
<div class="table-responsive">
    <form action="{{ route('nurse.inventoryIndex') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Search by item name" name="query" value="{{ $query }}">
            <button class="btn btn-outline-secondary" type="submit">Search</button>
        </div>
    </form>
    
    <div class="mx-auto mb-2" style="width: 1260px;height: 415px;overflow: auto;">
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
                            <div class="row">
                                <div class="col-2">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-item-modal{{$item->id}}">Edit</button>

                                    <div class="modal fade" id="edit-item-modal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-item-modal-label{{$item->id}}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="edit-item-modal-label{{$item->id}}">Edit Item</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('nurse.inventoryUpdate', $item->id) }}" onsubmit="return confirm('Are you sure you want to Edit this item?');">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="dosage">Dosage</label>
                                                            <input type="number" class="form-control" id="dosage" name="dosage" value="{{ $item->dosage }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="quantity">Quantity</label>
                                                            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}" required>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Edit Item</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <form method="POST" action="{{ route('nurse.inventoryDestroy', $item->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger ml-2">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $inventoryItems->links('custom.pagination', ['paginator' => $inventoryItems]) !!}
</div>
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<!--Pop-up Form-->
<script>
    $(document).ready(function() {
        $('#add-item-modal').on('shown.bs.modal', function() {
            $('#name').focus();
        });
    });
</script>

<script>
function openEditForm(id) {
    window.open('{{ url('inventory') }}/' + id + '/edit', 'Edit Item', 'width=600,height=400');
}
</script>
@stop