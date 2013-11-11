<?php
$newsCategoryId=!empty($results)?$results[0]['news_category_id']:'';
$link=(trim($newsCategoryId)!='')?Yii::app()->baseUrl.'/'.'news/news_category_detail/'.$newsCategoryId:'#';
?>   
 <?php
    if(!empty($results))
    {
        ?>

        <div class="pr">
        <a href="<?php echo $link;?>"><img src="<?php echo  Yii::app()->theme->baseUrl.'/views/layouts/';?>images/reward.png"  /></a>

        <?php
              foreach($results AS $row)
              {
                  $newsId=$row['news_id'];
                  $newsCategoryId=$row['news_category_id'];
                  $newsTitle=$row['news_title'];
                  $newsContent=  strip_tags($row['news_content']);
                  $newsContentFilter=(strlen($newsContent)<64)?$newsContent:substr($newsContent, 0,64).'...<a href="'.$link.'">Read more</a>';
                  $newsImage=(trim($row['news_image'])!='')?  '/files/images/'.$row['news_image']:"-";
                  $imgSrc=function_lib::resizeImageMoo($newsImage);
                  $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);
                ?>
                <a href="<?php echo $link;?>"><img src="<?php echo $imgSrc;?>"  /></a>
                <h1><a href="<?php echo $link;?>"><?php echo $newsTitle;?></a></h1>
               <p><?php echo $newsContentFilter;?></p>
                       
                  <?php
              }
              
              ?>
                   
        </div>
       <?php
    }
    ?>
    	
        
        