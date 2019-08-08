<?php 
include_once("db.php");
$text=$_REQUEST['t'];
$user=$_REQUEST['u'];
$request=$_REQUEST['req'];
$Id=$_REQUEST['d'];





if($request != ""){
    if($request == "add")
    {
        $ins="INSERT INTO note (user, noteText) VALUES ('$user', '$text')";
        mysqli_query($con,$ins);
    }
    elseif($request == "del")
    {
        $de="DELETE FROM note WHERE id =$Id" ;
        mysqli_query($con,$de);
        
    }
    elseif($request == "edit"){
        $update="UPDATE note SET noteText = '$text' WHERE id = '$Id' " ;
        mysqli_query($con,$update);
    }
}


$sel = "SELECT * FROM note ORDER BY id DESC";
$run = mysqli_query($con,$sel);
while($row=mysqli_fetch_assoc($run)){

   

?>


<div class="card-panel note">
    <i class="small material-icons right action" onclick= "post('del',<?php echo $row['id']?>)">delete</i>
    <i class="small material-icons right action" id="editBtn" data-id="<?php echo $row['id']?>">edit</i>
    <h5><?php echo $row["user"] ?></h5>
    <small><i class="tiny material-icons">query_builder</i><?php echo $row["time"]?></small><br>
   <p> <?php echo $row["noteText"] ?> </p>
</div>
<?php
        }
?>