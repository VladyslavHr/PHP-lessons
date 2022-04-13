<div class="container mt-5">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="menu-wrap-groups-ind col-xl-9">
            <nav class="group-ind-menu-navbar navbar navbar-expand-lg navbar-light section-shadow">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="list-groups-ind navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('profiles.shop') }}">Все</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Мои товары</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Мои покупки</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.create') }}">Добавить товар</a>
                        </li>
                        <li class="nav-item">
                             <a class="nav-link" href="#">Может быть интересным</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('products.cart') }}">Корзина <i class="bi bi-bag"></i></a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="groups-update-btn btn btn-outline-success" type="submit">Искать</button>
                    </form>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
