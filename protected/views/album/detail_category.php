<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Album <?php echo $category_title; ?></h1>
    </div>

</div>
<?php if ($detail['count']): ?>
    <?php
    $result_detail = $detail['results'];
    $total = count($result_detail);
    $x = 1;
    ?>
    <?php foreach ($result_detail AS $row): ?>
        <?php
        $gallery_title = $row->gallery_title;
        $gallery_id = $row->gallery_id;
        $gallery_image = $row->gallery_image;
        //$imgSrc = (trim($gallery_image) != '') ? function_lib::resizeImageMoo($gallery_image, 'category_album') : '';


        $folder = YiiBase::getPathOfAlias('webroot.') . $gallery_image;
        if (file_exists($folder) AND trim($gallery_image) != '') {
//            $thumb = Yii::app()->image->createUrl('thumbs_gallery', // yang dikonfigurasi pada file protected/config/main.php
//                    $folder);
            $thumb = Yii::app()->baseUrl . $gallery_image;
        } else {
            $thumb = Yii::app()->baseUrl . '/images/unavailable.jpg';
        }
        if ($x % 4 == 1)
            echo "<div class=\"row\">";
        ?>
        <div class="col-md-3 portfolio-item">
            <a rel="shadowbox" href="<?php echo Yii::app()->baseUrl . $gallery_image; ?>">
                <img class="img-responsive" src="<?php echo $thumb; ?>"></a>
            <h3><a rel="shadowbox" href="<?php echo Yii::app()->baseUrl . $gallery_image; ?>"><?php echo $gallery_title; ?></a></h3>
        </div>
        <?php
        if ($x % 4 == 0 || $x == $total)
            echo "</div>";
        $x++;
        ?>
    <?php endforeach; ?>
<?php endif; ?>


<div class="gallery">
    <span class="darchive">
        <h1><?php echo $category_title; ?></h1>   
        <hr/>
    </span>
    <ul>
        <?php
        if ($detail['count']) {
            $result_detail = $detail['results'];
            foreach ($result_detail AS $row) {
                $gallery_title = $row->gallery_title;
                $gallery_id = $row->gallery_id;
                $gallery_image = $row->gallery_image;
                $imgSrc = (trim($gallery_image) != '') ? function_lib::resizeImageMoo($gallery_image, 'category_album') : '';
                ?>
                <li>
                    <a rel="shadowbox" href="<?php echo Yii::app()->baseUrl . $gallery_image; ?>">
                        <img class="frame image" src="<?php echo $imgSrc; ?>" alt="<?php echo $gallery_title; ?>" />
                    </a>
                    <p class="title2"><strong><?php echo $gallery_title; ?></strong></p>
                </li>
        <?php
    }
    ?>

            <?php
        }
        ?>
    </ul>

    <!--	<ul>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
            <li><a href="images/dummy-images/2.jpg" rel="shadowbox"><img src="images/dummy-images/2.jpg" /></a></li>
        </ul>-->
</div>
<?php
$baseUrl = Yii::app()->theme->baseUrl;
?>
<link rel="stylesheet" type="text/css" href="<?php echo $baseUrl . '/views/layouts/lib/'; ?>shadowbox.css">
<script type="text/javascript" src="<?php echo $baseUrl . '/views/layouts/'; ?>lib/shadowbox.js"></script>
<script type="text/javascript">
    Shadowbox.init({
        overlayOpacity: 0.8,
        modal: true
    });
</script>