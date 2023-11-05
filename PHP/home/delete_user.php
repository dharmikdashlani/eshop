<?php
include '../config/db_conn.php';
?>
<?php
$id=$_GET['id'];
$query="delete from customer where id='$id'";

$data=mysqli_query($con,$query);
if($data){
    ?>
    <script type="text/javascript">
        alert("data deleted");
        window.open("http://localhost/e_shop/PHP/home/display_user.php","_self");
    </script>
    <?php
}
else{
    ?>
    <script type="text/javascript">
        alert("data deleted");
        
    </script>
    <?php
}

?>