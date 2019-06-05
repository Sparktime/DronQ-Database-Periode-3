
////// UTF-8 NΟ BOM
////session_start();
////require 'db.php';
////require 'userController.php';
////
//////// get post parameter
//////$Customer_ID = $_POST['Customer_ID'];
//////$Customer_Surname = $_POST['Customer_Surname'];
//////$Customer_Firstname = $_POST['Customer_Firstname'];
//////$Address = $_POST['Address'];
//////$ZipCode = $_POST['ZipCode'];
//////$City = $_POST['City'];
//////$Country = $_POST['Country'];
//////$Email = $_POST['Email'];
//////$Telephone = $_POST['Telephone'];
//////$Day_Of_Birth = $_POST['Day_Of_Birth'];
//////$RegistrationDate = $_POST['RegistrationDate'];
//////$oldEmail = $Email;
////// update record
//////$sql = "UPDATE `CUSTOMER` SET Customer_Surname = ?, Customer_Firstname = ?, Address = ?, ZipCode = ?, City = ?, Country = ?, Email = ?, Telephone = ?, Day_Of_Birth = ?, RegistrationDate = ? WHERE Customer_ID = ?";
//////$stmt = $pdo->prepare($sql);
//////$stmt->execute([$_POST['Customer_Surname'], $_POST['Customer_Firstname'], $_POST['Address'], $_POST['ZipCode'], $_POST['City'], $_POST['Country'], $_POST['Email'], $_POST['Telephone'], $_POST['Day_Of_Birth'], $_POST['RegistrationDate'], $id]);
//////checkSQL($stmt);
////
////$save = new userController($pdo);
////$save->save($_POST['Customer_ID'], $_POST);
/////*$sql = "UPDATE `USER` SET Email = ? WHERE Email = ?";
////$stmt = $pdo->prepare($sql);
////$stmt->execute([$Email, $oldEmail]);
////checkSQL($stmt);*/
////
//////// return to list
//////if(isset($_SESSION['list'])) {
//////    header('location: ' . $_SESSION['list']);
//////} else {
//////    header('location: .');
//////}