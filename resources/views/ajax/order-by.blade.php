@foreach($prod as $product)
    @php
        $image = "";
        if (count($product->images) > 0) {
            $image = $product->images[0]["img"];
        } else {
            $image = "no_image.png";
        }
    @endphp
    <div class="product">
        <div class="product_image"><img src="/images/{{$image}}" alt="{{$product->title}}"></div>
        <div class="product_extra product_new">
            <a href="{{route("showCategory", $product->category['alias'])}}">
                {{$product->category["title"]}}
            </a>
        </div>
        <div class="product_content">
            <div class="product_title">
                <a href="{{route("showProduct", ["category", $product->id])}}">
                    {{$product->title}}
                </a>
            </div>
            @if ($product->old_price !== null)
                <div style="text-decoration: line-through; color: red">${{$product->old_price}}</div>
            @endif
            <div class="product_price">${{$product->price}}</div>
        </div>
    </div>
@endforeach