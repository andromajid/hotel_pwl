<!-- Case -->
<div class="case">
<h3><?php echo $label_title;?></h3>
<?php
                    if($results!=NULL)
                    {
                        
                        $condition=($criteria=='general')?'':' AND news_is_criteria="priority"';
                        $condition_link=($criteria=='general')?'general':'priority';
                    ?>            
                          <ul class="archive">
                    <?php
                        foreach($results AS $key=>$row)
                        {
                            $news_category_id=$row->news_category_id;
                            $news_category_title=$row->news_category_title;
                            
                            $count_news=$nl->count_news_on_category($news_category_id,$condition);
                            ?>
                      <li>
                          <div class="post-title"><strong><a href="<?php echo Yii::app()->baseUrl;?>/news/news_category_detail/id/<?php echo $news_category_id.'/criteria/'.$condition_link.'/'.function_lib::seo_name($news_category_title);?>"><?php echo $news_category_title	;?></a></strong> (<?php echo $count_news;?>)</div>
                       </li>
                            <?php  
                        }
                        ?>
                        	        					    						
                        </ul>	   
                        <?php
                    }
                    ?>  						
</div>
<!-- End Case -->

                                              