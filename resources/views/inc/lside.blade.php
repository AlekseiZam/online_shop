<div class="position-fixed start-0 col-md-2 col-sm-12 col-12 p-3">
        <div class="small" style=" overflow: hidden;
  text-overflow: ellipsis;">{{session()->get('email')}}</div>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item text-white">
                <a href="{{route('main')}}" class="nav-link text-white" aria-current="page">
                    Главная
                </a>
            </li>
            @if(session()->get('id_access') > 1)
                <li>
                    <a href='{{ route('index') }}' class="nav-link text-white">
                        Управление
                    </a>
                </li>
            @endif
            <li>
                <a href="{{route('toCart')}}" class="nav-link text-white">
                    Корзина (<span class="cart_qty">{{\Cart::session(session()->get('user_id'))->getTotalQuantity()}}</span>)
                </a>

            </li>
            <li>
                <a href="{{route('order_list')}}" class="nav-link text-white">
                    Заказы
                </a>
            </li>
            <li>
                <a href="{{ route('exit') }}" class="nav-link text-white">
                    Выход
                </a>
            </li>
        </ul>
</div>
