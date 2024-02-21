<div class="container-fluid">
  <table class="table">
    <tr>
      <th> Номер путёвки:</th>
      <th> Название тура:</th>
      <th> Цена билета:</th>
      <th> Отправление:</th>
      <th> Прибытие:</th>
      <th> Номер рейса:</th>
      <th> ФИО:</th>
      <th> Паспорт:</th>
      <th> Отказ</th>
      <th> Статус</th>
    </tr>
            <?php
            foreach ($tovar  as $row)
            {
            echo 
            //Клиент может оплатить забронированный тур или отказаться от забронированного тура
            '<tr>
                  <th>'.$row['TovarID'].'</th>
                  <th>'.$row['TovarName'].'</th>
                  <th>'.$row['TovarPrice'].'</th>
                  <th>'.$row['TovarDescription'].'</th>   
                  <th>'.$row['TovarCount'].'</th>
                  <th>'.$row['GruppName'].'</th>';
                  if ($row['status']=='Заявлена'){
                    echo      ' <th><a href="klient/otkaz/'.$row['id_putyovki'].'" class="btn btn-danger">Отказ</a></th>
                    <th><a href="klient/oplata/'.$row['id_putyovki'].'" class="btn btn-primary">Оплатить</a></th>';
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