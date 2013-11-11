<h1>Berita Online</h1>
<?php if ($news_model !== null): ?>
    <div class="news">
        <?php foreach ($news_model as $row_news): ?>
            <div class="news-item">
                <h3><a href="<?php echo Yii::app()->createAbsoluteUrl('news/detail/'.$row_news->news_id.'/'.function_lib::url_title($row_news->news_title)); ?>"><?php echo $row_news->news_title; ?></a></h3>
                <div class="news-content"><?php echo $row_news->news_short_content; ?></div>
                <div class="news-more"><a href="<?php echo Yii::app()->createAbsoluteUrl('news/detail/'.$row_news->news_id.'/'.function_lib::url_title($row_news->news_title)); ?>">Selengkapnya &raquo;</a></div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
    $this->widget('application.extensions.pagination.PaginationWidget', array(
        'CPaginationObject' => $news_pagination,
        'PaginationHeader' => 'Daftar Berita :'
        ));
    ?>
<?php endif; ?>