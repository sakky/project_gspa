<div id="answer_sheet_<?php echo $answer['session_order'];?>" <?php if($key_ans!=0){?>style="display:none"<?php }?> >
    <div class="answer_top">
            <div class="header_left">
                    <!-- if has link <a href="#"></a> -->
                    <?php if($key_ans!=0){?>
                        <a href="javascript:show_prev('<?php echo $answer['session_order'];?>');"></a>
                    <?php }else{?>
                        <span>inactive</span>
                    <?php }?>
                    <!--<span>inactive</span>-->
            </div>
            <div class="header_center">
                    <h2 class="has_multiple">กระดาษคำตอบ</h2>
                    <h3>ตอนที่ <?php echo $answer['session_order'];?></h3>
            </div>
            <div class="header_right">
                    <?php if($last_key!=$key_ans){?>
                        <a href="javascript:show_next('<?php echo $answer['session_order'];?>');"></a>
                    <?php }else{?>
                        <span>inactive</span>
                    <?php }?>
            </div>
    </div>
    <div class="answer_content form_1">
         <div class="instruction"><b>คำชี้แจง:</b><?php echo $answer['session_name'];?></div>
         <?php
                    $session_id = $answer['session_id'];
                    $start = $answer['session_start'];
                    $end = $answer['session_end'];
                    $order = $answer['session_order'];

                    $student_id = Yii::app()->user->id;
                    $exam_id = $_GET['id'];

                    $testRecoed = new TestRecord;
                    $testing = new Testing;

                    $test_record_id = $testRecoed->getIdByStudentIdExamId($student_id,$exam_id);

         ?>
         <ul>
                <?php for($i=$start;$i<=$end;$i++){
                      $test = $testing->getAllTestingRecord($test_record_id,$i);
                ?>

                <li>
                        <span><?php echo $i;?></span>
                        <input type="radio" id="ans<?php echo $i;?>_1" name="ans[<?php echo $i;?>]" value="ก" <?php if($test['selected']=='ก'){?>checked<?php }?> disabled >
                        <label for="ans<?php echo $i;?>_1"
                        <?php if(($test['answer']==$test['selected'])&&($test['answer']=='ก')){?>
                               class="right"
                        <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='ก')){?>
                               class="wrong"
                        <?php }?>
                               >ก</label>

                        <input type="radio" id="ans<?php echo $i;?>_2" name="ans[<?php echo $i;?>]" value="ข" <?php if($test['selected']=='ข'){?>checked<?php }?> disabled>
                        <label for="ans<?php echo $i;?>_2"
                        <?php if(($test['answer']==$test['selected'])&&($test['answer']=='ข')){?>
                               class="right"
                        <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='ข')){?>
                               class="wrong"
                        <?php }?>       
                               >ข</label>

                        <input type="radio" id="ans<?php echo $i;?>_3" name="ans[<?php echo $i;?>]" value="ค" <?php if($test['selected']=='ค'){?>checked<?php }?> disabled>
                        <label for="ans<?php echo $i;?>_3"
                        <?php if(($test['answer']==$test['selected'])&&($test['answer']=='ค')){?>
                               class="right"
                        <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='ค')){?>
                               class="wrong"
                        <?php }?>
                               >ค</label>

                        <input type="radio" id="ans<?php echo $i;?>_4" name="ans[<?php echo $i;?>]" value="ง" <?php if($test['selected']=='ง'){?>checked<?php }?> disabled>
                        <label for="ans<?php echo $i;?>_4"
                        <?php if(($test['answer']==$test['selected'])&&($test['answer']=='ง')){?>
                               class="right"
                        <?php }else if(($test['answer']!=$test['selected'])&&($test['answer']=='ง')){?>
                               class="wrong"
                        <?php }?>
                               >ง</label>

                        <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>

                </li>
                <?php } ?>
         </ul>

    </div>



</div>