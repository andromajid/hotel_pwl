<?php
$this->breadcrumbs = array(
    'Content',
    'News' => array('list'),
    'List',
);

$this->menu = array();

array_push($this->menu, array('label' => 'Create News', 'url' => array('create')));

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('site-news-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>
<h4>List of News</h4>
<?php
echo CHtml::form();
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'active',
    'caption' => 'aktifkan',
    'htmlOptions' => array('class' => 'btn-primary', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'cancel',
    'caption' => 'disable',
    'htmlOptions' => array('class' => 'btn-danger', 'style' => 'margin-left:10px;margin-bottom:3px;')));
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'site-support-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array('header' => CHtml::checkBox('check_all', false, array('onclick' => 'js:if($("this").attr("checked") == "checked"){$("input:checkbox").removeAttr("checked");}else{$("input:checkbox").attr("checked","checked");} return false;')), 'type' => 'raw', 'sortable' => false,
            'value' => 'CHtml::checkBox(\'aktiv[]\', false, array(\'value\' => $data->news_id))'),
        array(
            'header' => 'No.',
            'value' => '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)."."',
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'name' => 'news_news_category_id',
            'filter' => CHtml::listData(SiteNewsCategory::model()->findAll(), 'news_category_id', 'news_category_title'),
            'value' => 'SiteNewsCategory::Model()->FindByPk($data->news_news_category_id)->news_category_title',
        ),
        array(
            'name' => 'news_title',
            'value' => '$data->news_title',
        ),
        array(
            'name' => 'news_admin_id',
            'filter' => CHtml::listData(SiteAdministrator::model()->findAll(), 'admin_id', 'admin_username'),
            'value' => 'SiteAdministrator::Model()->FindByPk($data->news_admin_id)->admin_username',
        ),
        array(
            'name' => 'news_is_active',
            'type' => 'html',
            'value' => '$data->news_is_active == 1 ? Chtml::tag(\'span\', array(\'class\' => \'badge badge-success\'), \'√\'):Chtml::tag(\'span\', array(\'class\' => \'badge badge-important\'), \'x\')',
            'filter' => CHtml::activeDropDownList($model, 'news_is_active', array('' => '', '1' => 'Active', '0' => 'InActive')),
            'htmlOptions' => array('style' => 'text-align:center;'),
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
));
echo CHtml::endForm();
$this->endWidget();
?>
<script>
    var id = 0;
    function userClicks(target_id) {
        id = $.fn.yiiGridView.getSelection(target_id);
    }
</script>