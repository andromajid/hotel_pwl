<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

if($list_news['count'])
{
    $results=$list_news['results'];
    foreach($results AS $row)
    {
        $news_id=$row->news_id;
        $news_title=$row->news_title;
        $news_datetime=Yii::app()->dateFormatter->formatDateTime($row->news_input_datetime,'medium');
        
        $news_content=  strip_tags($row->news_content);
        $news_content_value= (strlen($news_content)>100)?substr($news_content, 0,100):$news_content;
        $news_image=$row->news_image;
      
        
        $folder=YiiBase::getPathOfAlias('webroot.').$news_image;
        
        if(file_exists($folder) AND trim($news_image)!='')
        {
            $thumb=Yii::app()->image->createUrl('thumbs',// yang dikonfigurasi pada file protected/config/main.php
                                                $folder);
            
        }
        else
        {
            $thumb=Yii::app()->baseUrl.'/images/news/unavailable.jpg';
        }
        
       
        ?>
        <div class="post">
                                                        <h2 class="text-choco-bold">Highlight</h2>
                                                        <div id="article">
                                                                <img class="frame left mar-right" src="<?php echo $thumb;?>" width="150" height="140" alt="template image">									
                                                            <h3><?php echo $news_title;?></h3>
        <p class="text-choco">
        <?php echo $news_content_value;?>    
        </p>
        </div>
        <a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>" class="btn-main" title="Read More">Read More</a>
        </div>
        <?php
    }
}
?>
