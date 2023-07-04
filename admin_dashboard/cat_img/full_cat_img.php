<?php
    require("../../class/sel_class.php");
    $sel_ob = new SEL();
?>

<?php if (isset($_GET['items']) AND isset($_GET['bitem'])) { ?>

<?php 
    $sel_con = $sel_ob->cat_tb_all($_GET['bitem'],$_GET['items']);
    if ($sel_con) {
        
        $row = $sel_con->fetch_assoc();

?>

<tr>
    
    <td>
        <span>Update Image for <?php echo str_replace('-',' ',$_GET['bitem']); ?></span>
        <input type="file" name="imgic"   accept="image/jpeg, image/jpg, image/png, image/jfif" onchange=getImagePreviewFilex(event)>
        <input type="hidden" name="ano_imgic" value="<?php echo $row['ic_img']; ?>" required readonly>
    </td>
    <?php 
        if ($row['ic_img'] == '0') {
            echo "<td id='preview-filex'></td>";
        }else { 
    ?>
        <td id="preview-filex"><img src="../../pack_image/<?php echo $row['ic_img']; ?>" width="250"></td>
    <?php } ?>
    
</tr>

<tr>
     
    <td>
        <span>Update Image for <?php echo str_replace('-',' ',$_GET['items']); ?></span>
        <input type="file" name="imggic"   accept="image/jpeg, image/jpg, image/png, image/jfif" onchange=getImagePreviewFiles(event)>
        <input type="hidden" name="ano_imggic" value="<?php echo $row['gic_img']; ?>" required readonly>
    </td>
    <?php 
        if ($row['gic_img'] == '0') {
            echo "<td id='preview-files'></td>";
        }else { 
    ?>
        <td id="preview-files"><img src="../../pack_image/<?php echo $row['gic_img']; ?>" width="250"></td>
    <?php } ?>
</tr>

<?php } ?>



<script>
    function getImagePreviewFiles(event){
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview-files');
        var newimg = document.createElement('img');
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="250";
        imagediv.appendChild(newimg);
        imagediv.style="border-radius:100%";
    }

    function getImagePreviewFilex(event){
        var image = URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview-filex');
        var newimg = document.createElement('img');
        imagediv.innerHTML='';
        newimg.src=image;
        newimg.width="250";
        imagediv.appendChild(newimg);
        imagediv.style="border-radius:100%";
    }
</script>

<?php } ?>

