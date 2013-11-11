<span class="darchive">
      <h1>Testimonial</h1>
      <hr />
      
        <?php
            if($results!=null)
            {
                foreach($results AS $key=>$row)
                {
                    
                    $name=$row->testimonial_name;
                    $content=$row->testimonial_content;
                    $date=$row->testimonial_date;
                   
                    
                        
                       ?>
                      <div class="img_darchive">  <img src="<?php echo  Yii::app()->theme->baseUrl.'/views/layouts/';?>images/user.png" width="253" height="160"  /></div>
                   <?php
                    
                    ?>
                    
                    <h2><?php echo $name;?></h2>
                    <p><?php echo Yii::app()->dateFormatter->formatDateTime($date,'medium','');?> </p>
                    <p><?php echo $content;?> </p>
                    <hr />
                    
                    <?php
                }
            }
        ?>
        
        <div class="page_num">
                <?php
            if(!empty($pagination))
            {
                $this->widget('application.extensions.pagination.PaginationWidget', array(
                    'CPaginationObject' => $pagination,
                    'PaginationHeader' => 'Daftar Testimonial :'
                    ));
            }
                
            ?>		
        </div>
        
    </span>