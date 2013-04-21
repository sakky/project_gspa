<?php
if((isset($_GET['lang']))&&($_GET['lang'] =='en')){
    $this->pageTitle=Yii::app()->name . ' - Gallery';
 
}else{
    $this->pageTitle=Yii::app()->name . ' - ภาพกิจกรรม';
    
}
$this->breadcrumbs=array(
	'Gallery',
);

?><!--==============================content================================-->
<div id="page3">
  <div class="main">
    <div class="indent-left">
      <h3>Gallery</h3>
      <div class="wrapper margin-bot">
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img1.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>HandyMan</h6>
          <p class="p2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img2.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Good Cook</h6>
          <p class="p2">Doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-2">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img3.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Photographer’s Portfolio</h6>
          <p class="p2">Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
          <a class="button" href="#">Read More</a> </article>
      </div>
      <div class="wrapper margin-bot">
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img4.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Hatha Yoga</h6>
          <p class="p2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img5.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Night Club</h6>
          <p class="p2">Doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-2">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img6.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Spa Salon</h6>
          <p class="p2">Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
          <a class="button" href="#">Read More</a> </article>
      </div>
      <div class="wrapper">
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img7.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Interior Design</h6>
          <p class="p2">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-1">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img8.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Hope Center</h6>
          <p class="p2">Doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
          <a class="button" href="#">Read More</a> </article>
        <article class="col-2">
          <div class="prev-indent-bot">
            <figure class="img-border"><a href="#"><img src="images/front/page3-img9.jpg" alt="" /></a></figure>
            <div class="clear"></div>
          </div>
          <h6>Progress Business Company</h6>
          <p class="p2">Inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
          <a class="button" href="#">Read More</a> </article>
      </div>
    </div>
  </div>
</div>