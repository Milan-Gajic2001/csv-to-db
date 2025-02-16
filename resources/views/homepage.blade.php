<x-layout>
    @foreach ($supplierNames as $supplier)
        <h2>{{ $supplier }}</h2>
        <br>
        <br>
        <form action="/api/suppliers/{{ $supplier }}/new_name" method="POST">
            @method('PATCH')
            @csrf
            <label for="supplier_name">New supplier name:</label>
            <br>
            <input type="text" name="new_name">
            <button>Change name</button>
        </form>
        <hr>
    @endforeach
</x-layout>
