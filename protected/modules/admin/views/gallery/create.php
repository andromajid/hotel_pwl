<?php
$this->breadcrumbs = array(
    'Gallery'=>array('list'),
    'Create',
);

$this->menu = array(
    array('label' => 'List of Gallery', 'url' => array('list')),
);
?>
<div class="flat_area grid_16">
    <h2>Create Gallery</h2>
</div>
<div class="box grid_16 round_all">
    <h2 class="box_head grad_colour">&nbsp;</h2>
    <a href="#" class="grabber">&nbsp;</a>
    <a href="#" class="toggle">&nbsp;</a>
    <div class="toggle_container">
        <?php echo $this->renderPartial('_form', array('model' => $model,'count_category'=>$count_category)); ?>
    </div>
</div>