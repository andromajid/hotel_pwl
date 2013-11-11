<?php

class WidgetPromo extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('promo',array(
            'results'=>$results,
        ));
    }

     private function activeRecord()
    {
        $sql='SELECT * FROM site_news
              LEFT JOIN site_news_category ON news_category_id=news_news_category_id
              WHERE
              news_category_id=6 OR news_category_title LIKE "Promo"
              GROUP BY news_id
              ORDER BY news_id DESC
              LIMIT 3';
        $queryAll=Yii::app()->db->createCommand($sql)->queryAll();
        return $queryAll;
    }
}

?>
