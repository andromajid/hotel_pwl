<div id="news-ticker">
        <?php
          if(!empty($results))
          {
              ?>
                <ul id="js-news" class="js-hidden">
              <?php
              foreach($results AS $row)
              {
                  $newsId=$row['news_id'];
                  $newsCategoryId=$row['news_category_id'];
                          $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);

                  $newsTitle=$row['news_title'];
                  $newsContent=  strip_tags($row['news_content']);
                  $newsContentFilter=(strlen($newsContent)<64)?$newsContent:substr($newsContent, 0,64).'...<a href="'.$link.'">Read more</a>';
                  $newsImage=  strip_tags($row['news_image']);
                  $link=Yii::app()->baseUrl.'/news/detail/'.$newsId.'/'.function_lib::seo_name($newsTitle);
                  ?>
                        <li class="news-item">
                            <a href="<?php echo $link;?>"><?php echo $newsTitle;?></a>
                            

                        </li>
                  <?php
              }
              ?>
                    </ul>
                <?php
          }
          ?>
    

</div>