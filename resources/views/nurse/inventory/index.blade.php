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
<div class="table-responsive pb-4">
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Dosage (mg)</th>
                <th>Quantity</th>
                <th>Add</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventoryItems as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->dosage }} mg</td>
                    <td>{{ $item->quantity }} pcs</td>
                    <td><a href="{{ route('nurse.InventoryCreate') }}" class="btn btn-primary">Add</a></td>
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