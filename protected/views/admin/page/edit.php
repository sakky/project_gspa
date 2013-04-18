<?php
$this->menu=array(
        array('label'=>'เกี่ยวกับวิทยาลัย', 'url'=>array('/page/edit?id=1')),
        array('label'=>'สัญลักษณ์ประจำวิทยาลัย', 'url'=>array('/page/edit?id=2')),
        array('label'=>'คณะกรรมการประจำวิทยาลัย', 'url'=>array('/board')),
        array('label'=>'ผู้บริหารวิทยาลัย', 'url'=>array('/executive')),
        array('label'=>'โครงสร้างองค์กร', 'url'=>array('/page/edit?id=4')),
        array('label'=>'ความร่วมมือทางวิชาการ', 'url'=>array('/page/edit?id=5')),
        array('label'=>'แผนที่วิทยาลัย', 'url'=>array('/page/edit?id=6')),
);
$this->head_menu = "แนะนำวิทยาลัย";
?>

<h1>แก้ไขข้อมูลหน้า <?php echo $model->name_th; ?></h1>

<?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>