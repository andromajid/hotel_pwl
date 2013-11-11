<?php
$this->breadcrumbs=array(
	'Site Galleries',
);

$this->menu=array(
	array('label'=>'Create SiteGallery', 'url'=>array('create')),
	array('label'=>'Manage SiteGallery', 'url'=>array('admin')),
);
?>

<h1>Site Galleries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
