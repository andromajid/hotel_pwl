<?php

class WidgetNewsTicker extends CWidget {
    
    public function run() {
        $results=$this->activeRecord();
        $this->render('news_ticker',array(
            'results'=>$results,
        ));
    }

    private function activeRecord()
    {
        $sql='SELECT * FROM site_news
              LEFT JOIN site_news_category ON news_category_id=news_news_category_id
              WHERE
              news_category_id=3 OR news_category_title LIKE "Berita"
              GROUP BY news_id
              ORDER BY news_id DESC

              LIMIT 4';
        $queryAll=Yii::app()->db->createCommand($sql)->queryAll();
        return $queryAll;
    }
}

?>
