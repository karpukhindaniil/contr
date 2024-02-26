<main style="background-color:">
    <div class="container mb-2"><br>
    <form method="POST" action="admin/dodpricelist">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                        <label for="PricePriceList" class="form-label">Цена прайс-листа</label>
                            <input type="numeric" class="form-control"  id="PricePriceList" name="PricePriceList" 
                            placeholder="Цена прайс-листа">
                        </div>
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
                            <button type="submit" class="btn btn-outline-dark" name="dodpricelist">Добавить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
    <div class="container mb-5"><br>
        <div class="row">
            <div class="row">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th scope="col">Цена</th>
                                <th scope="col">Навзание группы</th>
                                <th scope="col">Название товара</th>
                            </tr>
                        </thead>
                        <?php
                      
                                foreach($pricelist as $row)
                                {
                                    echo '<tr>
                                    <td scope="col">'.$row['PriceListID'].'</td>
                                    <td scope="col">'.$row['PricePriceList'].'₽</td>
                                    <td scope="col">'.$row['NameGrupp'].'</td>
                                    <td scope="col">'.$row['ProductName'].'</td>';//Проснулся в 10:06
                                if(!empty($row['pricelist']))
                                {
                                   echo'<th>'.$row['pricelist'].'</th>';
                                }
                                else
                                {
                                    echo '<th><a href="admin/deletepricelist/'.$row['PriceListID'].'"><button type="button" class="btn btn-outline-dark">Удалить</button></a></th>';
                                    echo '<th><a href="admin/updpricelist/'.$row['PriceListID'].'"><button type="button"  data-bs-toggle="modal"  class="btn btn-outline-dark">Редактировать</button></a></th>';
                                }
                                echo '</tr>';
                                }  
                                
                        ?>
                    </table>
                </div>
            </div>
        </div><br>
    </div>     
            </div>
            <br>
    </div>
    </main>