<x-layout>
    @foreach ($supplierNames as $supplier)
        <h2>{{ $supplier }}</h2>
        <hr>
    @endforeach
</x-layout>
