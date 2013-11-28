<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle = Yii::app()->name . ' - Contact Us';
$this->breadcrumbs = array(
    'Contact',
);
?>
<?php if (Yii::app()->user->hasFlash('contact')): ?>

    <div class="flash-success">
        <?php echo Yii::app()->user->getFlash('contact'); ?>
    </div>

<?php else: ?>
    <div class="col-sm-12">
        <h3>Let's Get In Touch!</h3>
        <p>Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
        <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'contact-form',
            'enableClientValidation' => true,
            'clientOptions' => array(
                'validateOnSubmit' => true,
            ),
        ));
        ?>

        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('class' => 'form-control')); ?>
            </div>
            <div class="form-group col-lg-4">
                <?php echo $form->labelEx($model, 'subject'); ?>
                <?php echo $form->textField($model, 'subject', array('class' => 'form-control')); ?>
            </div>
            <div class="clearfix"></div>
            <div class="form-group col-lg-12">
                <?php echo $form->labelEx($model, 'body'); ?>
                <?php echo $form->textArea($model, 'body', array('class' => 'form-control', 'rows' => 6, 'cols' => 50)); ?>
            </div>
            <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php $this->endWidget(); ?>
    </div>

<?php endif; ?>