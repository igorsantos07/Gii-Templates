<?php
/**
 * The following variables are available in this template:
 * - $this: the CrudCode object
 */
?>
<?php
echo "<?php\n";
$label=$this->pluralize($this->class2name($this->modelClass));
echo "\$this->breadcrumbs=array(
	'$label'=>array('index'),
	'Search',
);\n";
?>

$this->menu=array(
	array('label'=>'Create <?php echo $this->modelClass; ?>', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('<?php echo $this->class2id($this->modelClass); ?>-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Search <?php echo $this->pluralize($this->class2name($this->modelClass)); ?></h1>

<div class="search-form">
<?php echo "<? \$this->renderPartial('_search',array('model'=>\$model)) ?>\n"; ?>
</div><!-- search-form -->

<?php echo "<?"; ?> $this->widget('zii.widgets.grid.CGridView', array(
	'htmlOptions'		=> array('style' => $model->isEmpty()? 'display:none' : ''),
	'beforeAjaxUpdate'	=> 'function(id) { $("#"+id).show() }', //for some reason, after loaded, the grid vanishes again
	'afterAjaxUpdate'	=> 'function(id) { $("#"+id).show() }',
	'id'				=> '<?php echo $this->class2id($this->modelClass); ?>-grid',
	'filter'			=> null,
	'dataProvider'		=> $model->search(),
	'nullDisplay'		=> '---',
	'blankDisplay'		=> '---',
	'columns' => array(
<?php
$count=0;
foreach($this->tableSchema->columns as $column)
{
	if(++$count==7)
		echo "\t\t/*\n";
	echo "\t\t'".$column->name."',\n";
}
if($count>=7)
	echo "\t\t*/\n";
?>
		array('class'=>'CButtonColumn'),
	),
)); ?>
