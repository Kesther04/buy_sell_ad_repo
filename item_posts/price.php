<?php
    $sel_won = $sel_ob->sel_item_tb($pana,$sid);
    if ($sel_won) {
        $wow = $sel_won->fetch_assoc();
?>
    <h3>PRICE</h3>
    <p><?php echo 'N'.number_format($wow['price'],3); ?></p>

<?php } ?>