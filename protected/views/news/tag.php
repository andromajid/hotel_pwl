<h1>Berita Online &raquo; Tag "<?php echo $news_tag_value; ?>"</h1>
<?php if ($news_tag_model !== null): ?>
    <div class="news">
        <?php foreach ($news_tag_model as $row_news_tag): ?>
            <div class="news-item">
                <h3><a href="<?php echo Yii::app()->createAbsoluteUrl('news/detail/'.$row_news_tag->rel_news_tag_to_news->news_id.'/'.function_lib::url_title($row_news_tag->rel_news_tag_to_news->news_title)); ?>"><?php echo $row_news_tag->rel_news_tag_to_news->news_title; ?></a></h3>
                <div class="news-content"><?php echo $row_news_tag->rel_news_tag_to_news->news_short_content; ?></div>
                <div class="news-more"><a href="<?php echo Yii::app()->createAbsoluteUrl('news/detail/'.$row_news_tag->rel_news_tag_to_news->news_id.'/'.function_lib::url_title($row_news_tag->rel_news_tag_to_news->news_title)); ?>">Selengkapnya &raquo;</a></div>
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