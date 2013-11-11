
<?php
if(!empty($results))
{
    ?>

<div class="pr">
        <div class="ot">
        <ul>
    <?php
    foreach($results AS $row)
    {
        $newsId=$row['news_id'];
        $newsCategoryId=$row['news_category_id'];
        $newsTitle=$row['news_title'];
        $newsContent=  strip_tags($row['news_content']);
        $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);
        $newsContentFilter=(strlen($newsContent)<64)?$newsContent:substr($newsContent, 0,64).'...<a href="'.$link.'">Read more</a>';
        $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);
        $newsImage=(trim($row['news_image'])!='')?  '/files/images/'.$row['news_image']:"-";
        $imgSrc=function_lib::resizeImageMoo($newsImage,'promo_thumb');
        
        ?>
            <li>
            	<center>
           	      <img src="<?php echo  $imgSrc;?>" />
                  <p><a href="<?php echo $link;?>"><?php echo $newsTitle;?></a></p>
           	  </center>
          </li>
        <?php
    }
    ?>
            
        </ul>
        </div>
    </div>
    <?php
}
?>