<?php
$this->breadcrumbs=array(
	'Site Gallery Categories',
);

$this->menu=array(
	array('label'=>'Create SiteGalleryCategory', 'url'=>array('create')),
	array('label'=>'Manage SiteGalleryCategory', 'url'=>array('admin')),
);
?>

<h1>Site Gallery Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
