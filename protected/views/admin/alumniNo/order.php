<?php
/* @var $this ExecutiveController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'รุ่นที่จบ'=>array('index'),
	'เรียงลำดับข้อมูล',
);

$this->menu=array(
	//array('label'=>'List Executive', 'url'=>array('index')),
	array('label'=>'จัดการข้อมูล', 'url'=>array('admin')),
);
?>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<h1>เรียงลำดับการแสดงผลข้อมูลรุ่นที่จบ</h1>
<style type="text/css" media="screen">
/*<![CDATA[*/

#orderList {list-style-type: none; margin: 0; padding: 0; width: 60%;}
#orderList li {margin: 2px; padding: 4px; border: 1px solid #e3e3e3; background: #f7f7f7}

/*]]>*/
</style>
<script>
        var baseUrl = "<?php echo Yii::app()->createUrl('alumniNo'); ?>"
</script>
<div class="form">
<p class="note"><span class="required">*</span> หมายเหตุ : คลิกค้างที่รายชื่อและลากเพื่อย้ายตำแหน่ง</p>
<div style="cursor: move">
<?php
    // Organize the dataProvider data into a Zii-friendly array
    $items = CHtml::listData($dataProvider->getData(), 'alumni_no_id', 'name_th');
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


?>&nbsp;&nbsp;
<?php echo CHtml::Button('ยกเลิก', array('onClick'=>'window.location="'.Yii::app()->createUrl('alumniNo').'"')); ?>
</div>
</div>

