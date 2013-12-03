<?php if (isset($data)): ?>
    <ul class="dropdown-menu">
        <?php foreach ($data as $row):?>
        <li><a href="<?php echo Yii::app()->getController()->createUrl('/room/show', array('id' => $row['hotel_room_id']));?>"><?php echo $row['hotel_room_name'];?></a></li>
        <?php endforeach;?>
    </ul>
<?php endif; ?>

