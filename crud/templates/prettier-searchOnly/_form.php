<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="form">

<?php echo "<? \$form=\$this->beginWidget('CActiveForm', array('id'=>'".$this->class2id($this->modelClass)."-form', 'enableAjaxValidation'=>false)) ?>\n"; ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo "<?=\$form->errorSummary(\$model)?>\n"; ?>

<?php
foreach($this->tableSchema->columns as $column)
{
	if($column->autoIncrement)
		continue;
?>
	<div class="row">
		<?php echo "<?=".$this->generateActiveLabel($this->modelClass,$column)."?>\n"; ?>
		<?php echo "<?=".$this->generateActiveField($this->modelClass,$column)."?>\n"; ?>
		<?php echo "<?=\$form->error(\$model,'{$column->name}')?>\n"; ?>
	</div>

<?php
}
?>
	<div class="row buttons">
		<?php echo "<?=CHtml::submitButton(\$model->isNewRecord ? 'Create' : 'Save')?>\n"; ?>
	</div>

<?php echo "<? \$this->endWidget() ?>\n"; ?>

</div><!-- form -->