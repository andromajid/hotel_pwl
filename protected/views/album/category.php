        			<h2>Gallery</h2>
        			 <div class="items no-bg">
        					<div class="cl">&nbsp;</div>
                                 <?php
                                 if(!empty($list_category))
                                 {
                                     ?>
                                                
        					<ul>
                                    <?php
                                     foreach($list_category AS $row)
                                     {
                                         $category_title=$row->gallery_category_title;
                                         $category_id=$row->gallery_category_id;
                                         $category_image=$row->gallery_category_image;
                                         
                                        $folder=YiiBase::getPathOfAlias('webroot.').$category_image;

                                        if(file_exists($folder) AND trim($category_image)!='')
                                        {
                                            $thumb=Yii::app()->image->createUrl('thumbs_gallery',// yang dikonfigurasi pada file protected/config/main.php
                                                                                $folder);

                                        }
                                        else
                                        {
                                            $thumb=Yii::app()->baseUrl.'/images/news/unavailable.jpg';
                                        }
                                         
                                         ?>
                                                <li>
        					    	<div class="image stacktwo">
                                                            <a href="<?php echo Yii::app()->baseUrl.'/gallery/category_detail/'.$category_id.'/'.function_lib::seo_name($category_title);?>">
                                                            <img class="image" src="<?php echo $thumb;?>" alt="<?php echo $category_title;?>" />
                                                        </a>
                                                                                        </div>
                                                                                        <p class="title"><strong><?php echo $category_title;?></strong></p>
                                                </li>
                                         <?php       
                                     }
                                     ?>
                                                
        					</ul>
                                    <?php
                                 }
                                 ?>               
        					    
                                                
        				</div>	
								
                

								<div class="cl">&nbsp;</div>
                                                                