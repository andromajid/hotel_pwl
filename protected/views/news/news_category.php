<h2>Galeri Produk</h2>
			 <p>Dalam galeri produk ini yang kami tampilkan adalah contoh produk. Kami menyediakan spesifikasi tertentu dalam berbagai ukuran.</p>
       <div class="items no-bg">
					<div class="cl">&nbsp;</div>
					<ul>
                            <?php
                            if(!empty($dataProvider))
                            {
                                foreach($dataProvider AS $row)
                                {
                                    $title=$row->news_category_title;
                                    $img=(trim($row->news_category_image)!='')?$row->news_category_image:'/images/news/unavailable.jpg';
                                    //if($img!='')
                                   // {
                                        ?>
                                            <li>
					    	<div class="image stackthree">
					    		<a href="<?php echo Yii::app()->baseUrl;?>/news/news_category_detail/<?php echo $row->news_category_id.'/'.function_lib::seo_name($title);?>"><img class="image" src="<?php echo Yii::app()->baseUrl.$img;?>" width="200px;" height="200px;" alt="" /></a>
					    	</div>
					    	<p class="title"><strong><?php echo $title;?></strong></p>
					    </li>
                                        <?php        
                                    //}
                                }
                            }
                            ?>                
					    
					    
                                            
					</ul>
			</div>
