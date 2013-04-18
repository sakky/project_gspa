<div class="grid_4 push_4 goback">
        <a href="index.php?r=student/view"><span></span>กลับสู่หน้าหลัก</a>
</div>

<div class="clear"></div>
<div class="grid_10 push_1 editinfo">

				<div class="editinfo_box">

					<h2>แก้ไขข้อมูลส่วนตัว</h2>

					<div class="editinfo_data_box">
                                                        <?php $form=$this->beginWidget('CActiveForm', array(
                                                                                'id'=>'student-form',
                                                                                'enableAjaxValidation'=>false,
                                                                                'htmlOptions' => array('enctype' => 'multipart/form-data'),
                                                                        )); ?>
                                                        <?php echo $form->errorSummary($model); ?>
							<p class="username">
								ชื่อผู้ใช้: <?php echo $model->username;?>
							</p>
							<p>
								<div class="firstname">
                                                                        <?php echo $form->labelEx($model,'ชื่อจริง'); ?>
                                                                        <?php echo $form->textField($model,'firstname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'firstname'); ?>
								</div>

								<div class="lastname">
                                                                        <?php echo $form->labelEx($model,'นามสกุล'); ?>
                                                                        <?php echo $form->textField($model,'lastname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'lastname'); ?>
								</div>
							</p>
							<div class="clear"></div>
							<p>
                                                                <?php echo $form->labelEx($model,'ที่อยู่'); ?>
                                                                <?php echo $form->textField($model,'address',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'address'); ?>
							</p>


                                                        <div class="clear"></div>
							<p>
                                                           <div class="id_number">	
								
                                                                <?php echo $form->labelEx($model,'หมายเลขประจำตัวประชาชน'); ?>
                                                                <input type="text" name="number1" id="number1" value="<?php echo $model->id_number[0];?>" maxlength="1"/> <span>-</span>
                                                                <input type="text" name="number2" id="number2" value="<?php echo $model->id_number[1];?>" maxlength="1"/>
                                                                <input type="text" name="number3" id="number3" value="<?php echo $model->id_number[2];?>" maxlength="1"/>
                                                                <input type="text" name="number4" id="number4" value="<?php echo $model->id_number[3];?>" maxlength="1"/>
                                                                <input type="text" name="number5" id="number5" value="<?php echo $model->id_number[4];?>" maxlength="1"/> <span>-</span>
                                                                <input type="text" name="number6" id="number6" value="<?php echo $model->id_number[5];?>" maxlength="1"/>
                                                                <input type="text" name="number7" id="number7" value="<?php echo $model->id_number[6];?>" maxlength="1"/>
                                                                <input type="text" name="number8" id="number8" value="<?php echo $model->id_number[7];?>" maxlength="1"/>
                                                                <input type="text" name="number9" id="number9" value="<?php echo $model->id_number[8];?>" maxlength="1"/>
                                                                <input type="text" name="number10" id="number10" value="<?php echo $model->id_number[9];?>" maxlength="1"/> <span>-</span>
                                                                <input type="text" name="number11" id="number11" value="<?php echo $model->id_number[10];?>" maxlength="1"/>
                                                                <input type="text" name="number12" id="number12" value="<?php echo $model->id_number[11];?>" maxlength="1"/> <span>-</span>
                                                                <input type="text" name="number13" id="number13" value="<?php echo $model->id_number[12];?>" maxlength="1"/>
							
                                                            </div>
							</p>
							
							<p>
                                                                <?php echo $form->labelEx($model,'โรงเรียน'); ?>
                                                                <?php echo $form->textField($model,'school',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'school'); ?>
							</p>
							<p>
								<?php echo $form->labelEx($model,'ระดับชั้น'); ?>
                                                                <?php echo $form->dropDownList($model,'level_id', $option_levels); ?>
                                                                <?php echo $form->error($model,'level_id'); ?>
                                                                
							</p>
							<p>
                                                                <?php echo $form->labelEx($model,'อีเมล'); ?>
                                                                <?php echo $form->textField($model,'email',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'email'); ?>
							</p>
                                                        <p>
                                                                <?php echo $form->labelEx($model,'เบอร์โทรศัพท์'); ?>
                                                                <?php echo $form->textField($model,'phone',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'phone'); ?>
							</p>
							<p>
                                                                <label>วัน/เดือน/ปีเกิด (ค.ศ.)</label>
                                                                <?php list($y,$m,$d) = explode("-",$model->birthday);
                                                                      $birthday = $d."/".$m."/".$y;
                                                                      $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                                                        'name' => 'Student[birthday]',
                                                                        'value' => ($birthday)?$birthday:date('d/m/Y', strtotime("+1 day")),
                                                                        'options'=>array(
                                                                                        'showAnim'=>'fold',
                                                                                        'changeMonth'=>true,
                                                                                        'dateFormat'=>'dd/mm/yy',
                                                                                        'defaultDate'=>$birthday,
                                                                                        'changeYear'=>true,
                                                                                        'changeDate'=>true,
                                                                                        'showAnim'=>'fold',
                                                                                        //'showButtonPanel'=>true,
                                                                                        'debug'=>true,

                                                                                    ),
                                                                            'htmlOptions' => array(
                                                                            'class'=>'shadowdatepicker',
                                                                            'readonly'=>"readonly",
                                                                            'style'=>'height:20px;',
                                                                        ),
                                                                    )); ?>
                                                                <?php echo $form->error($model,'date'); ?>
                                                        </p>
							<p>
								<?php echo $form->labelEx($model,'สนใจทำข้อสอบวิชา'); ?>
                                                                <?php echo $form->textField($model,'subject',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'subject'); ?>
                                                        </p>
                                                        <div class="row">
                                                                <?php echo $form->labelEx($model,'คณะที่สนใจ'); ?>
                                                                <?php echo $form->textField($model,'faculty',array('size'=>60,'maxlength'=>255)); ?>
                                                                <?php echo $form->error($model,'faculty'); ?>
                                                        </div>
							

							<div class="editpass">

								<h3>แก้ไขรหัสผ่านใหม่</h3>
                                                                <?php if(($password_confirm==1)||($password_not_match==1) ){?>
                                                               <p class="errorMessage">
                                                                        <?php if($password_confirm==1) echo $this->label['confirm_pass_label']?>
                                                                        <?php if($password_not_match==1) echo $this->label['pass_not_match_label']?>
                                                                </p>
                                                                <?php } ?>
								<p>
									<label for="user_pass">รหัสผ่านใหม่</label>
									<input type="password" name="new_password" id="user_pass" class="input" value="" />
								</p>
								<p>
									<label for="user_pass_retype">ยืนยันรหัสผ่านใหม่</label>
									<input type="password" name="password_retype" id="user_pass_retype" class="input" value="" />
								</p>
							</div>
							<p class="submit">
                                                            <?php echo CHtml::submitButton('ตกลง',
                                                                    array(
                                                                            'value'=> 'ตกลง',
                                                                            'id'=> 'wp-submit',
                                                                            'class'=> 'button button-primary button-large',
                                                                    )
                                                            ); ?>
							</p>
                                                
					</div>

					<div class="editinfo_pic_box">
                                                <?php if(!$model->image){?>
                                                <img src="images/web/nopic.png" style="width:180px;" class="news_pic"/>
                                                <?php }else{?>
                                                <img src="uploads/student/<?php echo $model->image;?>" style="width:180px;" class="news_pic">
                                                <?php }?>
						<p>
							<label>อัพโหลดภาพโปรไฟล์</label>
                                                         <?php echo $form->fileField($model,'image',array('style'=>'border: none;box-shadow:none')); ?>
                                                </p>
                                                 (รูปภาพนามสกุล .jpg, .jpeg, .png, .gif เท่านั้น)
					</div>
                                <?php $this->endWidget(); ?>
				</div>

			</div>
