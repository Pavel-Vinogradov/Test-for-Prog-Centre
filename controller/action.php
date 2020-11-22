<?php
## Database configuration
require "../model/db.php";


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

    public function del()
    {
        if (isset($_POST['delId'])) {
            $id = $_POST['delId'];
            $this->delete($id);
        }
    }

    public function excel()
    {
        if (isset($_GET['export']) && $_GET['export'] = 'excel') {
            header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
            header("Content-Disposition: attachment; filename=products.xls");
            header("Expires: 0");
            header ( "Pragma: no-cache" );
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: private", false);

            $this->read();
            echo '<table border=1 cellspacing=0>';
            echo '<tr>
<td style="padding:2px 5px; mso-number-format:\@;">id</td>
<td style="padding:2px 5px; mso-number-format:\@;">Наименование</td>
<td style="padding:2px 5px; mso-number-format:\@;">Описание</td>
<td style="padding:2px 5px; mso-number-format:\@;">Цена</td>
</tr>';
            foreach ($this->read() as $item) {
                echo '<tr>
<td>' . $item['id'] . '</td>
<td>' . $item['name'] . '</td>
<td>' . $item['description'] . '</td>
<td>' . $item['price'] . '</td>
</tr>    ';
            }
            echo '</table>';
        }
    }
}

$actionClass = new Action();
$actionClass->view();
$actionClass->add();
$actionClass->getId();
$actionClass->edit();
$actionClass->del();
$actionClass->excel();