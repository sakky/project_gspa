    <?php if($this->showMenu) {?>
        <div class="span-5">
            <div id="sidebar">
            <div id="left_side">
            
<style>
#navmenu li ul li a {padding-left: 35px;}
#navmenu li ul li a:hover {padding-left: 35px;}
#navmenu li ul li.current a {padding-left: 35px;}
#navmenu li.current ul li.current a {padding-left: 35px;}
</style>            
<script type="text/javascript">
            $(document).ready(function () {
                $('#navmenu > li > a').click(function(e){
                    if ($(this).attr('class') != 'current'){
                    $('#navmenu li ul').slideUp();
                        $(this).next().slideToggle();
                        $('#navmenu li a').removeClass('current');
                        $(this).addClass('current');
                        }else{
                        $(this).next().slideToggle();
                        }
                        e.preventDefault();
                });
            });


</script>
<?php 
            $curpage = Yii::app()->getController()->getAction()->controller->id;
            $curpage .= '/'.Yii::app()->getController()->getAction()->controller->action->id;
            $curpage .= Yii::app()->getRequest()->getQuery('id');
            $curpage .= Yii::app()->getRequest()->getQuery('group');
            
            $controller = Yii::app()->getController()->getAction()->controller->id;
            //echo $curpage;       
//            echo "<br/>";
//            echo $controller;
            $user_role = $this->getUserRole(Yii::app()->user->id);
            //echo $user_role;
            $user_group_menu = $this->getUserGroupMenu(Yii::app()->user->id);

                      $menu_use = array();
                      $user_menu = explode(',', $user_group_menu);
                      foreach ($user_menu as $key => $value) {
                          
                          $menu_use[$value] = $value;
                      }
?>
            <ul id="navmenu">
            <!-- CSS Tabs -->
            <li <?php if($curpage=='site/index'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('site'); ?>">หน้าหลัก</a></li>
            <?php if($menu_use[1]){?>
            <li <?php if($curpage=='page/edit1'||$curpage=='page/edit2'||$curpage=='page/edit4'||$curpage=='page/edit5'||$controller=='executive' || $controller=='structure' || $controller=='structureType' || $controller=='board'){?> class="current" <?php }?>><a href="#">เกี่ยวกับหน่วยงาน</a>
                <ul <?php if($curpage=='page/edit1'||$curpage=='page/edit2'||$curpage=='page/edit4'||$curpage=='page/edit5'||$controller=='executive' || $controller=='structure' || $controller=='structureType' || $controller=='board'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>
                    <li <?php if($curpage=='page/edit1'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>1)); ?>">ความเป็นมา</a></li>
                    <li <?php if($curpage=='page/edit2'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>2)); ?>">ตราสัญลักษณ์</a></li>
                    <li <?php if($curpage=='page/edit4'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>4)); ?>">วิสัยทัศน์</a></li>
                    <li <?php if($curpage=='page/edit5'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>5)); ?>">พันธกิจ</a></li>
                    <li <?php if($controller=='executive'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('executive'); ?>">ทำเนียบผู้บริหาร</a></li>
                    <li <?php if($controller=='structure'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('structure'); ?>">โครงสร้างหน่วยงาน</a></li>
                    <li <?php if($controller=='structureType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('structureType'); ?>">ประเภทโครงสร้างหน่วยงาน</a></li>
                    <li <?php if($controller=='board'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('board'); ?>">คณาจารย์</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[2]){?>
            <li <?php if($controller=='student' || $controller=='jobs'){?>class="current" <?php }?>><a href="#">ประกาศ</a>
                <ul <?php if($controller=='student' || $controller=='jobs'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>
                    <li <?php if($controller=='student'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('student'); ?>">สมัครเรียน</a></li>
                    <li <?php if($controller=='jobs'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('jobs'); ?>">รับสมัครงาน</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[3]){?>
            <li <?php if($controller=='newsInSide'||$controller=='news'||$controller=='newsGroup'||$controller=='newsGroup2'||$controller=='gallery'){?>class="current" <?php }?>><a href="#">ประชาสัมพันธ์/กิจกรรม</a>
                <ul <?php if($controller=='newsInSide'||$controller=='news'||$controller=='newsGroup'||$controller=='newsGroup2'||$controller=='gallery'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='newsInSide'||$controller=='newsGroup'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('newsInSide'); ?>">ภายใน</a></li>
                        <li <?php if($controller=='news'||$controller=='newsGroup2'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('news'); ?>">จากสื่อ</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[4]){?>
            <li <?php if($controller=='document'||$controller=='documentType'){?>class="current" <?php }?>><a href="#">สื่อเผยแพร่/ดาวน์โหลด</a>
                    <ul <?php if($controller=='document'||$controller=='documentType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='document'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('document'); ?>">จัดการสื่อเผยแพร่</a></li>
                        <li <?php if($controller=='documentType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('documentType'); ?>">ประเภทสื่อเผยแพร่</a></li>
                    </ul>
            </li>
            <?php }?>
            <?php if($menu_use[5]){?>
            <li <?php if($controller=='cooperation'||$controller=='cooperationType'){?>class="current" <?php }?>><a href="#">ความร่วมมือ</a>
                <ul <?php if($controller=='cooperation'||$controller=='cooperationType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='cooperation'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('cooperation'); ?>">จัดการข้อมูลความร่วมมือ</a></li>
                        <li <?php if($controller=='cooperationType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('cooperationType'); ?>">ประเภทความร่วมมือ</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[6]){?>
            <li <?php if($controller=='organization'){?>class="current" <?php }?>><a href="#">หน่วยงานภายใน</a>
                <ul <?php if($controller=='organization'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='organization'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('organization'); ?>">จัดการหน่วยงานภายใน</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[7]){?>
            <li <?php if($controller=='report'||$controller=='reportType'){?>class="current" <?php }?>><a href="#">รายงานผลการดำเนินงาน</a>
                <ul <?php if($controller=='report'||$controller=='reportType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='report'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('report'); ?>">รายงานทั้งหมด</a></li>
                        <li <?php if($controller=='reportType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('reportType'); ?>">ประเภทรายงาน</a></li>
                </ul>
            
            </li>
            <?php }?>
            <?php if($menu_use[8]){?>
            <li <?php if($controller=='service'||$controller=='serviceType'){?>class="current" <?php }?>><a href="#">บริการ</a>
                <ul <?php if($controller=='service'||$controller=='serviceType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='service'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('service'); ?>">บริการทั้งหมด</a></li>
                        <li <?php if($controller=='serviceType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('serviceType'); ?>">ประเภทบริการ</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[9]){?>
            <li <?php if($controller=='knowledge'||$controller=='knowledgeType'){?>class="current" <?php }?>><a href="#">คลังข้อมูลความรู้</a>
                <ul <?php if($controller=='knowledge'||$controller=='knowledgeType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='knowledge'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('knowledge'); ?>">จัดการคลังข้อมูลความรู้</a></li>
                        <li <?php if($controller=='knowledgeType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('knowledgeType'); ?>">ประเภทคลังข้อมูลความรู้</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[10]){?>
            <li <?php if($controller=='studentService'||$controller=='studentServiceType'){?>class="current" <?php }?>><a href="#">บริการนิสิต</a>
                <ul <?php if($controller=='studentService'||$controller=='studentServiceType'){?>style="display: "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='studentService'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('studentService'); ?>">บริการนิสิตทั้งหมด</a></li>
                        <li <?php if($controller=='studentServiceType'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('studentServiceType'); ?>">ประเภทบริการนิสิต</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[11]){?>
            <li <?php if($controller=='alumni'|| $controller=='alumniNo'){?> class="current" <?php }?>><a href="#">ทำเนียบนิสิต</a>
                <ul <?php if($controller=='alumni'|| $controller=='alumniNo'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='alumni'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('alumni'); ?>">ข้อมูลนิสิต</a></li>
                        <li <?php if($controller=='alumniNo'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('alumniNo'); ?>">รุ่นที่จบ</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($menu_use[12]){?>
            <li <?php if($controller=='link'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('link'); ?>">ลิงค์ที่เกี่ยวข้อง</a>
                 <ul <?php if($controller=='link'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>
                        <li <?php if($controller=='link'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('link'); ?>">จัดการลิงค์ที่เกี่ยวข้อง</a></li>
                 </ul>
            </li>
            <?php }?>
            <?php if($menu_use[13]){?>
            <li <?php if($curpage=='page/edit7'|| $curpage=='page/edit6'|| $curpage=='page/edit3'||$controller=='slide'){?> class="current" <?php }?>><a href="#">เมนูอื่นๆ</a>
                <ul <?php if($curpage=='page/edit7'|| $curpage=='page/edit6'|| $curpage=='page/edit3' ||$controller=='slide'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>                         
                        <li <?php if($curpage=='page/edit7'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>7)); ?>">ข้อมูลการติดต่อ</a></li>
                        <li <?php if($curpage=='page/edit6'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>6)); ?>">แผนที่วิทยาลัย</a></li>
                        <li <?php if($controller=='slide'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('slide'); ?>">Slide Show</a></li>
                        <li <?php if($curpage=='page/edit3'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('page/edit', array('id'=>3)); ?>">Video</a></li>
                </ul>
            </li>
            <?php }?>
            <?php if($user_role=='top_admin'){?>
            <li <?php if($controller=='user'||$controller=='userGroup'){?> class="current" <?php }?>><a href="#">ผู้ใช้งาน</a>
                <ul <?php if($controller=='user'||$controller=='userGroup'){?>style="display:  "<?php }else{?>style="display: none"<?php }?>>                         
                        <li <?php if($curpage=='user/index'||$curpage=='user/create'||$curpage=='user/update'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('user'); ?>">ข้อมูลผู้ใช้งาน</a></li>
                        <li <?php if($controller=='userGroup'){?> class="current" <?php }?>><a href="<?php echo Yii::app()->createUrl('userGroup'); ?>">ประเภทผู้ใช้งาน</a></li>
                </ul>
            </li>
            <?php }?>
            </ul>

            <!-- End Menu8 -->
            </div>
            </div>
        </div>
    <?php } ?>
