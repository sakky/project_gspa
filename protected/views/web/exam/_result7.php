<div id="answer_sheet_<?php echo $answer['session_order'];?>" <?php if($key_ans!=0){?>style="display:none"<?php }?>>
     <div class="answer_top">
        <div class="header_left">
            <?php if($key_ans!=0){?>
                <a href="javascript:show_prev('<?php echo $answer['session_order'];?>');"></a>
            <?php }else{?>
                <span>inactive</span>
            <?php }?>
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
    <div class="answer_content form_7">

    <div class="instruction"><b>คำชี้แจง:</b><?php echo $answer['session_name'];?></div>
        <ul>
             <?php
                    $session_id = $answer['session_id'];
                    $session_type = $answer['answer_type_id'];
                    $start = $answer['session_start'];
                    $end = $answer['session_end'];
                    $order = $answer['session_order'];

                    $student_id = Yii::app()->user->id;
                    $exam_id = $_GET['id'];

                    $testRecoed = new TestRecord;
                    $testing = new Testing;

                    $test_record_id = $testRecoed->getIdByStudentIdExamId($student_id,$exam_id);
                    for($i=$start;$i<=$end;$i++){
                    $test = $testing->getAllTestingRecord($test_record_id,$i);

                    if(is_array($test)){

                        $ans_1 = substr($test['selected'],0,1);
                        $ans_2 = substr($test['selected'],1,1);
                        $ans_3 = substr($test['selected'],2,1);
                        $ans_4 = substr($test['selected'],3,1);
                        $ans_5 = substr($test['selected'],4,1);
                        $ans_6 = substr($test['selected'],5,1);
                        $ans_7 = substr($test['selected'],6,1);
                        $ans_8 = substr($test['selected'],7,1);
                        $ans_9 = substr($test['selected'],8,1);
                        $ans_10 = substr($test['selected'],9,1);
                        $ans_11 = substr($test['selected'],10,1);
                        $ans_12 = substr($test['selected'],11,1);
                        
                        $answer_1 = substr($test['answer'],0,1);
                        $answer_2 = substr($test['answer'],1,1);
                        $answer_3 = substr($test['answer'],2,1);
                        $answer_4 = substr($test['answer'],3,1);
                        $answer_5 = substr($test['answer'],4,1);
                        $answer_6 = substr($test['answer'],5,1);
                        $answer_7 = substr($test['answer'],6,1);
                        $answer_8 = substr($test['answer'],7,1);
                        $answer_9 = substr($test['answer'],8,1);
                        $answer_10 = substr($test['answer'],9,1);
                        $answer_11 = substr($test['answer'],10,1);
                        $answer_12 = substr($test['answer'],11,1);


                    }else{
                        $ans_1 = '-';
                        $ans_2 = '-';
                        $ans_3 = '-';
                        $ans_4 = '-';
                        $ans_5 = '-';
                        $ans_6 = '-';
                        $ans_7 = '-';
                        $ans_8 = '-';
                        $ans_9 = '-';
                        $ans_10 = '-';
                        $ans_11 = '-';
                        $ans_12 = '-';

                        $answer_1 = '';
                        $answer_2 = '';
                        $answer_3 = '';
                        $answer_4 = '';
                        $answer_5 = '';
                        $answer_6 = '';
                        $answer_7 = '';
                        $answer_8 = '';
                        $answer_9 = '';
                        $answer_10 = '';
                        $answer_11 = '';
                        $answer_12 = '';
                    }
            ?>
            <li>
                    <span><?php echo $i;?></span>
                    <ul>
                        <li>
                                <span>คำตอบที่ 1</span>
                                <ul>
                                        <li>
                                            <span id="append_<?php echo $i;?>_1_1" class="append" ><?php  echo $ans_1;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_0" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_0"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_1" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_1"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_2" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_2"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_3" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_3"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_4" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_4"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_5" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_5"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_6" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_6"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_7" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_7"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_8" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_8"
                                                               <?php if(($answer_1==$ans_1)&&($answer_1=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_1!=$ans_1)&&($answer_1=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_1_9" name="ans_1_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_1')" <?php if($ans_1=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_1_1_9">9</label>

                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_1_2" class="append"><?php  echo $ans_2;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_0" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_0"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_1" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_1"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_2" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_2"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_3" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_3"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_4" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_4"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_5" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_5"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_6" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_6"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_7" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_7"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_8" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_8"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_2_9" name="ans_1_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_2')" <?php if($ans_2=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_1_2_9"
                                                               <?php if(($answer_2==$ans_2)&&($answer_2=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_2!=$ans_2)&&($answer_2=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_1_3" class="append"><?php  echo $ans_3;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_0" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='A'){?>checked<?php }?> value="A" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_0"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='A')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='A')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_1" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='B'){?>checked<?php }?> value="B" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_1"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='B')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='B')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_2" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='C'){?>checked<?php }?> value="C" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_2"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='C')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='C')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_3" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='D'){?>checked<?php }?> value="D" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_3"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='D')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='D')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_4" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='E'){?>checked<?php }?> value="E" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_4"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='E')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='E')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_5" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='F'){?>checked<?php }?> value="F" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_5"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='F')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='F')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_6" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='G'){?>checked<?php }?> value="G" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_6"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='G')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='G')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_7" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='H'){?>checked<?php }?> value="H" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_7"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='H')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='H')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_8" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='I'){?>checked<?php }?> value="I" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_8"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='I')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='I')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_1_3_9" name="ans_1_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_1_3')" <?php if($ans_3=='J'){?>checked<?php }?> value="J" disabled>
                                                        <label for="ans<?php echo $i;?>_1_3_9"
                                                               <?php if(($answer_3==$ans_3)&&($answer_3=='J')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_3!=$ans_3)&&($answer_3=='J')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >J</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_1[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 2</span>
                                <ul>
                                        <li>
                                                <span  id="append_<?php echo $i;?>_2_1" class="append"><?php  echo $ans_4;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_0" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_0"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_1" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_1"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_2" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_2"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_3" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_3"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_4" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_4"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_5" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_5"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_6" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_6"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_7" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_7"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_8" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_8"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_1_9" name="ans_2_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_1')" <?php if($ans_4=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_2_1_9"
                                                               <?php if(($answer_4==$ans_4)&&($answer_4=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_4!=$ans_4)&&($answer_4=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_2" class="append"><?php  echo $ans_5;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_0" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_0"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_1" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_1"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_2" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_2"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_3" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_3"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_4" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_4"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_5" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_5"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_6" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_6"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_7" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_7"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_8" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_8"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_2_9" name="ans_2_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_2')" <?php if($ans_5=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_2_2_9"
                                                               <?php if(($answer_5==$ans_5)&&($answer_5=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_5!=$ans_5)&&($answer_5=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_2_3" class="append"><?php  echo $ans_6;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_0" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='A'){?>checked<?php }?> value="A" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_0"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='A')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='A')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_1" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='B'){?>checked<?php }?> value="B" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_1"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='B')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='B')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_2" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='C'){?>checked<?php }?> value="C" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_2"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='C')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='C')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_3" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='D'){?>checked<?php }?> value="D" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_3"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='D')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='D')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_4" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='E'){?>checked<?php }?> value="E" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_4"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='E')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='E')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_5" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='F'){?>checked<?php }?> value="F" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_5"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='F')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='F')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_6" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='G'){?>checked<?php }?> value="G" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_6"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='G')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='G')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_7" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='H'){?>checked<?php }?> value="H" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_7"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='H')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='H')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_8" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='I'){?>checked<?php }?> value="I" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_8"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='I')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='I')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_2_3_9" name="ans_2_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_2_3')" <?php if($ans_6=='J'){?>checked<?php }?> value="J" disabled>
                                                        <label for="ans<?php echo $i;?>_2_3_9"
                                                               <?php if(($answer_6==$ans_6)&&($answer_6=='J')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_6!=$ans_6)&&($answer_6=='J')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >J</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_2[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 3</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_1" class="append"><?php  echo $ans_7;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_0" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_0"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_1" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_1"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_2" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_2"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_3" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_3"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_4" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_4"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_5" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_5"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_6" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_6"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id=ans<?php echo $i;?>_3_1_7" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_7"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_8" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_8"
                                                               <?php if(($answer_7==$ans_7)&&($answer_7=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_7!=$ans_7)&&($answer_7=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_1_9" name="ans_3_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_1')" <?php if($ans_7=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_3_1_9">9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_2" class="append"><?php  echo $ans_8;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_0" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_0"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_1" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_1"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_2" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_2"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_3" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_3"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_4" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_4"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_5" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_5"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_6" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_6"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_7" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_7"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_8" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_8"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_2_9" name="ans_3_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_2')" <?php if($ans_8=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_3_2_9"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_3_3" class="append"><?php  echo $ans_9;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_0" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='A'){?>checked<?php }?> value="A" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_0"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='A')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='A')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_1" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='B'){?>checked<?php }?> value="B" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_1"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='B')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='B')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_2" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='C'){?>checked<?php }?> value="C" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_2"
                                                               <?php if(($answer_8==$ans_8)&&($answer_8=='C')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_8!=$ans_8)&&($answer_8=='C')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_3" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='D'){?>checked<?php }?> value="D" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_3"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='D')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='D')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_4" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='E'){?>checked<?php }?> value="E" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_4"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='E')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='E')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_5" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='F'){?>checked<?php }?> value="F" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_5"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='F')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='F')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_6" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='G'){?>checked<?php }?> value="G" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_6"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='G')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='G')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_7" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='H'){?>checked<?php }?> value="H" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_7"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='H')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='H')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_8" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='I'){?>checked<?php }?> value="I" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_8"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='I')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='I')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_3_3_9" name="ans_3_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_3_3')" <?php if($ans_9=='J'){?>checked<?php }?> value="J" disabled>
                                                        <label for="ans<?php echo $i;?>_3_3_9"
                                                               <?php if(($answer_9==$ans_9)&&($answer_9=='J')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_9!=$ans_9)&&($answer_9=='J')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >J</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_3[<?php echo $i;?>]" value=""/>
                        </li>
                        <li>
                                <span>คำตอบที่ 4</span>
                                <ul>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_1" class="append"><?php  echo $ans_10;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_0" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_0"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>

                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_1" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_1"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_2" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_2"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_3" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_3"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_4" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_4"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_5" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_5"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_6" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_6"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_7" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_7"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_8" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_8"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_1_9" name="ans_4_1[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_1')" <?php if($ans_10=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_4_1_9"
                                                               <?php if(($answer_10==$ans_10)&&($answer_10=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_10!=$ans_10)&&($answer_10=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_2"  class="append"><?php  echo $ans_11;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_0" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='0'){?>checked<?php }?> value="0" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_0"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='0')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='0')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >0</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_1" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='1'){?>checked<?php }?> value="1" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_1"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='1')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='1')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >1</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_2" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='2'){?>checked<?php }?> value="2" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_2"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='2')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='2')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >2</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_3" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='3'){?>checked<?php }?> value="3" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_3"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='3')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='3')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >3</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_4" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='4'){?>checked<?php }?> value="4" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_4"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='4')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='4')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >4</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_5" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='5'){?>checked<?php }?> value="5" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_5"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='5')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='5')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >5</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_6" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='6'){?>checked<?php }?> value="6" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_6"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='6')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='6')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >6</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_7" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='7'){?>checked<?php }?> value="7" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_7"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='7')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='7')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >7</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_8" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='8'){?>checked<?php }?> value="8" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_8"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='8')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='8')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >8</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_2_9" name="ans_4_2[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_2')" <?php if($ans_11=='9'){?>checked<?php }?> value="9" disabled>
                                                        <label for="ans<?php echo $i;?>_4_2_9"
                                                               <?php if(($answer_11==$ans_11)&&($answer_11=='9')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_11!=$ans_11)&&($answer_11=='9')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >9</label>
                                        </li>
                                        <li>
                                                <span id="append_<?php echo $i;?>_4_3" class="append"><?php  echo $ans_12;?></span>
                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_0" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='A'){?>checked<?php }?> value="A" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_0"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='A')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='A')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >A</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_1" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='B'){?>checked<?php }?> value="B" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_1"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='B')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='B')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >B</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_2" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='C'){?>checked<?php }?> value="C" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_2"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='C')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='C')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >C</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_3" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='D'){?>checked<?php }?> value="D" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_3"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='D')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='D')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >D</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_4" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='E'){?>checked<?php }?> value="E" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_4"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='E')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='E')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >E</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_5" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='F'){?>checked<?php }?> value="F" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_5"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='F')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='F')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >F</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_6" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='G'){?>checked<?php }?> value="G" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_6"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='G')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='G')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >G</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_7" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='H'){?>checked<?php }?> value="H" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_7"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='H')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='H')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >H</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_8" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='I'){?>checked<?php }?> value="I" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_8"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='I')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='I')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >I</label>

                                                        <input type="radio" id="ans<?php echo $i;?>_4_3_9" name="ans_4_3[<?php echo $i;?>]" onClick="ChangeRadioLabel(this,'<?php echo $i;?>_4_3')" <?php if($ans_12=='J'){?>checked<?php }?> value="J" disabled>
                                                        <label for="ans<?php echo $i;?>_4_3_9"
                                                               <?php if(($answer_12==$ans_12)&&($answer_12=='J')){?>
                                                                      class="right"
                                                               <?php }else if(($answer_12!=$ans_12)&&($answer_12=='J')){?>
                                                                      class="wrong"
                                                               <?php }?>
                                                               >J</label>
                                        </li>
                                </ul>
                                <input type="hidden" name="ans_4[<?php echo $i;?>]" value=""/>
                        </li>
                    </ul>
                    <input type="hidden" name="ans[<?php echo $i;?>]" value="">
                    <input type="hidden" name="session_id[<?php echo $i;?>]" value="<?php echo $session_id;?>"/>
                    <input type="hidden" name="session_type7" value="7"/>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
