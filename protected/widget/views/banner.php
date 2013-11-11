  <?php
      if(!empty($results))
      {
          foreach($results AS $row)
          {
              $link=function_lib::isValidUrl($row['gallery_url'])?$row['gallery_url']:'#';
              $imgSrc=(trim($row['gallery_image'])!='')?function_lib::resizeImageMoo($row['gallery_image'],'side_banner'):'';
              $imgTitle=$row['gallery_title'];
              
              if($imgSrc!='')
              {
                    ?>
                    <a href="<?php echo $link;?>" title="<?php echo $imgTitle;?>"><img src="<?php echo $imgSrc;?>" /></a>
                <?php
              }
          }
      }
      ?>  
                    