<?php
/* @var $this ExecutiveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Executives',
);

$this->menu=array(
	array('label'=>'Create Executive', 'url'=>array('create')),
	array('label'=>'Manage Executive', 'url'=>array('admin')),
);
?>

<h1>Executives</h1>
<style type="text/css" media="screen">
/*<![CDATA[*/

#orderList {list-style-type: none; margin: 0; padding: 0; width: 60%;}
#orderList li {margin: 2px; padding: 4px; border: 1px solid #e3e3e3; background: #f7f7f7}

/*]]>*/
</style>
<?php
    // Organize the dataProvider data into a Zii-friendly array
    $items = CHtml::listData($dataProvider->getData(), 'exec_id', 'name_th');
    // Implement the JUI Sortable plugin
    $this->widget('zii.widgets.jui.CJuiSortable', array(
        'id' => 'orderList',
        'items' => $items,
    ));
    // Add a Submit button to send data to the controller
    echo CHtml::ajaxButton('Submit Changes', '', array(
        'type' => 'POST',
        'data' => array(
            // Turn the Javascript array into a PHP-friendly string
            'Order' => 'js:$("ul#orderList").sortable("toArray").toString()',
        )
    ));
?>
