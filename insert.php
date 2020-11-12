
<?php
//insert.php;

if(isset($_POST["item_name"]))
{
 $connect = new PDO("mysql:host=127.0.0.1:3306;dbname=u558134221_esterilavos", "u558134221_esterilavos", "Q*sçxyym34y5$");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO tbl_order_items 
  (order_id, item_name, item_quantity, item_unit) 
  VALUES (:order_id, :item_name, :item_quantity, :item_unit)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':item_name'  => $_POST["item_name"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 
    ':item_unit'  => $_POST["item_unit"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>


<?php
//insert.php;

if(isset($_POST["Nome"]))
{

$connect = new PDO("mysql:host=127.0.0.1:3306;dbname=u558134221_esterilavos", "u558134221_esterilavos", "Q*sçxyym34y5$");
 $order_id = uniqid();
 for($count = 0; $count < count($_POST["Nome"]); $count++)
 {  
  $query = "INSERT INTO PecaC (order_id, Nome, qtd) VALUES (:order_id, :Nome, :qtd)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':Nome'  => $_POST["Nome"][$count], 
    ':qtd' => $_POST["qtd"][$count]
   
   )
  );
 }
 $result = $statement->fetchAll();
 if(isset($result))
 {
  echo 'ok';
 }
}
?>