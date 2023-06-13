<!-- resources/views/nurse/inventory/edit.blade.php -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Edit Item</h1>
            <form method="POST" action="{{ route('inventory.update', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                </div>
                <div class="form-group">
                    <label for="dosage">Dosage</label>
                    <input type="text" class="form-control" id="dosage" name="dosage" value="{{ $item->dosage }}">
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>

<script>
function closeWindow() {
    window.close();
    return true;
}
</script>