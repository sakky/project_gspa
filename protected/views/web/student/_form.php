<div class="grid_10 push_1 login_signup">

				<h2>สมัครสมาชิก</h2>

				<div class="signup_box">

					<div class="signup_normal_box">

						<h3>สมัครสมาชิกแบบทั่วไป</h3>
                                                <?php $form=$this->beginWidget('CActiveForm', array(
                                                                                'id'=>'student-form',
                                                                                'enableAjaxValidation'=>false,
                                                                        )); ?>
                                                        <p class="note">Fields with <span class="required">*</span> are required.</p>
							<p>
								<div class="firstname">
									<?php echo $form->labelEx($model,'firstname'); ?>
                                                                        <?php echo $form->textField($model,'firstname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'firstname'); ?>
								</div>

								<div class="lastname">
                                                                        <?php echo $form->labelEx($model,'lastname'); ?>
                                                                        <?php echo $form->textField($model,'lastname',array('class'=>'input')); ?>
                                                                        <?php echo $form->error($model,'lastname'); ?>
								</div>
							</p>
							<div class="clear"></div>
                                                        <p>
								<?php echo $form->labelEx($model,'email'); ?>
                                                                <?php echo $form->textField($model,'email',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'email'); ?>
							</p>
                                                        <p>
								<?php echo $form->labelEx($model,'level_id'); ?>
                                                                <?php echo $form->dropDownList($model,'level_id', $option_levels,array(
                                                                                'prompt' => '--Please Select--',
                                                                                'value' => '0',)); ?>
                                                                <?php echo $form->error($model,'level_id'); ?>
							</p>
							<p>
								<?php echo $form->labelEx($model,'username'); ?>
                                                                <?php echo $form->textField($model,'username',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'username'); ?>
							</p>
							<p>
								<?php echo $form->labelEx($model,'password'); ?>
                                                                <?php echo $form->passwordField($model,'password',array('class'=>'input')); ?>
                                                                <?php echo $form->error($model,'password'); ?>
							</p>
							<p>
								<label for="user_pass_retype">ยืนยันรหัสผ่าน *</label>
								<input type="password" name="password_confirm" id="password_confirm" class="input" value="" />
                                                                
                                                       </p>
                                                       <?php if(($password_confirm==1)||($password_not_match==1) ){?>
                                                       <p class="errorMessage">
                                                                <?php if($password_confirm==1) echo $this->label['confirm_pass_label']?>
                                                                <?php if($password_not_match==1) echo $this->label['pass_not_match_label']?>
                                                        </p>
                                                        <?php } ?>
							<p class="submit">
                                                            <?php echo CHtml::submitButton('สมัครสมาชิก',
                                                                    array(
                                                                            'value'=> $this->label['button_login'],
                                                                            'id'=> 'wp-submit',
                                                                            'class'=> 'button button-primary button-large',
                                                                    )
                                                            ); ?>
							</p>
						<?php $this->endWidget(); ?>
					</div>

					<div class="signup_with_facebook_box">
						<h3>สมัครผ่าน Facebook</h3>
						<a class="facebook_button" href="#">Facebook Login</a>
						<ul>
							<li>สมัครง่าย ไม่ต้องเสียเวลากรอกข้อมูล</li>
							<li>ใช้งานได้ทันที ไม่ต้องกดยืนยันในอีเมล</li>
						</ul>
					</div>

				</div>

			</div>