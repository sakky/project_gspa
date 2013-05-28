<?php
/* @var $this ExecutiveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'ประเภทโครงสร้าง'=>array('index'),
	'เรียงลำดับข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'จัดการประเภทโครงสร้าง', 'url'=>array('admin')),
);
?>

<h1>เรียงลำดับการแสดงผล ประเภทโครงสร้าง</h1>
<style type="text/css" media="screen">
/*<![CDATA[*/

#orderList {list-style-type: none; margin: 0; padding: 0; width: 60%;}
#orderList li {margin: 2px; padding: 4px; border: 1px solid #e3e3e3; background: #f7f7f7}

/*]]>*/
</style>
<!--<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/jquery-1.9.1.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ui/jquery.ui.core.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ui/jquery.ui.widget.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ui/jquery.ui.mouse.js"></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/ui/jquery.ui.sortable.js"></script>-->
<script>
        var baseUrl = "<?php echo Yii::app()->createUrl('structureType'); ?>"
</script>
<div class="form">
<p class="note"><span class="required">*</span> หมายเหตุ : คลิกค้างที่รายชื่อและลากเพื่อย้ายตำแหน่ง</p>
<div style="cursor: move">
<?php
    // Organize the dataProvider data into a Zii-friendly array
    $items = CHtml::listData($dataProvider->getData(), 'str_type_id', 'name_th');
    // Implement the JUI Sortable plugin
    $this->widget('zii.widgets.jui.CJuiSortable', array(
        'id' => 'orderList',
        'items' => $items,
    ));
    // Add a Submit button to send data to the controller
?>
</div><br/>
<div class="row buttons">
<?php    echo CHtml::ajaxButton('บันทึกการเปลี่ยนแปลง', '', array(
        'type' => 'POST',
        'htmlOptions' => array('style'=>'cursor: pointer'),
        'data' => array(
            // Turn the Javascript array into a PHP-friendly string
            'Order' => 'js:$("ul#orderList").sortable("toArray").toString()',
        ),
        'success'=>'function(){
            alert("บันทึกข้อมูลเรียบร้อยแล้ว");           
            var win=window.open(baseUrl,"_self");
                    with(win.document)
                    {
                        close();
                    }
            }
        ',
    ));


?>
</div>
</div>

