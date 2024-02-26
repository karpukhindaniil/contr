<main style="background-color:">
    <div class="container mb-5"><br>
    <form method="POST" role="form" action="">
<div class="row">
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
            </div>
            <div class ="mb-3">
                            <label for="PriceListID" class="form-label">Прайс-лист</label>
                            <select class = "form-select" name="PriceListID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectPriceList as $row){
                                echo '<option value='.$row['PriceListID'].'>'.$row['PricePriceList'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
            </div>
            <div class="col-lg-6">
                    <input type="date" class="form-control" placeholder="С" name="firstdate" id="firstdate">
                </div>
                <div class="col-lg-6">
                    <input type="date" class="form-control" placeholder="по" name="seconddate" id="seconddate"><br>
                </div>
            <div class="row">
                <div class="col-lg-12">
                    <center><button type="submit" class="btn btn-outline-dark" name="submit" value="1">Показать</button></center><br> <br>
                </div>
            </div>
    </div>
    </form>
</main>