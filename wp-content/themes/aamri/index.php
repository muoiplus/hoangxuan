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
    <div id="sector_news">
    </div>
  </div>
  <div class="clear"></div>
  </div> <div class="clear btop" style="margin:0"> <a href="#header" class="backtotop home">top</a></div>
  
</div>
<?php get_footer(); ?>