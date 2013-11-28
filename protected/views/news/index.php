<h1>Berita Online</h1>
<?php if ($news_model !== null): ?>
    <?php foreach ($news_model as $row_news): ?>
<?php
$url = $this->createUrl('news/detail', array('id' => $row_news->news_id, 'title' => function_lib::url_title($row_news->news_title)));
?>
        <div class="row">
            <div class="col-md-12">
                <h3><a href="<?php echo $url ?>"><?php echo $row_news->news_title; ?></a></h3>

                <p><?php echo date('Y-M-d', strtotime($row_news->news_input_datetime)); ?></p>
                <p><?php echo substr(strip_tags($row_news->news_content), 0, 200)?>....</p>
                <a class="btn btn-primary" href="<?php echo $url; ?>">Read More <i class="fa fa-angle-right"></i></a>
            </div>

        </div>
    <?php endforeach; ?>

    <?php
    $this->widget('CLinkPager', array(
        'currentPage' => $news_pagination->getCurrentPage(),
        'itemCount' => $count,
        'pageSize' => 2,
        'maxButtonCount' => 5,
        //'nextPageLabel'=>'My text >',
        'header' => '<div class="row text-center"><div class="col-lg-12">',
        'footer' => '</div></div>',
        'htmlOptions' => array('class' => 'pagination'),
    ));
    ?>
<?php endif; ?>