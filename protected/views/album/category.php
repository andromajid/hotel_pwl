<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">ALBUM</h1>
    </div>

</div>
<?php if (!empty($list_category)): ?>
    <?php
    $total = count($list_category);
    $x = 1;
    ?>
    <?php foreach ($list_category AS $row): ?>
        <?php
        $category_title = $row->gallery_category_title;
        $category_id = $row->gallery_category_id;
        //get first image
        $category_image = dbHelper::getOne('gallery_image', 'site_gallery', 'gallery_gallery_category_id = '.$category_id);
        $url = $this->createUrl('/album/category_detail', array('id' => $category_id));

        $folder = YiiBase::getPathOfAlias('webroot.') . $category_image;
        if (file_exists($folder) AND trim($category_image) != '') {
            $thumb = Yii::app()->image->createUrl('thumbs_gallery', // yang dikonfigurasi pada file protected/config/main.php
                    $folder);
            $thumb = Yii::app()->baseUrl.$category_image;
        } else {
            $thumb = Yii::app()->baseUrl . '/images/unavailable.jpg';
        }
        if ($x % 3 == 1)
            echo "<div class=\"row\">";
        ?>
        <div class="col-md-4 portfolio-item">
            <a href="<?php echo $url; ?>">
                <img class="img-responsive" src="<?php echo $thumb; ?>"></a>
            <h3><a href="<?php echo $url; ?>"><?php echo $category_title; ?></a></h3>
        </div>
        <?php
        if ($x % 3 == 0 || $x == $total)
            echo "</div>";
        $x++;
        ?>
    <?php endforeach; ?>
<?php endif; ?>
