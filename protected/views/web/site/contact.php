<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.googlemaps1.01.js"></script>
<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;hl=en&amp;sensor=true&amp;key=ABQIAAAAWCGzSMrk7YDL2KSdECDFthRCU6CW1wRB4NQsX5PSi053h5zzZhQIZ5ivn4VAQx53xyYuNrvkOmgO1w" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#map_canvas').googleMaps({
        latitude: 40.68221,
        longitude: -73.971212,
        markers: {
            latitude: 40.68221,
            longitude: -73.971212
        }
    });
});
</script>

<section id="content">
  <div class="main">
    <div class="indent-left">
      <div class="wrapper">
        <article class="col-1">
          <h3>Our Address</h3>
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
          <h3>Get In Touch</h3>
          <form id="contact-form" action="#">
            <fieldset>
              <label>
                <input type="text" value="Name" onBlur="if(this.value=='') this.value='Name'" onFocus="if(this.value =='Name' ) this.value=''" />
              </label>
              <label>
                <input type="text" value="Email" onBlur="if(this.value=='') this.value='Email'" onFocus="if(this.value =='Email' ) this.value=''" />
              </label>
              <label>
                <input type="text" value="Phone" onBlur="if(this.value=='') this.value='Phone'" onFocus="if(this.value =='Phone' ) this.value=''" />
              </label>
              <textarea onBlur="if(this.value=='') this.value='Message'" onFocus="if(this.value =='Message' ) this.value=''">Message</textarea>
              <div class="buttons-wrapper"> <a class="button">Clear</a> <a class="button">Send</a> </div>
            </fieldset>
          </form>
        </article>
      </div>
    </div>
  </div>
</section>


