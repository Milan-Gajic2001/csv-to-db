<x-layout>
    <h1>Change product data</h1>
    <form action="/api/products/{{ $product->id }}" method="POST">
        @csrf
        @method('PATCH')
        <label for="part_number">Part number:</label>
        <br>
        <input type="text" name="part_number" value="{{ $product->part_number }}">
        <hr>
        <label for="part_desc">Part description:</label>
        <br>
        <textarea type="text" name="part_desc">{{ $product->part_desc }}</textarea>
        <hr>
        <label for="quantity">Quantity:</label>
        <br>
        <input type="number" name="quantity" value="{{ $product->quantity }}">
        <hr>
        <label for="price">Price:</label>
        <br>
        <input type="number" name="price" value="{{ $product->price }}">
        <hr>
        <label for="condition">Part condition:</label>
        <br>
        <input type="text" name="condition" value="{{ $product->condition }}">
        <hr>
        <label for="category">Part category:</label>
        <br>
        <input type="text" name="category" value="{{ $product->category }}">
        <hr>
        <button type="submit">Change</button>
    </form>


</x-layout>
