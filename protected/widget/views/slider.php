<div id="slider">
    <div id="featured"> 
      <?php
      if(!empty($results))
      {
          foreach($results AS $row)
          {
              $link=function_lib::isValidUrl($row['gallery_url'])?$row['gallery_url']:'#';
              $imgSrc=(trim($row['gallery_image'])!='')?function_lib::resizeImageMoo($row['gallery_image'],'slider'):'';
              $imgTitle=$row['gallery_title'];
              
              if($imgSrc!='')
              {
                    ?>
                    <a href="<?php echo $link;?>"><img src="<?php echo $imgSrc;?>" data-caption="<?php echo $imgTitle;?>" /></a>
                <?php
              }
          }
      }
      ?>  
  </div>
</div>