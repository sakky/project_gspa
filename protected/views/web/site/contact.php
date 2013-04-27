<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.googlemaps1.01.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;hl=en&amp;sensor=true&amp;key=ABQIAAAAWCGzSMrk7YDL2KSdECDFthRCU6CW1wRB4NQsX5PSi053h5zzZhQIZ5ivn4VAQx53xyYuNrvkOmgO1w" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#map_canvas').googleMaps({
        latitude: 13.285964,
        longitude: 100.924763,
        markers: {
            latitude: 13.285964,
            longitude: 100.924763
        }
    });
});
</script>

<section id="content">
  <div class="main">
    <div class="indent-left">
      <div class="wrapper">
        <article class="col-1">
          <h3>ที่ตั้งวิทยาลัย</h3>
          <div class="p1">
            <figure class="img-border">
              <div id="map_canvas"></div>
            </figure>
            <div class="clear"></div>
          </div>
          <dl>
            <dt>168 ถ.ลงหาดบางแสน ต.แสนสุข <br>
            อ.เมือง จ.ชลบุรี 20131</dt>
            <dd><span>Telephone:</span> 038-393-260 (Auto 5 lines)</dd>
            <dd><span>FAX:</span> 038-745-851-2 Ext. 120</dd>
            <dd><span>E-mail:</span> <a class="link-2" href="#">mail@xxx.com</a></dd>
          </dl>
        </article>
        <article class="col-2">
          <h3>ติดต่อเรา</h3>
          <form id="contact-form" action="#">
            <fieldset>
              <label>
                <input type="text" value="ชื่อผู้ติดต่อ" onBlur="if(this.value=='') this.value='ชื่อผู้ติดต่อ'" onFocus="if(this.value =='ชื่อผู้ติดต่อ' ) this.value=''" />
              </label>
              <label>
                <input type="text" value="อีเมล์" onBlur="if(this.value=='') this.value='อีเมล์'" onFocus="if(this.value =='อีเมล์' ) this.value=''" />
              </label>
              <label>
                <input type="text" value="เบอร์โทรศัพท์" onBlur="if(this.value=='') this.value='เบอร์โทรศัพท์'" onFocus="if(this.value =='เบอร์โทรศัพท์' ) this.value=''" />
              </label>
              <textarea onBlur="if(this.value=='') this.value='ข้อความ'" onFocus="if(this.value =='ข้อความ' ) this.value=''">ข้อความ</textarea>
              <div class="buttons-wrapper"> <a class="button">ล้างข้อความ</a> <a class="button">ส่งข้อความ</a> </div>
            </fieldset>
          </form>
        </article>
      </div>
    </div>
  </div>
</section>


