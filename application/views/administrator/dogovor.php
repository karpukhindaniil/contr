<div class="container-fluid">
<table class="table"><tr>
                  <th>Имя туроператора:</th>
                  <th>Дата договора:</th>
                  <th>Срок действия:</th>
                  <th>Вознаграждение:</th>
                </tr>
            <?php
foreach ($dogovor  as $row)
{
echo 
//просмотр списка отчётов
'<tr>              
      <th>'.$row['named'].'</th>
      <th>'.$row['data'].'</th>
      <th>'.$row['srok_deistviya'].'</th>
      <th>'.$row['voznagrajdeniyed'].'</th>
    </tr>';
}
?> 
</table>