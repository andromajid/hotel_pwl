<?php

class WidgetVideo extends CWidget {
    
    public function run() {

        $results=$this->activeRecord();
        $this->render('video',array(
            'results'=>$results,
        ));
    }

    protected function activeRecord()
    {
        $sql='SELECT * FROM site_news 
              LEFT JOIN site_news_category ON news_category_id=news_news_category_id
                WHERE
             news_category_id=7 OR news_category_title LIKE "video"
             GROUP BY news_id
             ORDER BY news_id DESC
             LIMIT 3';
        return Yii::app()->db->createCommand($sql)->queryAll();
    }
}

?>
