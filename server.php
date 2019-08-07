<?php 
include_once("db.php");
$sel = "SELECT * FROM note ORDER BY id DESC";
$run = mysqli_query($con,$sel);
while($row=mysqli_fetch_assoc($run)){

?>


<div class="card-panel note">
    <i class="small material-icons right action">delete</i>
    <i class="small material-icons right action">edit</i>
    <h5><?php echo $row["user"] ?></h5>
    <small><i class="tiny material-icons">query_builder</i><?php echo $row["time"]?></small><br>
    <?php echo $row["noteText"] ?>
</div>
<?php
}
?>