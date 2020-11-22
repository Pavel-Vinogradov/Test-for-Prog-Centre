<?php
## Database configuration
require "../model/db.php";
//$db = new dbConfig();
//echo 'test <br>';

## check $_POST
class Action extends dbConfig
{
    public function view()
    {
        if (isset($_POST['action']) && ($_POST['action'] == 'view')) {
            $output = '';
            $this->read();
            if ($this->rowCount() > 0) {
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
                foreach ($this->read() as $item) {
                    $output .= '
              <tr class="text-center text-secondary">
                        <td>' . $item['id'] . '</td>
                        <td>' . $item['name'] . '</td>
                        <td>' . $item['description'] . '</td>
                        <td>' . $item['price'] . ' руб</td>
                        <td>' . $item['created'] . '</td>
                        <td>

                            <a href="#" id="' . $item['id'] . '"
                               class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#" title="delete" id="' . $item['id'] . '"
                              data-toggle="modal" data-target="#editModal" class="text-primary editBtn">
                                <i class="fas fa-edit fa-lg"></i>
                            </a>&nbsp;&nbsp;
                            <a href="#"  id="' . $item['id'] . '"
                               class="text-danger delBtn">
                                <i class="fas fa-trash-alt fa-lg"></i>
                            </a>&nbsp;&nbsp;
                        </td>';

                }
                $output .= '   </tbody>
                </table>';
                echo $output;
            }


        }
    }

    public function add()
    {
        if (isset($_POST['action']) && ($_POST['action'] == 'insert')) {
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);

            $this->insert($name, $description, $price);
        }
    }

    public function getId()
    {
        if (isset($_POST['getId'])) {
            $id = $_POST['getId'];
            $row = $this->getProductsID($id);
            echo json_encode($row);
        }
    }

    public function edit()
    {
        if (isset($_POST['action']) && ($_POST['action'] == 'edit')) {
            $id = htmlspecialchars($_POST['id']);
            $name = htmlspecialchars($_POST['name']);
            $description = htmlspecialchars($_POST['description']);
            $price = htmlspecialchars($_POST['price']);
            $this->update($id, $name, $description, $price);
        }

    }
}

$actionClass = new Action();
$actionClass->view();
$actionClass->add();
$actionClass->getId();
$actionClass->edit();
//if (isset($_POST['action']) && ($_POST['action'] == 'view')) {
//    $output = '';
//    $data = $db->read();
//    if ($db->rowCount() > 0) {
//        $output .= '       <table class="table-sm table-bordered table table-striped">
//                    <thead>
//                    <tr class="text-center">
//                        <th>ID</th>
//                        <th>Название</th>
//                        <th>Описание</th>
//                        <th>Цена</th>
//                        <th>Время создание</th>
//                        <th>Изменения</th>
//                    </tr>
//                    </thead>
//                    <tbody>';
//        foreach ($data as $item) {
//            $output .= '
//              <tr class="text-center text-secondary">
//                        <td>' . $item['id'] . '</td>
//                        <td>' . $item['name'] . '</td>
//                        <td>' . $item['description'] . '</td>
//                        <td>' . $item['price'] . ' руб</td>
//                        <td>' . $item['created'] . '</td>
//                        <td>
//
//                            <a href="#" id="' . $item['id'] . '"
//                               class="text-success infoBtn"><i class="fas fa-info-circle fa-lg"></i>
//                            </a>&nbsp;&nbsp;
//                            <a href="#" title="delete" id="' . $item['id'] . '"
//                              data-toggle="modal" data-target="#editModal" class="text-primary editBtn">
//                                <i class="fas fa-edit fa-lg"></i>
//                            </a>&nbsp;&nbsp;
//                            <a href="#"  id="' . $item['id'] . '"
//                               class="text-danger delBtn">
//                                <i class="fas fa-trash-alt fa-lg"></i>
//                            </a>&nbsp;&nbsp;
//                        </td>';
//
//        }
//        $output .= '   </tbody>
//                </table>';
//        echo $output;
//    }
//
//
//}

//if (isset($_POST['action']) && ($_POST['action'] == 'insert')) {
//    $name = htmlspecialchars($_POST['name']);
//    $description = htmlspecialchars($_POST['description']);
//    $price = htmlspecialchars($_POST['price']);
//    $db->insert($name, $description, $price);
//}

//if (isset($_POST['getId'])) {
//    $id = $_POST['getId'];
//    $row = $db->getProductsID($id);
//    echo json_encode($row);
//}


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