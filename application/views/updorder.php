<!--Джепаров  -->
<main>
    <div class="container mb-2"><br>
    <form method="POST" action="kontr/updorder2">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                        <div class="row">
                        <div class ="mb-3">
                        <?php
            foreach($orders as $row)
            { 
                
                echo '
             
                <input type="text" class="form-control" name="ordersID" id="ordersID" value="'.$row['ordersID'].'" placeholder="№"hidden><br>
                </div>
                </div>
                <div class="row">
                <div class="col-12">
                <label for="date" class="form-label">Дата заказа</label>
            <input type="date" class="form-control" name="OrderDate" id="OrderDate" value="'.$row['OrderDate'].'" placeholder="Дата заказа"><br>
            </div>
            </div>
            <div class="row">
                <div class="col-12">
                <label for="date" class="form-label">Дата отправки заказа</label>
                <input type="date" class="form-control" name="OrderDateSending" id="OrderDateSending" value="'.$row['OrderDateSending'].'"placeholder="Дата отправки заказа"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <label for="date" class="form-label">Фактическая дата заказа</label>
                <input type="date" class="form-control" name="OrderDateFakt" id="OrderDateFakt" value="'.$row['OrderDateFakt'].'"placeholder="Фактическая дата заказа"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                <label for="text" class="form-label">Статус</label>
                <input type="text" class="form-control" name="OrderStatus" id="OrderStatus" value="'.$row['OrderStatus'].'"placeholder="Статус"><br>
            </div>
            <div class="row">
                <div class="col-12">
                <label for="text" class="form-label">Количество</label>
                <input type="text" class="form-control" name="OrderKol" id="OrderKol" value="'.$row['OrderKol'].'"placeholder="Количество"><br>
            </div>';
            }
            ?>
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
                        <div class ="mb-3">
                            <label for="PriceListID" class="form-label">Цена прайс-листа</label>
                            <select class = "form-select" id="PriceListID" name="PriceListID">
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
                            <button type="submit" class="btn btn-outline-dark">Обновить</button>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </form>
</main>