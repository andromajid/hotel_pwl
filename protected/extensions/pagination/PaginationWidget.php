<?php

class PaginationWidget extends CLinkPager {

    public $CPaginationObject;
    
    public $PaginationHtmlOptions = array();
    
    public $PaginationHeader = '';
    public $PaginationFooter = '';

    public function init() {

        $this->pages = $this->CPaginationObject;
        $this->cssFile = Yii::app()->params['frontendUrl'] . '/css/style-pager.css';
        $this->maxButtonCount = 5;

        //$this->htmlOptions = array();
        $this->id = 'pager';

        if(!isset($this->PaginationHtmlOptions['id']))
            $this->PaginationHtmlOptions['id'] = $this->getId();
        if(!isset($this->htmlOptions['class']))
            $this->htmlOptions['class'] = 'yiiPager';

        $this->header = $this->PaginationHeader;
        $this->footer = $this->PaginationFooter;

        $this->firstPageLabel = Yii::t('yii','&laquo; First');
        $this->lastPageLabel = Yii::t('yii','Last &raquo;');

        $this->nextPageLabel = Yii::t('yii','Next &rsaquo;');
        $this->prevPageLabel = Yii::t('yii','&lsaquo; Previous');

        parent::init();
    }

    public function run() {
        $this->registerClientScript();
        $buttons = $this->createPageButtons();
        if (empty($buttons))
            return;
        echo '<div class="row text-center"><div class="col-lg-12">';
         
            echo CHtml::tag('ul', $this->htmlOptions, implode("", $buttons));
            echo '<span class="pagination-footer">'.$this->footer.'</span>';
        echo '</div></div>';
    }

}