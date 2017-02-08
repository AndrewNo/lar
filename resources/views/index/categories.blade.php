<div class="shop_category">
    <nav>
        <ul class="nav">
            @foreach($categories as $category)
                <li><a href="/shop/category/{{ $category->alias }}">{{ $category->title }}</a></li>
            @endforeach
        </ul>
    </nav>
</div>