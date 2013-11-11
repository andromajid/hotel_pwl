<?php
/* @var $this DashboardController */

$this->breadcrumbs = array(
    'Dashboard',
);
?>
<div class="row-fluid">
    <div class="span15">
        <?php
         $this->beginWidget('zii.widgets.CPortlet', array(
            'title' => '<span class="icon-th-large"></span>Member Terbaru',
            'titleCssClass' => ''
        ));
        $this->endWidget();
        ?>
    </div>
</div>