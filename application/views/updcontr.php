<!--Джепаров  -->
<main>
    <div class="container mb-2"><br>
    <form method="POST" action="admin/updcontr2">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                        <div class="row">
                        <div class ="mb-3">
                        <?php
            foreach($contragent as $row)
            { 
                echo '
             
                <input type="text" class="form-control" name="ContragentDogovorID" id="ContragentDogovorID" value="'.$row['ContragentDogovorID'].'" placeholder="№"hidden><br>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">Название</label>
                <input type="text" class="form-control" name="NameContragent" id="NameContragent" value="'.$row['NameContragent'].'" placeholder="Название"><br>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">Адрес</label>
                    <input type="text" class="form-control" name="Adress" id="Adress" value="'.$row['Adress'].'"placeholder="Адрес"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">Дата Договор</label>
                    <input type="date" class="form-control" name="DogovorDate" id="DogovorDate" value="'.$row['DogovorDate'].'"placeholder="Телефон"><br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">INN</label>
                    <input type="text" class="form-control" name="INN" id="INN" value="'.$row['INN'].'"placeholder="<INN"><br>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">KPP</label>
                    <input type="text" class="form-control" name="KPP" id="KPP" value="'.$row['KPP'].'"placeholder="<KPP"><br>
                </div>
                        ';
            }
            ?>
                           <div class ="mb-3">
                            <label for="VidContragentID" class="form-label">ТипКонтрагент</label>
                            <select class = "form-select" name="VidContragentID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectVidContragent as $row){
                                echo '<option value='.$row['VidContragentID'].'>'.$row['TypeContragent'].'</option>';//выпадаюший список через БД 
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