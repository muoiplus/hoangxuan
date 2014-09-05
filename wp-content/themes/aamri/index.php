<?php get_header(); ?>
<?php include(TEMPLATEPATH . '/homeslider.php')?>

<div id="content" class="clear">
  <div class="inner">
  <div class="left_home">
  <div class="aarmi_news">
   <?php
    // Get the ID of a given category
    $category_id = get_cat_ID( 'AAMRI News' );

    // Get the URL of this category
    $category_link = get_category_link( $category_id );
?>
    <ul>
    <?php 
		$ARnewsHome = new WP_Query( array( 
			'showposts' => 4,
			'category_name'=> 'aamri-news'
		) );	
	 while($ARnewsHome->have_posts()): $ARnewsHome->the_post();?>
      <li> 
          <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail('thumbnail') ?></a>
        <div class="flowhidden">
        <h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php echo get_post_meta(get_the_ID(), "date_event", TRUE); ?> </a></h3></br>
        <p><?php echo get_post_meta(get_the_ID(), "month_event", TRUE); ?></p>
        
        <a class="readmore" href="<?php the_permalink() ?>">MORE</a> </div></li>
	<?php endwhile; ?>
    </ul> <div class="clear"></div>

    <div class="clear"></div>
  </div>
  <div class="meltwater_news">
    <div id="sector_news" class="ls-news">
        <h2 class="title">Tin học tập</h2>
        <ul>
            <li>
                <h3>Lịch trình nộp hồ sơ du học</h3>
                <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
            </li>
            <li>
                <h3>Lịch trình nộp hồ sơ du học</h3>
                <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
            </li>
            <li>
                <h3>Lịch trình nộp hồ sơ du học</h3>
                <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
            </li>
            <li>
                <h3>Lịch trình nộp hồ sơ du học</h3>
                <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
            </li>
        </ul>
    </div>
      <div class="ls-news">
          <div class="wrap-img">
              <img src="images/news-img.jpg"/>
          </div>
          <h2 class="title">Tin du học</h2>
          <ul>
              <li>
                  <h3>Lịch trình nộp hồ sơ du học</h3>
                  <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
              </li>
              <li>
                  <h3>Lịch trình nộp hồ sơ du học</h3>
                  <p>Trường ĐH Công lập Singapore BCA - ... nhận hồ sơ du học từ</p>
              </li>
          </ul>
      </div>
      <div class="ls-news">
          <h2 class="title">Đăng ký nhận thông tin</h2>
          <form>
              <input type="radio" id="buudien-email">
              <label for="buudien-email">Bưu điện và email</label>
              <input type="radio" id="input-email">
              <label for="input-email">Email</label>
              <input type="text" placeholder="*Họ">
              <input type="text" placeholder="*Tên">
              <input type="text" placeholder="*Địa chỉ">
              <input type="text" placeholder="*Quận">
              <input type="text" placeholder="*Thành phố/Tỉnh">
              <input type="text" placeholder="*Điện thoại">
              <input type="text" placeholder="*Email">
              <input type="submit" value="Gửi">
          </form>
      </div>
  </div>
  <div class="clear"></div>
  </div> <div class="clear btop" style="margin:0"> <a href="#header" class="backtotop home">top</a></div>
  
</div>
<?php get_footer(); ?>