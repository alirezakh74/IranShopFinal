<div class="sidenav">
    <div class="menu">
        <span class="website-name">
            <span class="char">I</span>
            <span class="char">r</span>
            <span class="char">a</span>
            <span class="char">n</span>
            <span class="char">-</span>
            <span class="char">S</span>
            <span class="char">h</span>
            <span class="char">o</span>
            <span class="char">p</span>
        </span>
    </div>

    <div class="menu">
        <a class="single-menu" href="{{ route('dashboard') }}">
            <span class="material-symbols-outlined"> home </span>
            داشبورد
        </a>
    </div>

    <div class="menu">
        <a class="single-menu" href="{{ route('admin.brands.index') }}">
            <span class="material-symbols-outlined"> playlist_add </span>
            برندها
        </a>
    </div>

    <div class="menu">
        <a class="dropdown-btn" href="#">
            <span class="material-symbols-outlined"> person </span>
            کاربران
            <span class="material-symbols-outlined drowpdown-icon">
                arrow_drop_down
            </span>
        </a>
        <div class="dropdown-menu">
            <a href="#">لیست کاربران</a>
            <a href="#">گروه های کاربری</a>
            <a href="#">پرمیژن ها</a>
        </div>
    </div>

    <div class="menu">
        <a class="dropdown-btn" href="#">
            <span class="material-symbols-outlined"> shopping_cart </span>
            محصولات
            <span class="material-symbols-outlined drowpdown-icon">
                arrow_drop_down
            </span>
        </a>
        <div class="dropdown-menu">
            <a href="products.html">لیست محصولات</a>
            <a href="comments.html">لیست نظرات</a>
            <a href="categories.html">دسته بندی ها</a>
            <a href="{{ route('admin.attributes.index') }}">ویژگی ها</a>
            <a href="tags.html">تگ ها</a>
        </div>
    </div>

    <div class="menu">
        <a class="dropdown-btn" href="#">
            <span class="material-symbols-outlined"> paid </span>
            سفارشات
            <span class="material-symbols-outlined drowpdown-icon">
                arrow_drop_down
            </span>
        </a>
        <div class="dropdown-menu">
            <a href="#">تراکنش ها</a>
            <a href="#">کوپن ها</a>
        </div>
    </div>

    <div class="menu">
        <a class="single-menu" href="#">
            <span class="material-symbols-outlined"> image </span>
            بنرها
        </a>
    </div>
</div>
