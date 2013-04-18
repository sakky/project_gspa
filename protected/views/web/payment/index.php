<?php
    if(!Yii::app()->user->id)
    header("Location: ?r=site/login");

?>
<script type="text/javascript">
    function checkSubmit(){
        for(i=1;i<=4;i++){
            if(document.getElementById('tick_'+i).checked){
                document.getElementById('amt').value =  document.getElementById('tick_'+i).value;
                document.getElementById('itm').value =  document.getElementById('desc_'+i).value;
                document.getElementById('credit_point').value =  document.getElementById('credit_'+i).value;
            }
            
        }

        $.ajax({
            url: 'index.php?r=payment/getinvoice',
            type: 'GET',
            dataType: 'html',
            success: function (data, textStatus, xhr) {
               document.getElementById('inv').value =  data;

               if(document.getElementById('payment_transfer').checked){
                        var result= confirm('ยืนยันวิธีการชำระเงินโดยโอนเงินผ่านบัญชีธนาคาร');
                         if (result== true){
                              document.forms['payment_form'].action = "index.php?r=payment/bank";
                              document.forms['payment_form'].submit();
                         }else{
                             return false;
                         }
                   
                }else if(document.getElementById('payment_credit').checked){
                    document.forms['payment_form'].action = "http://demo.paysbuy.com/paynow.aspx?c=true&lang=t";
                    document.forms['payment_form'].submit();
                }else if(document.getElementById('payment_paysbuy').checked){
                    document.forms['payment_form'].action = "http://demo.paysbuy.com/paynow.aspx?psb=true&lang=t";
                    document.forms['payment_form'].submit();
                }else{
                    document.forms['payment_form'].action = "http://demo.paysbuy.com/paynow.aspx?cs=true&lang=t";
                    document.forms['payment_form'].submit();
                }
                
            },
            error: function (request, status, error) {
                alert ("Error: "+error+ "\nResponseText: "+request.responseText);
            }
        });
        
        /*if(document.getElementById('payment_transfer').checked){
            document.forms['payment_form'].action = "";
	    document.forms['payment_form'].submit();      
        }else if(document.getElementById('payment_credit').checked){
            document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?c=true";
	    document.forms['payment_form'].submit();
        }else if(document.getElementById('payment_paysbuy').checked){
            document.forms['payment_form'].action = "https://www.paysbuy.com/paynow.aspx?psb=true";
	    document.forms['payment_form'].submit();
        }*/
    }
</script>


<div class="grid_4 push_4 goback">
        <a href="?r=student/view&id=<?php echo Yii::app()->user->id;?>"><span></span>กลับสู่หน้าหลัก</a>
</div>
<div class="clear"></div>
<form name="payment_form" id="payment_form" method="post" action="" >
<div class="grid_10 push_1">
        <div class="credit_box">
                <div class="credit_pic">
                        <h2>เติมเครดิต</h2>
                </div>
                <div class="credit_select">
                        <h2>เลือกจำนวนเครดิตที่ต้องการเติม</h2>
                                <?php

                                $criteria = new CDbCriteria();
                                $criteria->select = '*';
                                $criteria->condition = 'credit_status=:status ';
                                $criteria->params=array(':status'=>1);
                                $criteria->order='credit_order';
                                $credits = Credit::model()->findAll($criteria);

                                ?>
                                <ul>

                                     <?php
                                     $i = 1;
                                     foreach($credits  as $credit) { ?>
                                        <li>
                                                <input type="radio" id="tick_<?php echo $i?>" name="tick" value="<?php echo $credit->credit_amount;?>"/>
                                                <input type="hidden" id="desc_<?php echo $i;?>" name="desc_<?php echo $i;?>" value="<?php echo $credit->credit_desc;?>"/>
                                                <input type="hidden" id="credit_<?php echo $i;?>" name="credit_<?php echo $i;?>" value="<?php echo $credit->credit_point;?>"/>
                                                <label for="tick_<?php echo $credit->credit_id;?>">
                                                <h3><?php echo number_format($credit->credit_point);?> เครดิต</h3>
                                                <p><?php echo number_format($credit->credit_amount);?> บาท</p>
                                                </label>
                                        </li>
                                     <?php $i++;} ?>
                                     <input type="Hidden" id="credit_point" Name="credit_point" value=""/>
                                </ul>
                        
                </div>
        </div>
</div>
<div class="clear"></div>
<div class="grid_10 push_1">
        <div class="credit_option">
                <div class="pay_select">
                                <h3>เลือกวิธีการชำระเงิน</h3>
                                <ul>
                                        <li>
                                                <input type="radio" name="payment_method" id="payment_transfer" value="Transfer"/>
                                                <label for="pay_id1">ชำระโดยโอนเงินผ่านบัญชีธนาคาร</label>
                                        </li>
                                        <li>
                                                <input type="radio" name="payment_method" id="payment_credit" value="Credit Card"/>
                                                <label for="pay_id2">ชำระผ่านบัตรเครดิต</label>
                                        </li>
                                        <li>
                                                <input type="radio" name="payment_method" id="payment_paysbuy" value="Paysbuy"/>
                                                <label for="pay_id3">ชำระผ่านบริการ PAYSBUY</label>
                                        </li>
                                        <li>
                                                <input type="radio" name="payment_method" id="payment_counter_service" value="counter_service"/>
                                                <label for="pay_id4">ชำระผ่านเคาน์เตอร์เซอร์วิส</label>
                                        </li>
                                </ul>
                                <input type="button" name="Submit" value="ยืนยันการชำระเงิน" onclick="checkSubmit();"/>
                       
                </div>
                <div class="pay_bank">

                        <h3>ข้อมูลสำหรับการโอนเงิน</h3>

                        <div class="bank">
                                <h4>ธนาคารกสิกรไทย</h4>
                                <p>สาขา สยามสแควร์</p>
                                <p>ประเภท บัญชีกระแสรายวัน</p>
                                <p>ชื่อบัญชี บริษัท เอ็ดดูเคชั่น สตูดิโอ จำกัด</p>
                                <p>เลขที่บัญชี 026-1-10869-0</p>
                        </div>

                </div>
        </div>
</div>

<input type="Hidden" Name="psb" value="psb"/>
<input Type="Hidden" Name="biz" value="kawiwan_merchant@paysbuy.com"/>
<!--<input Type="Hidden" Name="biz" value="kawiwan@paysbuy.com"/>-->
<input Type="Hidden" Name="inv" id="inv" value=""/>
<input Type="Hidden" Name="itm" id="itm" value=""/>
<input Type="Hidden" Name="amt" id="amt" value=""/>
<input Type="Hidden" Name="opt_fix_method" id="opt_fix_method" value="1"/>
<input Type="Hidden" Name="postURL" value="http://www.e-pretest.com/index.php/index.php?r=payment/result"/>
<input Type="Hidden" Name="reqURL" value="http://www.e-pretest.com/index.php/index.php?r=payment/result"/>
</form>