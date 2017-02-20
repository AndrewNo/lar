<div class="shop_category">
    <nav>
        <ul class="nav">
            @foreach($categories as $category)
                @if($category->id != 0)
                    <li @if(URL::current() == url('/shop/category').'/'.$category->alias) class="active" @endif ><a
                                href="/shop/category/{{ $category->alias }}">{{ $category->title }}</a></li>
                @endif
            @endforeach
        </ul>
    </nav>
</div>