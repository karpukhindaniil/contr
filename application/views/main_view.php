<div class = "container-fluid">
  <table class="table"><tr>
                  <th>Название товара:</th>
                  <th>Цена:</th>
                  <th>Описание:</th>
                  <th>Количество:</th>
                  <th>Название группы:</th>
                  <th>Номер места:</th>
                  <th>Тип:</th>
                </tr>
          <?php
            foreach ($tovar  as $row)
            {
              echo 
              //Любой пользователь может просмотреть описание тура, при нажатии на спойлер "Подробнее" выводит подробную информацию. 
              //Если пользователь авторизован под ролью клиента, то при нажатии кнопки он может бронировать туры. 
              //Если пользователь авторизован под ролью менеджера, то при нажатии кнопки он может просмотреть список туристов.
              //Если пользователь авторизован под ролью секретаря, то при нажатии кнопки он может изменить цену.
              '<tr>            
                      <td>'.$row['TovarName'].'</td>
                      <td>'.$row['TovarPrice'].'</td>
                      <td>'.$row['TovarDescription'].'</td>
                      <td>'.$row['TovarCount'].'</td>
                      <td>'.$row['GruppName'].'</td>';
                      $user  =  $this->session->userdata();
                      if(!empty($user['UserID']))
                      {
                        if($user['UserRole'] == "Контрагент"){
                        echo '<td><a href = "kontragent/tovar?TovarID='.$row['TovarID'].'" class = "btn btn-primary">Создать заказ</a></td>';                        
                        }
                        if($user['UserRole'] == "Оператор"){
                          echo '<td><a href = "operator/tovar?TovarID='.$row['TovarID'].'" class = "btn btn-primary">Искать</a></td>';                        
                          }
                        if($user['UserRole'] == "Администратор"){
                          echo '<td><a href = "administrator/izm_cenu/'.$row['TovarID'].'" class="btn btn-primary">Изменить цену</a></td>';                        
                          }
                      }
                      echo   '   
                  </tr>';
            } 
                
          ?> 
    </table>
  </div>  