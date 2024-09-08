@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Product Management</h2>
    <!-- Button to Add New Product -->
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('products.create') }}" class="btn btn-success">Add New Product</a>
    </div>

    <!-- Product List -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Barcode</th>
                <th>Internal Reference</th>
                <th>Name</th>
                <th>Quantity</th>
                <th>Associated User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->barcode }}</td>
                <td>{{ $product->internal_ref }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->quantity_product }}</td>
                <td>{{ $product->user->first_name }} {{ $product->user->last_name }}</td>
                <td>
                    <!-- Edit Button -->
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
