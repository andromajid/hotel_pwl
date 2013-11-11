<span class="darchive">
      <h1><?php echo $category_title;?></h1>
      <hr />
      
        <?php
            if($news_cd!=NULL)
            {
                foreach($news_cd['results'] AS $key=>$row)
                {
                    $news_id=$row->news_id;
                    //$news_datetime=Yii::app()->dateFormatter->formatDateTime($row->news_input_datetime,'medium');
                    $news_title=$row->news_title;
                    $filter_news_content=  strip_tags($row->news_content);
                    $news_content=(strlen($filter_news_content)>263)?substr($filter_news_content, 0,263):$filter_news_content;
                      $newsImage=(trim($row->news_image)!='')?  '/files/images/'.$row->news_image:"-";
                      $imgSrc=function_lib::resizeImageMoo($newsImage,'news_category_detail');
                    $videoUrl=$row['news_video_url'];
                    $videoId=function_lib::getYoutubeVideoId($videoUrl);  
                    if($videoId!='')
                    {
                        ?>
                        <div class="img_darchive"><a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>"><img src="http://i3.ytimg.com/vi/<?php echo $videoId;?>/mqdefault.jpg" width="253" height="160" border="0" /></a></div>

                        <?php
                    }
                    else
                    {
                       ?>
                      <div class="img_darchive"><a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>"><img src="<?php echo $imgSrc;?>" width="253" height="160" border="0" /></a></div>

                       <?php
                    }
                    ?>
                    
                    <h2><a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>"><?php echo $news_title;?></a></h2>
                    <p><?php echo $news_content;?> <br /><a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>">learn more</a></p>
                    <hr />
                    
                    <?php
                }
            }
        ?>
        
        <div class="page_num">
                <?php
            if(!empty($news_cd['pagination']))
            {
                $this->widget('application.extensions.pagination.PaginationWidget', array(
                    'CPaginationObject' => $news_cd['pagination'],
                    'PaginationHeader' => 'Daftar Berita :'
                    ));
            }
                
            ?>		
        </div>
        
    </span>