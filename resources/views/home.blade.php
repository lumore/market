<x-app-layout>
    <div class="py-12">
         <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-3 gap-4 mb-4">
                @foreach($products as $product)
                    <x-product-card :product="$product"/>
                @endforeach
            </div>

            {{ $products->links() }}
        </div>
    </div>
</x-app-layout>
