<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<div class="wide form">

	<p class="note">You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.</p>

<?php echo "<? \$form=\$this->beginWidget('CActiveForm', array('action'=>Yii::app()->createUrl(\$this->route), 'method'=>'get')) ?>\n"; ?>

<?php foreach($this->tableSchema->columns as $column): ?>
<?php
	$field=$this->generateInputField($this->modelClass,$column);
	if(strpos($field,'password')!==false)
		continue;
?>
	<div class="row">
		<?php echo "<?=\$form->label(\$model,'{$column->name}')?>\n"; ?>
		<?php echo "<?=".$this->generateActiveField($this->modelClass,$column)."?>\n"; ?>
	</div>

<?php endforeach; ?>
	<div class="row buttons">
		<?php echo "<?=CHtml::submitButton('Search')?>\n"; ?>
	</div>

<?php echo "<? \$this->endWidget() ?>\n"; ?>

</div><!-- search-form -->