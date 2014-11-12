 <!-- CARUSEL: DYNAMIC IMAGES SCROLLING -->
 <?php if(count($images) >= 1):?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <?php if(count($images) >= 2):?>
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <?php for( $i=1; $i<count($images); $i++ ): ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>"></li>
            <?php endfor; ?>
        </ol>
      <?php endif;?>
      <div class="carousel-inner" role="listbox">
          <div class="item active">
              <a href="<?php echo $images[0]; ?>">
                  <img src="<?php echo $images[0]; ?>" alt="First slide">
              </a>
          </div>
          <?php for( $j=1; $j<count($images); $j++ ) :?>
          <div class="item">
              <a href="<?php echo $images[$j]; ?>">
                  <img src="<?php echo $images[$j]; ?>" alt="Second slide">
              </a>
          </div>
          <?php endfor; ?>
      </div>
      <?php if(count($images) >= 2):?>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
      </a>
      <?php endif;?>
  </div><!-- /.carousel -->
<?php endif; ?>