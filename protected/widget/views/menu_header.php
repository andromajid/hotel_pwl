<div class="menu">
    <?php
    if(!empty($results))
    {
        ?>
        <ul>        
        <li><a href="<?php echo Yii::app()->baseUrl;?>/">Home</a></li>

        <?php
        foreach($results AS $row)
        {
            $menuId=$row['menu_id'];
            $menuTitle=$row['menu_title'];
            $menuLink=$row['menu_link'];
            ?>
            <li><a href="<?php echo Yii::app()->baseUrl.'/'.$menuLink;?>"><?php echo $menuTitle;?></a></li>
            <?php    
        }
        ?>
                </ul>

        <?php
    }
    ?>
    </div>