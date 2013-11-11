<h2><?php echo $title;?></h2>

<?php 
if(!$dataProvider['count'])
{
    echo 'Tidak ditemukan hasil untuk pencarian <b>'.$q.'</b>';
}
else
{
    echo 'Ditemukan '.$dataProvider['count'].' untuk pencarian <b>'.$q.'</b>';
}
?>
					<div class="cl">&nbsp;</div>
					<ul class="archive">
                            <?php
                            if(!empty($dataProvider['results']))
                            {
                                $results=$dataProvider['results'];
                                foreach($results AS $row)
                                {
                                    $news_id=$row['news_id'];
                                    $news_title=$row['news_title'];
                                    $news_datetime=$row['news_input_datetime'];
                                   // $news_content=$news_lib->cleanHTML_search($row['news_content']);
                                    $news_content_value=$news_lib->highlightWords_search($row['news_content'],$q,$ajax=false);
                                    
                                    //$img=(trim($row->news_image)!='')?$row->news_image:'/images/news/unavailable.jpg';
                                    //if($img!='')
                                   // {
                                        ?>
                                             <li>
                                                <div class="post-title"><strong><a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>"><?php echo $news_title;?></a></strong></div>
                                                <div class="post-details"><?php echo $news_content_value; ?></div>
                                                <div class="post-details">Posted on <a href="<?php echo Yii::app()->baseUrl;?>/news/detail/<?php echo $news_id.'/'.function_lib::seo_name($news_title);?>"><?php echo $news_datetime;?></a> | By Admin</div>
                                            </li>
                                        <?php        
                                    //}
                                }
                            }
                            ?>                
					    
					    
                                            
					</ul>


            <?php
            if(!empty($dataProvider['pagination']))
            {
                $this->widget('application.extensions.pagination.PaginationWidget', array(
                    'CPaginationObject' => $dataProvider['pagination'],
                    'PaginationHeader' => 'Hasil Pencarian :'
                    ));
            }
                
            ?>
            		

            <div class="cl">&nbsp;</div>
                                                                