<main style="background-color:">
    <div class="container mb-2"><br>
    <form method="POST" action="admin/dodcontr">
                <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="NameContragent" name="NameContragent" placeholder="Название">
                        </div>
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="Adress" name="Adress" placeholder="Адрес">
                        </div>
                        <label for="user_name" class="form-label" >Дата Договор</label>
                        <div class ="mb-3">
                            <input type="date" class="form-control"  id="DogovorDate" name="DogovorDate">
                        </div>
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="INN" name="INN" placeholder="ИНН">
                        </div>
                        <div class ="mb-3">
                            <input type="text" class="form-control"  id="KPP" name="KPP" placeholder="КПП">
                        </div>
                        <div class ="mb-3">
                            <label for="VidContragentID" class="form-label">ТипКонтрагент</label>
                            <select class = "form-select" id="VidContragentID" name="VidContragentID">
                            <!--Выбрающий список-->
                            <?php
                            foreach($selectVidContragent as $row){
                                echo '<option value='.$row['VidContragentID'].'>'.$row['TypeContragent'].'</option>';//выпадаюший список через БД 
                            }
                            ?>
                            </select>
                        </div>
                        <div class ="mb-3" style="text-align: center">
                            <button type="submit" class="btn btn-outline-dark" name="dodcontr">Добавить</button>
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
                                <th scope="col">Наименование</th>
                                <th scope="col">Дата договора</th>
                                <th scope="col">Адрес</th>
                                <th scope="col">ИНН</th>
                                <th scope="col">КПП</th>
                                <th scope="col">Тип контрагента</th>
                            </tr>
                        </thead>
                        <?php
                      
                                foreach($contragent as $row)
                                {
                                    echo '<tr>
                                    <td scope="col">'.$row['ContragentDogovorID'].'</td>
                                    <td scope="col">'.$row['NameContragent'].'</td>
                                    <td scope="col">'.$row['DogovorDate'].'</td>
                                    <td scope="col">'.$row['Adress'].'</td>
                                    <td scope="col">'.$row['INN'].'</td>
                                    <td scope="col">'.$row['KPP'].'</td>
                                    <td scope="col">'.$row['TypeContragent'].'</td>';
                                if(!empty($row['contragent']))
                                {
                                   echo'<th>'.$row['contragent'].'</th>';
                                }
                                else
                                {
                                    echo '<th><a href="admin/deletecontr/'.$row['ContragentDogovorID'].'"><button type="button" class="btn btn-outline-dark">Удалить</button></a></th>';
                                    echo '<th><a href="admin/updcontr/'.$row['ContragentDogovorID'].'"><button type="button"  data-bs-toggle="modal"  class="btn btn-outline-dark">Редактировать</button></a></th>';
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