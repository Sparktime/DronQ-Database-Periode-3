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
                <td><a title="edit" href="productinfo-edit.php?Type=<?= $row->Type ?>"><i class="fas fa-pencil-alt"></i></a></td>
                <td><?= $row->Name ?></td>
                <td><?= $row->Type ?></td>
                <td><?= $row->Text ?></td>
                <td><?= $row->Specs ?></td>
                <td><?= $row->Price ?></td>
                <td><img src="<?= $row->IMG ?>" width="60" height="40"></td>
                <td><a title="delete" href="uploadManager.php?action=delete&Type=<?= $row->Type ?>"><i class="fas fa-trash-alt"></i></a></td>
             </tr>
            <?php } ?>
            
        </table>
        </div>
        
        <div class="row">
           <div class="col-lg-6">
                <form action='csvUploadManager.php' method='post' enctype="multipart/form-data">
                Import .CSV : <input type='file' name='csv_file' size='20'>
                <input class="btn btn-primary" type='submit' name='submit' value='submit'>
                </form>
            </div>
            <div class="col-lg-6">
                <form action="imageUploadManager.php" method="POST" ectype="multipart/form-data">
                <input type="file" name="image_file">
                <button class="btn btn-primary" type="submit" name="submit">Upload IMG</button>
                </form>
            </div>
        </div>

<?php

// Upload IMG
/*
if (isset($_POST['submit'])) {
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
        
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');
    
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000) {
                $fileNameNew = uniqid('', true).".".$fileActualExt;
                $fileDestionation = 'img/'$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestiantion);
                header("Location: product-list.php?uploadsuccess";)
            } else {echo "File too big";}
        } else {echo "File upload error";}
    } else {echo "Wrong file type";}
}

*/
?>
        
<?php
//Upload CSV

/*
if(isset($_POST['submit']))
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
*/
?>
    </body>

</html>

    