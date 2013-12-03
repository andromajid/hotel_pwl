<?php
$total_image = count($data);
$url = Yii::app()->baseUrl;
?>
<div id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php for ($x = 0; $x < $total_image; $x++): ?>
            <li data-target="#myCarousel" data-slide-to="<?php echo $x; ?>" class="<?php echo $x == 0 ? 'active' : ''; ?>"></li>
        <?php endfor; ?>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php if (isset($data)): ?>
            <?php $i = 1; ?>
            <?php foreach ($data as $row): ?>
                <div class="item<?php echo $i == 1?' active':'';?>">
                    <div class="fill" style="background-image:url('<?php echo $row['gallery_image']; ?>');"></div>
                    <?php if (isset($row['gallery_title']) && FALSE): ?>
                        <div class="carousel-caption">
                            <h1><?php echo $row['gallery_title']; ?></h1>
                        </div>
                    <?php endif; ?>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</div>
