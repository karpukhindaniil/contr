<header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:  #808080;">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="img/barabulka.png" alt="..." class="logo" width="120" height="110"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main/"><u>Товары</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="kontr/orders"><u>Мои заказы</u></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="kontr/orders2"><u>Добавление заказов</u></a>
                    </li>         
                    <li>
                        <?php
                            echo "<a class='nav-link'>На сайте: $UserLogin</a>";
                        ?>
                    </li>
                </ul>
                <ul class="navbar-nav w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="main/exit">Выход</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
</header>