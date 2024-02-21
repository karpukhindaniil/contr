<div class = "container-fluid">
  <table class = "table">
    <tr>
      <th>ФИО:</th>
      <th>Паспорт:</th>
    </tr>
     <?php
foreach ($putyovka  as $row)
{
echo 
//выводит фамилии туристов
'<tr>
      <th>'.$row['fio'].'</th>
      <th>'.$row['passport'].'</th>      
    </tr>';
}  
?>                
  </table>
</div> 