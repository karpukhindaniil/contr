<h2>Список товаров</h2>
<div class="container">
	<div class="row">
		<table class="table">
			<tr>
                <th>Код</th>
				<th>Название продукта</th>
				<th>Цена продукта</th>
                <th>Описание продукта</th>
                <th>Группа</th>
                
			</tr>
            <?php
            //$ = 'select ProductID, ProductName, ProductPrice, ProductDescription, GruppName, ProductCount  from Product, Grupp where Grupp.GruppID=Product.GruppID';
			//$result = $this->db->query($sqlsession);
            foreach($product as $row)    //для каждой строки результата $row  в цикле повторим
            {
                echo '<tr><td>'.$row['ProductID'].'</td>
                <td>'.$row['ProductName'].'</td>
                <td>'.$row['ProductPrice'].'₽</td>
                <td>'.$row['Description'].'</td>
                <td>'.$row['NameGrupp'].'</td>';
                if(!empty($row['product']))
                {
                   echo'<th>'.$row['product'].'</th>';
                }
                else
                {
                    echo '
                    <th><a href="admin/productspricelist/'.$row['ProductID'].'">
                    <button type="button" class="btn btn-outline-dark">Редактировать</button></a></th>';
                }
                echo '</tr>';
                
            }
            //$result->free(); //освободить память, занятую результатом
            ?>
		</table>
	</div>	
</div>
