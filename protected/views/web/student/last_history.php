<div class="history_header">
        <h2 class="history">ประวัติล่าสุด</h2>
        <a class="view_all" href="index.php?r=student/history">ดูทั้งหมด</a>
</div>
<table cellspacing="0">
        <tbody>
                <tr class="title_table">
                        <th width="20%">ข้อสอบ</th>
                        <th>กลุ่มวิชา</th>
                        <th>วันที่ทำ</th>
                        <th>คะแนนเฉลี่ย</th>
                        <th>คะแนนที่ได้</th>
                </tr>
                <?php
                if(($TestRecord)){
                     //echo "<pre>", print_r($TestRecord), "</pre>";
                     foreach($TestRecord  as $Test) {?>

                <tr>
                        <td><?php echo $Test['type_name'];?></td>
                        <td><?php echo $Test['sub_name'];?></td>
                        <td><?php echo date('d M Y',strtotime($Test['date_attended']));?></td>
                        <td><?php echo intval($Test['score_avg']);?>/<?php echo intval($Test['score_total']);?></td>
                        <td><?php echo intval($Test['score']);?>/<?php echo intval($Test['score_total']);?></td>
                </tr>
                <?php }}else{?>   
                <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>
                <tr>
                        <td colspan="5">ยังไม่มีประวัติการทำข้อสอบ</td>
                </tr>
                <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                </tr>

                <?php }?>
        </tbody>
</table>