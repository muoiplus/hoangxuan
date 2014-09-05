<?php get_header(); ?>
<?php include(TEMPLATEPATH . '/homeslider.php')?>

<div id="content" class="clear">
  <div class="inner">
  <div class="left_home">
  <div class="aarmi_news">
    <ul>
    <?php 
		$ARnewsHome = new WP_Query( array( 
			'showposts' => 4,
			'event-to-chuc-lop-hoc'=> 'aamri-news'
		) );	
	 while($ARnewsHome->have_posts()): $ARnewsHome->the_post();?>
      <li> 
          <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail('post-thumb-event') ?></a>
        <div class="flowhidden">
        <h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php echo get_post_meta(get_the_ID(), "date_event", TRUE); ?> </a></h3></br>
        <p><?php echo get_post_meta(get_the_ID(), "month_event", TRUE); ?></p>

        <?php the_excerpt_max_charlength(200); ?>
        </br>
        <a class="readmore" href="<?php the_permalink() ?>">MORE</a> </div></li>
	<?php endwhile; ?>
    </ul> <div class="clear"></div>

    <div class="clear"></div>
  </div>
  <div class="meltwater_news">
    <div id="sector_news" class="ls-news">
        <h2 class="title">Tin học tập</h2>
        <ul>
            <?php
            $ARnewsHome = new WP_Query( array(
                'showposts' => 4,
                'category_name'=> 'tin-hoc-tap'
            ) );
            while($ARnewsHome->have_posts()): $ARnewsHome->the_post();?>
            <li>
                <h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></h3>
                <p><?php the_excerpt_max_charlength(80); ?></p>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
      <div class="ls-news">
          <div class="wrap-img">
              <img src="<?php bloginfo('template_url')?>/images/news-img.jpg"/>
          </div>
          <h2 class="title">Tin du học</h2>
          <ul>
                <?php
                $ARnewsHome = new WP_Query( array(
                    'showposts' => 2,
                    'category_name'=> 'tin-du-hoc'
                ) );
                while($ARnewsHome->have_posts()): $ARnewsHome->the_post();?>
                  <li>
                      <h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></h3>
                      <p><?php the_excerpt_max_charlength(80); ?></p>
                  </li>
            <?php endwhile; ?>
          </ul>
      </div>
      <div class="ls-news">
          <h2 class="title">Đăng ký nhận thông tin</h2>
          <?php echo do_shortcode( '[contact-form-7 id="210" title="Contact form 1"]' ); ?>
      </div>
  </div>
  <div class="clear"></div>
  
</div>
<?php get_footer(); ?>