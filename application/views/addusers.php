<form  method="POST"  role="form" class="form-inline" action="admin/adduser">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <p></p>
                    <label for="FIO" class="form-label" >ФИО</label>
                    <input type="text" class="form-control" id="FIO" name="FIO" aria-describedby="emailHelp">   
                </div>
                <div class ="mb-3">
                        <label for="RoleID" class="form-label">Роль</label>
                        <select class = "form-select" id="RoleID" name="RoleID">
                                            <!--Выбрающий список-->
                            <?php
                                foreach($selectRole as $row)
                                {
                                echo '<option value='.$row['RoleID'].'>'.$row['RoleName'].'</option>';//выпадаюший список через БД 
                                }
                            ?>
                        </select>
                </div>
                <div class="mb-3">
                    <label for="UserLogin" class="form-label" >Логин</label>
                    <input type="text" class="form-control" id="UserLogin" name="UserLogin">
                </div>
                <div class="mb-3">
                    <label for="UserPassword" class="form-label" >Пароль</label>
                    <input type="password" class="form-control" id="UserPassword" name="UserPassword">
                </div>
                <div class ="mb-3">
                        <label for="ContragentDogovorID" class="form-label">Название контрагента</label>
                        <select class = "form-select" id="ContragentDogovorID" name="ContragentDogovorID">
                                            <!--Выбрающий список-->
                            <?php
                                foreach($selectContragent as $row)
                                {
                                echo '<option value='.$row['ContragentDogovorID'].'>'.$row['NameContragent'].'</option>';//выпадаюший список через БД 
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
                                foreach($users as $row)
                                {
                                    echo '<tr>
                                    <td scope="col">'.$row['UserID'].'</td>
                                    <td scope="col">'.$row['FIO'].'</td>
                                    <td scope="col">'.$row['RoleName'].'</td>
                                    <td scope="col">'.$row['NameContragent'].'</td>';//Проснулся в 10:06
                                if(!empty($row['users']))
                                {
                                   echo'<th>'.$row['users'].'</th>';
                                }
                                else
                                {
                                    echo '<th><a href="admin/deleteuser/'.$row['UserID'].'"><button type="button" class="btn btn-outline-dark">Удалить</button></a></th>';
                                    echo '<th><a href="admin/upduser/'.$row['UserID'].'"><button type="button"  data-bs-toggle="modal"  class="btn btn-outline-dark">Редактировать</button></a></th>';
                                }
                                echo '</tr>';
                                }  
                                
                        ?>
                    </table>
                </div>
            </div>
        </div><br>
    </div>