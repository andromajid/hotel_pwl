<?php if ($news_model !== null): ?>
    <?php
    
          $newsImage=(trim($news_model->news_image)!='')?  '/files/images/'.$news_model->news_image:"-";
          $imgSrc=function_lib::resizeImageMoo($newsImage,'news_detail');
          $videoUrl=$news_model->news_video_url;
    ?>

    
<div class="single_left">
									<h2><?php echo ucfirst($news_model->news_title); ?></h2>
					<div class="row last-row">
								<div class="post">
									<div id="article" style="text-align: justify;">				
                                                                            <?php
                                                    $news_image=(trim($news_model->news_image)!='')?$news_model->news_image:'';
           
                                                    if($news_image!='')
                                                    {
                                                        ?>
                                                                <img class="frame single" src="<?php echo $imgSrc;?>" alt="<?php echo $news_image;?>" />	

                                                        <?php
                                                    }
                                                    ?>
																		
									   <p class="text-choco">
                                                                            <?php 
                                                                               echo $news_model->news_content; ?>    
                                                                           </p>
                                                                           
                      <div class="tags">
                          <?php
                          if(trim($videoUrl)!='')
                          {
                              ?>
                          <iframe width="560" height="315" src="<?php echo $videoUrl;?>" frameborder="0" allowfullscreen></iframe>
                              <?php
                          }
                          ?>
                      </div>
                      <div class="tags">
                          <p><strong>Sumber : </strong><?php echo trim($news_model->news_source)==''?'-':$news_model->news_source; ?></p>
                          <p><strong>Dikirim pada : </strong><?php echo Yii::app()->dateFormatter->formatDateTime($news_model->news_input_datetime, 'medium'); ?>, oleh <b>Admin</b></p>
                      </div>
                                                                           
                                               


    <?php
    if ($other_news_model != null):
    ?>
    
                                          
    <p><strong>Artikel Terkait : </strong></p>
        <ul>
            <?php
            foreach ($other_news_model as $row_other_news):
            ?>
            <li><a href="<?php echo Yii::app()->createAbsoluteUrl('news/detail/'.$row_other_news->rel_news_tag_to_news->news_id.'/'.function_lib::url_title($row_other_news->rel_news_tag_to_news->news_title)); ?>"><?php echo $row_other_news->rel_news_tag_to_news->news_title; ?></a></li>
            <?php endforeach; ?>
        </ul>
       
									   

    <?php endif; ?>
          </div>
								</div>						
						</div>                                                              
                   
</div>
	

<?php endif; ?>
