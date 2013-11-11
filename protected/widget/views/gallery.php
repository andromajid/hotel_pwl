<div id="photo">
    	<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl.'/views/layouts/';?>images/gp.png" class="right"/></a>
              <?php
                if(!empty($results))
                {
                    
                    foreach($results AS $key=>$row)
                    {
                        $link=function_lib::isValidUrl($row['gallery_url'])?$row['gallery_url']:Yii::app()->baseUrl.'/album/category_detail/'.$row['gallery_gallery_category_id'];
                        $imgSrc=(trim($row['gallery_image'])!='')?function_lib::resizeImageMoo($row['gallery_image'],'product_thumb'):'';
                        $imgTitle=$row['gallery_title'];

                        if($imgSrc!='' AND $key==0)
                        {
                                ?>
                                <a href="<?php echo $link;?>" title="<?php echo $imgTitle;?>"><img src="<?php echo $imgSrc;?>" class="right" /></a>
                            <?php
                        }
                    }
                }
              ?> 
    	
        <div class="clear"></div>
        <?php
                if(!empty($results) AND count($results)>1)
                {
                    ?>
                        <ul>
                    <?php
                    foreach($results AS $key=>$row)
                    {
                        $link=function_lib::isValidUrl($row['gallery_url'])?$row['gallery_url']:Yii::app()->baseUrl.'/album/category_detail/'.$row['gallery_gallery_category_id'];
                        $imgSrc=(trim($row['gallery_image'])!='')?function_lib::resizeImageMoo($row['gallery_image'],'promo_thumb'):'';
                        $imgTitle=$row['gallery_title'];

                        if($imgSrc!='' AND $key>=1)
                        {
                                ?>
                        <li><a href="<?php echo $link?>" title="<?php echo $imgTitle;?>"><img src="<?php echo $imgSrc;?>" /></a></li>

                            <?php
                        }
                    }
                    ?>
                        </ul>

                    <?php
                }
              ?> 
        
        <div class="clear"></div>
    </div>