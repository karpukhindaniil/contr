<main>
    <div class="container mb-5"><br>   
    <div class="row">
                </div>
                <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Дата заказа</th>
                                <th>Дата доставки(плановая)</th>
                                <th>Дата доставки(фактическая)</th>
                                <th>Контрагент</th>
                                <th>Колличество</th>
                                <th>Статус</th>
                                <th>Цена</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                           foreach($orders as $row)
                            {
                                echo 
                                '<tr>
                                <td>'.$row['ordersID'].'</td>
                                <td>'.$row['OrderDate'].'</td>
                                <td>'.$row['OrderDateSending'].'</td>
                                <td>'.$row['OrderDateFakt'].'</td>
                                <td>'.$row['FIO'].'</td>
                                <td>'.$row['OrderKol'].'</td>
                                <td>'.$row['OrderStatus'].'</td>
                                <td>'.$row['PricePriceList'].'₽</td>
                                <td>'.$row['ProductName'].'</td>
                                <td><button type="button" class="btn btn-outline-dark">Удалить</button></a></td>';
                                if(!empty($row['orders']))
                                {
                                   echo'<th>'.$row['orders'].'</th>';
                                }
                                else
                                {
                                    
                                    echo '<th><a href="kontragent/kontrorders'.$row['ordersID'].'">
                                    <button type="button" class="btn btn-outline-dark">Редактировать</button></a></th>';
                                }
                                echo '</tr>';
                               
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