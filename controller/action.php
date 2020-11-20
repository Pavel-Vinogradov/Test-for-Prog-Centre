<?php
## Database configuration
require "../model/db.php";
$db = new dbConfig();
//echo 'test <br>';

## check $_POST


    if (isset($_POST['action']) && ($_POST['action'] == 'view')) {
        $output='';
        $data = $db->read();
        if ($db->rowCount() > 0) {
            $output .= '       <table class="table-sm table-bordered table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Цена</th>
                        <th>Время создание</th>
                        <th>Изменения</th>
                    </tr>
                    </thead>
                    <tbody>';
            foreach ($data as $item) {
                $output .= '
              <tr class="text-center text-secondary">
                        <td>' . $item['id'] . '</td>
                        <td>' . $item['name'] . '</td>
                        <td>' . $item['description'] . '</td>
                        <td>' . $item['price'] . ' руб</td>
                        <td>' . $item['created'] . '</td>
                        <td>

                            <a href="#"
                               class="text-success">
                                <i class="fas fa-info-circle fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#"
                               class="text-primary">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#"
                               class="text-danger">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </a>&nbsp;&nbsp;
                        </td>';

            }
            $output .= '   </tbody>
                </table>';
            echo $output;
        }


}

 if (isset($_POST['action']) && ($_POST['action'] == 'insert'))
 {

     $name=$_POST['name'];
     $description=$_POST['description'];
     $price=$_POST['price'];
     $db->insert($name,$description,$price) ;

 }


/*
        <table class="table-sm table-bordered table table-striped">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>Название</th>
                        <th>Описание</th>
                        <th>Цена</th>
                        <th>Время создание</th>
                        <th>Изменения</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($i=1;$i<10;$i++) { ?>
                    <tr class="text-center text-secondary">
                        <td>   <?php echo  $i?></td>
                        <td><?php echo  $i?></td>
                        <td><?php echo  $i?></td>
                        <td><?php echo  $i?> руб</td>
                        <td><?php echo  $i?></td>
                        <td>

                            <a href="#"
                               class="text-success">
                                <i class="fas fa-info-circle fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#"
                               class="text-primary">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#"
                               class="text-danger">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </a>&nbsp;&nbsp;
                        </td>

                    </tr>
                    <?php }?>
                    </tbody>
                </table>
 */