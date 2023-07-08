<?php
if ($_SERVER['REQUEST_METHOD']="POST") {
    $id = $_POST['id'];
   
?>

    <input type="hidden" name="id" value="<?php echo $id; ?>"  readonly required>

<?php } ?>