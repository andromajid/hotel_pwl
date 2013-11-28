<?php
$arr_facility = json_decode($room->hotel_room_facility, true);
?>

<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header"><?php echo $room->hotel_room_name; ?></h1>
    </div>

</div>
<div class="row">

    <div class="col-lg-12">
        <?php
        echo $room->hotel_room_description;
        ?>
        <?php if (count($arr_facility) > 0): ?>
            <span><i>Facility : </i> 
                <?php echo rtrim(implode(', ', $arr_facility), ', '); ?>
            </span>
        <?php endif; ?>
    </div>
    <br />
    <?php
    $total = count($image);
    $x = 1;
    ?>
    <?php if ($total > 0): ?>
        <?php foreach ($image AS $row): ?>
            <?php
            $hotel_room_image = $row->hotel_room_image;

            $folder = YiiBase::getPathOfAlias('webroot') . DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $hotel_room_image;

            if (file_exists($folder) AND trim($hotel_room_image) != '') {
                $thumb = Yii::app()->image->createUrl('thumbs_gallery', // yang dikonfigurasi pada file protected/config/main.php
                        $folder);
                $thumb = Yii::app()->baseUrl . '/files/images/' . $hotel_room_image;
            } else {
                $thumb = Yii::app()->baseUrl . '/images/unavailable.jpg';
            }
            if ($x % 4 == 1)
                echo "<div class=\"row\">";
            ?>
            <div class="col-md-3 portfolio-item">
                <a rel="shadowbox" href="<?php echo $thumb; ?>">
                    <img class="img-responsive" src="<?php echo $thumb; ?>">
                </a>
            </div>
            <?php
            if ($x % 4 == 0 || $x == $total)
                echo "</div>";
            $x++;
            ?>
        <?php endforeach; ?>
    <?php endif; ?>
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