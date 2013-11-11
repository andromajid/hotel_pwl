<?php

class WidgetArticleSingle extends CWidget {
    
    public function run() {

        $nl=new NewsLib;
        $list_news=$nl->list_news(1);
        $this->render('article_single', array('list_news' => $list_news));
    }

}

?>
