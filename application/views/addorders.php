<main style="background-color:">
    <div class="container mb-2"><br>
        <form method="POST" action="kontr/addorders">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                    <div class ="mb-3">
                            <label for="UserID" class="form-label">ФИО пользователя</label>
                            <select class = "form-select" name="UserID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectUser as $row){
                                echo '<option value='.$row['UserID'].'>'.$row['FIO'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <label for="OrderDate" class="form-label" >Дата заказа</label>
                        <div class ="mb-3">
                            <input type="date" class="form-control"  id="OrderDate" name="OrderDate">
                        </div>
                        <label for="OrderDateSending" class="form-label" >Дата отправки заказа</label>
                        <div class ="mb-3">
                            <input type="date" class="form-control"  id="OrderDateSending" name="OrderDateSending">
                        </div>
                        <label for="OrderDateFakt" class="form-label" >Факт. дата заказа</label>
                        <div class ="mb-3">
                            <input type="date" class="form-control"  id="OrderDateFakt" name="OrderDateFakt">
                        </div>
                        <label for="OrderStatus" class="form-label" >Статус</label>
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="OrderStatus" name="OrderStatus" placeholder="Статус">
                        </div>
                        <label for="OrderKol" class="form-label" >Количество</label>
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="OrderKol" name="OrderKol" placeholder="Количество">
                        </div>
                        <div class ="mb-3">
                            <label for="PriceListID" class="form-label">Цена Прайс-листа</label>
                            <select class = "form-select" name="PriceListID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectPriceList as $row){
                                echo '<option value='.$row['PriceListID'].'>'.$row['PricePriceList'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <div class ="mb-3">
                            <label for="ProductID" class="form-label">Название товара</label>
                            <select class = "form-select" id="ProductID" name="ProductID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectProduct as $row){
                                echo '<option value='.$row['ProductID'].'>'.$row['ProductName'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <div class ="mb-3" style="text-align: center">
                            <button type="submit" class="btn btn-outline-dark" name="addorders">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</main>