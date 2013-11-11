<?php

        $folder=YiiBase::getPathOfAlias('webroot.').$gallery_image;

        if(file_exists($folder) AND trim($gallery_image)!='')
        {
            $thumb=Yii::app()->image->createUrl('medium',// yang dikonfigurasi pada file protected/config/main.php
                                                $folder);

        }
        else
        {
            $thumb=Yii::app()->baseUrl.'/images/news/unavailable.jpg';
        }
        ?>

            <div class="post">
            <h2 class="text-choco-bold"><?php echo $gallery_title;?></h2>
            <div id="article">
            <img class="frame single" src="<?php echo $thumb;?>" alt="<?php echo $gallery_title;?>" />									
            <p class="text-choco">
            <?php echo $gallery_description;?>
            </p>
            </div>
            </div>
