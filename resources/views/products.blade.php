<x-layout>
    @foreach ($products as $p)
        <h3>Supplier: {{ $p->supplier_name }}</h3>
        <h4>Part number: {{ $p->part_number }}</h4>
        <h4>Part description: {{ $p->part_desc }}</h4>
        <br>
        <a href="/products/{{ $p->id }}"><button>Change product data</button></a>
        <hr>
    @endforeach
</x-layout>
