@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label for="barcode">Barcode:</label>
            <input type="text" class="form-control" id="barcode" name="barcode" required>
        </div>
        <div class="form-group mb-3">
            <label for="internal_ref">Internal Reference:</label>
            <input type="text" class="form-control" id="internal_ref" name="internal_ref" required>
        </div>
        <div class="form-group mb-3">
            <label for="name">Product Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group mb-3">
            <label for="quantity_product">Quantity:</label>
            <input type="number" class="form-control" id="quantity_product" name="quantity_product" required>
        </div>
        <div class="form-group mb-3">
            <label for="user_id">Associated User:</label>
            <select class="form-control" id="user_id" name="user_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>
@endsection
