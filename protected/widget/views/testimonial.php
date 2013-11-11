<div id="testimonial">
    <a href="<?php echo Yii::app()->baseUrl.'/testimonial'?>"><img src="<?php echo  Yii::app()->theme->baseUrl.'/views/layouts/';?>images/more.png" class="right"  /></a>
        <div class="clear"></div>
        <?php
        if(!empty($results))
        {
            ?>
            <ul>
            <?php
            foreach($results AS $row)
            {
                $name=$row['testimonial_name'];
                $filterContent=  strip_tags($row['testimonial_content']);
                $link='#';
                $content=(strlen($filterContent)>100)?substr($filterContent, 0,100).'...<br /><a href="'.$link.'"> Read More</a>':$filterContent;
                ?>
                <li>
                    <img src="<?php echo  Yii::app()->theme->baseUrl.'/views/layouts/';?>images/user.png"  />
                    <h1><a href="#"><?php echo $name;?></a></h1>
                    <p><?php echo $content;?></p>
                </li>
                <?php
            }
            ?>
                        </ul>

            <?php    
        }
        ?>
                
    </div>