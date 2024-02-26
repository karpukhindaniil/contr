<!--Джепаров  -->
<main>
    <div class="container mb-2"><br>
    <form method="POST" action="admin/updpricelist2">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                        <div class="row">
                        <div class ="mb-3">
                        <?php
            foreach($pricelist as $row)
            { 
                echo '
             
                <input type="text" class="form-control" name="PriceListID" id="PriceListID" value="'.$row['PriceListID'].'" placeholder="№"hidden><br>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">Цена прайс-листа</label>
                <input type="numeric" class="form-control" name="PricePriceList" id="PricePriceList" value="'.$row['PricePriceList'].'" placeholder="Цена прайс-листа"><br>
                </div>
                </div>';
            }
            ?>
                        <div class ="mb-3">
                            <label for="TypeListID" class="form-label">Название группы прайс-листа</label>
                            <select class = "form-select" id="TypeListID" name="TypeListID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectTypeList as $row){
                                echo '<option value='.$row['TypeListID'].'>'.$row['NameGrupp'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <div class ="mb-3">
                            <label for="ProductID" class="form-label">Название товара прайс-листа</label>
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