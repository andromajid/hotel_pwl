<?php if ($news_model !== null): ?>
    <?php
    $newsImage = (trim($news_model->news_image) != '') ? '/files/images/' . $news_model->news_image : "-";
    $imgSrc = function_lib::resizeImageMoo($newsImage, 'news_detail');
    $videoUrl = $news_model->news_video_url;
    ?>
    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header"><?php echo ucfirst($news_model->news_title); ?></h1>
        </div>

    </div>


    <div class="row">

        <div class="col-lg-12">

            <!-- the actual blog post: title/author/date/content -->
            <hr>
            <p><i class="fa fa-clock-o"></i><?php echo Yii::app()->dateFormatter->formatDateTime($news_model->news_input_datetime, 'medium');?></p>
            <hr>
            <?php
            $news_image = (trim($news_model->news_image) != '') ? $news_model->news_image : '';
            if ($news_image != '') :
                ?>
                <img class="img-responsive" src="<?php echo $imgSrc; ?>" alt="<?php echo $news_image; ?>" />
                <hr>
            <?php endif; ?>
            <?php echo $news_model->news_content; ?> 
            <?php
            if (trim($videoUrl) != '') {
                ?>
                <iframe width="560" height="315" src="<?php echo $videoUrl; ?>" frameborder="0" allowfullscreen></iframe>
                <?php
            }
            ?>
            <hr />
        </div>

    </div>


<?php endif; ?>
