
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cart.index') }}">Cart </a>
        </li>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle"
               href="#" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false"
            >
                <span class="badge badge-pill badge-dark">
                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                <ul class="list-group" style="margin: 20px;">
                    @include('posts.layouts.cart-drop')
                </ul>
            </div>
        </li>
    </ul>