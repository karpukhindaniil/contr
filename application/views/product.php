<main style="background-color:">
    <div class="container mb-5"><br>

    
    <div class="row">
                </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Наиминование</th>
                                <th>Количество</th>
                                <th>Цена</th>
                            </tr>
                        </thead>
                       <?php
                            foreach($product as $row)
                            {
                                echo 
                                '<tr>
                                <td>'.$row['ProductID'].'</td>
                                <td>'.$row['ProductName'].'</td>
                                <td>'.$row['ProductCount'].'</td>
                                <td>'.$row['ProductPrice'].'₽</td>
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