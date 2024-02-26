<!--Джепаров  -->
<main>
    <div class="container mb-2"><br>
    <form method="POST" action="admin/upduser2">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                        <div class="row">
                        <div class ="mb-3">
                        <?php
            foreach($users as $row)
            { 
                echo '
             
                <input type="text" class="form-control" name="UserID" id="UserID" value="'.$row['UserID'].'" placeholder="№"hidden><br>
                </div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">ФИО</label>
                <input type="text" class="form-control" name="FIO" id="FIO" value="'.$row['FIO'].'" placeholder="ФИО"><br>
                </div>
                </div>
                    <div class="row">
                    <div class="col-12">
                    <label for="text" class="form-label">Логин</label>
                <input type="text" class="form-control" name="UserLogin" id="UserLogin" value="'.$row['UserLogin'].'" placeholder="Логин"><br>
                </div>
                </div>
                    <div class="row">
                    <div class="col-12">
                    <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" name="UserPassword" id="UserPassword" value="'.$row['UserPassword'].'" placeholder="Пароль"><br>
                </div>
                </div>';
            }
            ?>
                        <div class ="mb-3">
                            <label for="RoleID" class="form-label">Роль</label>
                            <select class = "form-select" id="RoleID" name="RoleID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectRole as $row){
                                echo '<option value='.$row['RoleID'].'>'.$row['RoleName'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <div class ="mb-3">
                            <label for="ContragentDogovorID" class="form-label">Название контрагента</label>
                            <select class = "form-select" id="ContragentDogovorID" name="ContragentDogovorID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectContragent as $row){
                                echo '<option value='.$row['ContragentDogovorID'].'>'.$row['NameContragent'].'</option>';//выпадаюший список через БД 
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