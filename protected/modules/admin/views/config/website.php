<?php
/* @var $this ConfigController */

$this->breadcrumbs=array(
	'Config'=>array('/admin/config'),
	'Website',
);
$this->beginWidget('zii.widgets.CPortlet', array('title' => 'Generate Serial Aktivasi', 'hideOnEmpty' => TRUE));
?>
<h4>Konfigurasi Website</h4>
<?php
echo CHtml::form();
echo CHtml::label('Website Title', 'website_title');
echo CHtml::textField('website_title', dbHelper::getConfig('website_title'), array('class' => 'span6'));
echo CHtml::label('Website Meta Keyword', 'website_keyword');
echo CHtml::textArea('website_keyword', dbHelper::getConfig('website_keyword'), array('rows' => 6, 'class' => 'span6'));
echo CHtml::label('Website Meta Description', 'website_description');
echo CHtml::textArea('website_description', dbHelper::getConfig('website_description'),  array('rows' => 6, 'class' => 'span6'));
echo CHtml::label('Biaya Pendaftaran', 'mlm_price');
echo CHtml::textField('mlm_price', dbHelper::getConfig('mlm_price'),  array('rows' => 6, 'class' => 'span6'));
echo CHtml::label('Email Perusahaan', 'mlm_email');
echo CHtml::textField('mlm_email', dbHelper::getConfig('mlm_email'),  array('rows' => 6, 'class' => 'span6'));
echo '<div>';
$this->widget('zii.widgets.jui.CJuiButton', array(
    'name' => 'update',
    'caption' => 'Update',
    'htmlOptions' => array('class' => 'btn-primary')));
echo '</div>';
echo CHtml::endForm();
$this->endWidget();
?>