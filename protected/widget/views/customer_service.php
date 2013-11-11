<center><img src="<?php echo Yii::app()->theme->baseUrl.'/views/layouts/';?>images/cs.png"  /></center>
<?php
if(!empty($results))
{
    ?>

    <ul class="ym">
    <?php
    foreach($results AS $row)
    {
        $name=$row['support_name'];
        $nick=$row['support_nick'];
        $phone=$row['support_phone'];
        ?>
        
        <li>
              <a title="<?php echo $name;?>" class="" href="ymsgr:sendIM?<?php echo $nick; ?>"><img class="pad_right1" src="http://opi.yahoo.com/online?u=<?php echo $nick; ?>&amp;m=g&amp;t=14"  border="0" /></a> 
              <p style="font-size:12px;"><?php echo $name.' ('.$phone.')';?></p>
        </li>
        
        

        <?php
    }
    ?>
    </ul>
    <?php
}
?>
    