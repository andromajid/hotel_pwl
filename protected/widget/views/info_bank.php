 <a href="#"><img src="<?php echo Yii::app()->theme->baseUrl.'/views/layouts/';?>images/rk.png" style="margin-left:20px; "  /></a>
    <div class="clear"></div>
    <div class="rek">
    <?php
        if(!empty($row))
        {
            echo $row['page_content'];
        }
        
        ?>
    <div class="clear"></div>
    </div>