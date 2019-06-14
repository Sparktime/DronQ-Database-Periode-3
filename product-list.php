<?php
// UTF-8 NΟ BOM 
session_start();
$_SESSION['list'] = 'product-list.php';


include 'db.php';
require 'productController.php';

$list = new productController($pdo);
$rs = $list-> getAll();

// get result set
$sql = "SELECT * FROM `PRODUCTINFO` ORDER BY `Type` DESC";
$rs = $pdo->query($sql, PDO::FETCH_OBJ);
?>


<!DOCTYPE html>
<html lang="nl">

    <head>
        <title> Product list</title>
        <?php require 'head.php'; ?>
    </head>

    <body>
        
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <?php require 'menu.php'; ?>
        </nav>
        
        <div class="col-xl-12 mx-auto container-fluid" style="margin-top:80px">
        <h1>Products</h1>
        <a href = "productManager.php?action=create" title="add a record" class="btn btn-success navbar-btn">New Product</a>
    
        <!-- show result set -->
        <table class="table">
            <tr>
                <th>Edit</th>
                <th>Name</th>
                <th>Type</th>
                <th>Text</th>                
                <th>Specs</th>
                <th>Price</th>
                <th>IMG</th>
            </tr>
            
            <!-- PHP Database -->
            <?php while ($row = $rs->fetch()) { ?>
            <tr>
                <td><a title="edit" href="product-edit.php?Serial_No=<?= $row->Serial_No ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Name ?></td>
                <td><?= $row->Type ?></td>
                <td><?= $row->Text ?></td>
                <td><?= $row->Specs ?></td>
                <td><?= $row->Price ?></td>
                <td><img src="<?= $row->IMG ?>" width="60" height="40"></td>
                <td><a title="delete" href="productManager.php?action=delete&Serial_No=<?= $row->Serial_No ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
        
        <div class="col-lg-11">
                
            <form action='<?php echo $_SERVER["PHP_SELF"];?>' methode='post' enctype="multipart/form-data">
                Import .CSV : <input type='file' name='sel_file' size='20'>
            <input class="btn btn-primary" type='submit' name='submit' value='submit'>
            </form>
        </div>
        
<?php   if(isset($_POST['submit']))
        {
            $fname = $_FILES['sel_file']['name'];
            echo 'upload file name: '.$fname.' ';
            $chk_ext = explode(".",$fname);
    
            if(strtolower(end($chk_ext)) == "csv")
            {
                $filename = $_FILES['sel_file']['tmp_name'];
                $handle = fopen($filename, "r");
                
                while (($data = fgetcsv($handle, 1000, ",")) !==FALSE)
                {
                   $sql = "INSERT INTO 'PRODUCTINFO' ('Name', 'Type', 'Text', 'Infotext', 'Specs', 'Price', 'IMG') VALUES ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]')";
                    mysql_query($sql) or die(mysql_error());
                }
                       
                fclose($handle);
                echo "CSV succesfully imported";
            }
            else
            {
                echo "Invalid File";
            }
}
?>
    </body>

</html>

    