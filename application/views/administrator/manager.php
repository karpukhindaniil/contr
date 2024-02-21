<div class = "container-fluid">
  <table class = "table">
    <tr>
      <th> Номер путёвки:</th>
      <th> Название тура:</th>
      <th> Цена билета:</th>
      <th> Отправление:</th>
      <th> Прибытие:</th>
      <th> Номер рейса:</th>
      <th> ФИО:</th>
      <th> Паспорт:</th>
      <th> Статус</th>
    </tr>
            <?php
            foreach ($putyovka  as $row)
            {
            echo
            //менеджер выдаёт путёвки клиентам 
            '<tr>
                  <th>'.$row['id_putyovki'].'</th>
                  <th>'.$row['name'].'</th>
                  <th>'.$row['cena'].'</th>
                  <th>'.$row['data_otpravleniya'].'</th>   
                  <th>'.$row['data_pribytiya'].'</th>
                  <th>'.$row['nomer_reisa'].'</th>  
                  <th>'.$row['fio'].'</th>
                  <th>'.$row['passport'].'</th>';
                  if ($row['status']=='Оплачена'){
                    echo      ' <th><a href = "manager/vydacha/'.$row['id_putyovki'].'" class = "btn btn-primary">Выдать</a></th>';
                  }    
                  else
                  {
                    echo '<th></th>';
                  }
              echo '</tr>';
            } 
            ?>                
  </table>
</div> 