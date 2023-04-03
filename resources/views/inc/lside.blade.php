<div class="position-fixed start-0 col-md-2 col-sm-12 col-12 p-3">
        <div class="small" style=" overflow: hidden;
  text-overflow: ellipsis;">{{session()->get('email')}}</div>
        <hr>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item text-white">
                <a href="#" class="nav-link active" aria-current="page">
                    Главная
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Управление
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
                    Корзина
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-white">
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
