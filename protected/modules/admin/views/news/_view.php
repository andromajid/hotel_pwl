<li>
  <a href="#" class="handle">&nbsp;</a>
  <h3 class="bar"><strong><?php echo strtoupper(CHtml::encode($data->news_title)); ?></strong></h3>
  <div class="content">
    <table class="items">
      <tbody>
        <tr class="even">
          <th width="100"><?php echo CHtml::encode($data->getAttributeLabel('news_category_id')); ?></th>
          <td><?php echo CHtml::encode(site_news_category::Model()->FindByPk($data->news_category_id)->news_category_title); ?></td>
        </tr>
        <tr class="odd">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_title')); ?></th>
          <td><?php echo CHtml::encode($data->news_title); ?></td>
        </tr>
        <tr class="even">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_subtitle')); ?></th>
          <td><?php echo CHtml::encode($data->news_subtitle); ?></td>
        </tr>
        <tr class="odd">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_source')); ?></th>
          <td><?php echo CHtml::encode($data->news_source); ?></td>
        </tr>
        <tr class="even">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_short_content')); ?></th>
          <td><?php echo CHtml::encode($data->news_short_content); ?></td>
        </tr>
        <tr class="odd">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_admin_id')); ?></th>
          <td><?php echo CHtml::encode(site_administrator::Model()->FindByPk($data->news_admin_id)->administrator_username); ?></td>
        </tr>
        <tr class="even">
          <th><?php echo CHtml::encode($data->getAttributeLabel('news_is_active')); ?></th>
          <td><?php echo CHtml::encode(($data->news_is_active == 1 ? 'Yes' : 'No')); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</li>