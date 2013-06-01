    <?php if($this->showMenu) {?>
        <div class="span-5">
            <div id="sidebar">
            <div id="left_side">
            <script type="text/javascript">
            $(function(){    
                    //$('#navmenu>li>ul').hide();    
                    $('#navmenu>li').click(function(){ 
                        
                        $(this).find('ul').slideToggle();
//                    // close open sub menus        
//                    $(this).siblings().find('ul:visible').slideUp(500);        
//                    // open current menu if it's closed        
//                    $(this).find('ul:hidden').slideDown(500);   
                    })
            });
            </script>
<?php 
            $curpage = Yii::app()->getController()->getAction()->controller->id;
            $curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
            $curpage .= Yii::app()->getRequest()->getQuery('id');
            
            $controller = Yii::app()->getController()->getAction()->controller->id;
//            echo $curpage;
//            
//            echo "<br/>";
//            echo $controller;
?>
            <ul id="navmenu">
            <!-- CSS Tabs -->
            <li <?php if($curpage=='site/index'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('site'); ?>">หน้าหลัก</a></li>
            <li <?php if($controller=='page'||$controller=='executive' || $controller=='structure' || $controller=='structuretype' || $controller=='board'){?> class="current" <?php }?>><a href="#">เกี่ยวกับหน่วยงาน</a>
                <ul <?php if($controller=='page'||$controller=='executive' || $controller=='structure' || $controller=='structuretype' || $controller=='board'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>
                    <li <?php if($curpage=='page/edit1'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>1)); ?>">ความเป็นมา</a></li>
                    <li <?php if($curpage=='page/edit2'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>2)); ?>">ตราสัญลักษณ์</a></li>
                    <li <?php if($curpage=='page/edit4'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>4)); ?>">วิสัยทัศน์</a></li>
                    <li <?php if($curpage=='page/edit5'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>5)); ?>">พันธกิจ</a></li>
                    <li <?php if($controller=='executive'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('executive'); ?>">ทำเนียบผู้บริหาร</a></li>
                    <li <?php if($controller=='structure'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('structure'); ?>">โครงสร้างหน่วยงาน</a></li>
                    <li <?php if($controller=='structuretype'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('structuretype'); ?>">ประเภทโครงสร้างหน่วยงาน</a></li>
                    <li <?php if($controller=='board'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('board'); ?>">คณาจารย์</a></li>
                </ul>
            </li>
            <!--<li><a href="/inventory/admin/withdraw.php">ข้อมูลการเบิกวัสดุ</a></li>-->
            <li><a href="#">ประกาศ</a>
                <ul style="display: none">
                    <li><a href="#">สมัครเรียน</a></li>
                    <li><a href="#">รับสมัครงาน</a></li>
                </ul>
            </li>
            <!--<li><a href="/inventory/admin/borrow.php">ข้อมูลการยืมครุภัณฑ์</a></li>-->
            <li><a href="#">ประชาสัมพันธ์/กิจกรรม</a>
                <ul style="display: none">
                        <li><a href="#">ภายใน</a></li>
                        <li><a href="#">จากสื่อ</a></li>
                </ul>
            <li><a href="<?php echo Yii::app()->createUrl(''); ?>">สื่อเผยแพร่/ดาวโหลด</a></li>


            <li><a href="#">ความร่วมมือ</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ภายในประเทศ</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ต่างประเทศ</a></li>
                </ul>
            </li>
            
            <li><a href="#">หน่วยงานภายใต้กำกับ</a></li>
            
            <li><a href="#">รายงานผลการดำเนินงาน</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">รายงานทั้งหมด</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ประเภทรายงาน</a></li>
                </ul>
            
            </li>
            
            <li><a href="#">บริการ</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">บริการทั้งหมด</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ประเภทบริการ</a></li>
                </ul>
            </li>
            
            <li><a href="#">คลังข้อมูลความรู้</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">การจัดการความรู้</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">หมวดความรู้</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">สารคดี</a></li>
                </ul>
            </li>
            
            <li><a href="#">บริการนิสิต</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ปริญญาโท</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ปริญาเอก</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ประเมินการเรียนการสอน</a></li>
                </ul>
            </li>
            
            <li><a href="#">ทำเนียบนิสิต</a>
                <ul style="display: none">
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ปริญญาโท</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl(''); ?>">ปริญาเอก</a></li>
                </ul>
            </li>
            
            <li><a href="<?php echo Yii::app()->createUrl('link'); ?>">ลิงค์ที่เกี่ยวข้อง</a></li>
            
            <li><a href="#">เมนูอื่นๆ</a>
                <ul style="display: none">                         
                        <li><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>7)); ?>">ข้อมูลการติดต่อ</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('slide'); ?>">Slide Show</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>3)); ?>">Video</a></li>
                </ul>
            </li>
            
            </li><li><a href="<?php echo Yii::app()->createUrl('user'); ?>">ผู้ใช้งาน</a></li>

            </ul>

            <!-- End Menu8 -->
            </div>
            </div>
        </div>
    <?php } ?>