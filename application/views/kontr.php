<main style="background-color:">
    <div class="container mb-5"><br>
    <div class="row">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Наиминование</th>
                                <th>Дата договора</th>
                                <th>ИНН</th>
                                <th>КПП</th>
                                <th>Тип контрагента</th>
                                <th>Вид контрагента</th>
                            </tr>
                        </thead>
                        <?php                                                
                            foreach($contragent as $row)
                            {
                                echo 
                                '<tr>
                                <td>'.$row['ContragentDogovorID'].'</td>
                                <td>'.$row['NameContragent'].'</td>
                                <td>'.$row['DogovorDate'].'</td>
                                <td>'.$row['INN'].'</td>
                                <td>'.$row['KPP'].'</td>
                                <td>'.$row['TypeContragent'].'</td>
                                <td>'.$row['NameVidContragent'].'</td>
                                </tr>';
                            }                       
                        ?>
                    </table>
                </div>
                <div class="col-1"></div>
            </div>
        </div><br>
        </div></div></div>
    </div>
</main>