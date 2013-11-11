<?php
$generate_links = '';
$slide_content = array();
if($data != false) {
    $generate_links .= '<ul id="slider">';
    $i = 0;
    foreach($data as $row) {
        $generate_links .= '<li><a href="'.Yii::app()->createAbsoluteUrl($row['slider_links']).'"><img src="'.Yii::app()->params['frontendUrl'].'/images/'.$row['slider_image'].'" alt="'.$row['slider_title'].'" /></a></li>';
        $slide_content[$i] = '<a href="#" class="pager-item"><h3>'.$row['slider_title'].'</h3><img src="'.Yii::app()->params['frontendUrl'].'/images/'.$row['slider_thumbnail'].'"/><span>'.$row['slider_description'].'</span></a>';
        $i++;
    }
    $generate_links .= '</ul>';
}
?>
<div class="top">
    <div class="inner-featured">
        <?php echo $generate_links; ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#slider').bxSlider({
                    auto: true,
                    pager: true,
                    speed:800,
                    pause:8000,
                    controls:false,
                    mode:'fade',
                    buildPager: function(slideIndex){
                        switch (slideIndex){
                            case 0:
                                return <?php echo $slide_content[0]; ?>;
                            case 1:
                                return <?php echo $slide_content[1]; ?>;
                            case 2:
                                return <?php echo $slide_content[2]; ?>;
                            case 3:
                                return <?php echo $slide_content[3]; ?>;
                            case 4:
                                return <?php echo $slide_content[4]; ?>;
                        }
                    }
                });
            });
        </script>
    </div>
</div>