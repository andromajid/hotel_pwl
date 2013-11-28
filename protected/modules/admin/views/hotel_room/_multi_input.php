<?php
Yii::app()->getClientScript()->registerScript('facility', '
clone_element = jQuery(".block_grab").html();
jQuery("#add_facility").bind("click", function() {
    jQuery("#tempat").append(clone_element);
    console.log(clone_element);
});    
', CClientScript::POS_READY);
if (isset($model)) {
    $data_arr = json_decode($model->hotel_room_facility, true);
}
?>
<span id="add_facility" class="btn-primary btn">add facility</span>
<div id="tempat">
    <div class="block block_grab">
        <?php
        echo CHtml::label('facility', 'facility');
        echo CHtml::textField('add_facility[]', '', array('class' => 'span6', 'id' => 'facility'));
        ?>
    </div>
    <?php if (isset($model)): ?>
        <?php foreach ($data_arr as $row): ?>
            <div class="block block_grab">
                <?php
                echo CHtml::label('facility', 'facility');
                echo CHtml::textField('add_facility[]', $row, array('class' => 'span6', 'id' => 'facility'));
                ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
