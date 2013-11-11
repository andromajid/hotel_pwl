<?php
$newsCategoryId=!empty($results)?$results[0]['news_category_id']:'';
$link=(trim($newsCategoryId)!='')?Yii::app()->baseUrl.'/'.'news/news_category_detail/'.$newsCategoryId:'#';
?>
<div id="vid">
    <a href="<?php echo $link;?>"><img src="<?php echo  Yii::app()->theme->baseUrl.'/views/layouts/';?>images/gv.png"  /></a>
        <?php
        if(!empty($results))
        {
          
            ?>
                <ul>
            <?php
            
            foreach($results AS $row)
            {
                $newsId=$row['news_id'];
                $newsCategoryId=$row['news_category_id'];
                $newsTitle=$row['news_title'];
                $newsContent=  strip_tags($row['news_content']);
                $newsContentFilter=(strlen($newsContent)<100)?$newsContent:substr($newsContent, 0,100).'...<a href="'.$link.'">Read more</a>';
                $videoUrl=$row['news_video_url'];
                $videoId=function_lib::getYoutubeVideoId($videoUrl);
                $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);
               // $newsImage=(trim($row['news_image'])!='')?  '/files/images/'.$row['news_image']:"-";
               // $imgSrc=function_lib::resizeImageMoo($newsImage,'article_thumb');
                ?>
                    <li>
                        <?php
                        if(trim($videoId)!='')
                        {
                            ?>
                        <a href="<?php echo $link;?>"> <img src="http://i3.ytimg.com/vi/<?php echo $videoId;?>/mqdefault.jpg" width="150" height="86"></a>

                            <?php
                        }
                        ?>
                <h1><a href="<?php echo $link;?>"><?php echo $newsTitle;?></a></h1>
                <p><?php echo $newsContentFilter;?></p>
                      
                </li>
                <?php
            }
            ?>
                </ul>

            <?php            
        }
        ?>
        
        <div class="clear"></div>
    </div>