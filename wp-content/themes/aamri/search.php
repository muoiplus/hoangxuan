<?php get_header(); ?>

<div id="content" class="news_listing search_page">
<div class="inner">
   <div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
    </div>
  <h1 class="title">Showing
    <?php
$num_cb = $wp_query->post_count;
$id_cb = $paged;
$r_cb=1;
$startNum_cb = $r_cb;
$endNum_cb = get_option( 'posts_per_page' );
if($id_cb >=2) {
  $s_cb=$id_cb-1;
  $r_cb=($s_cb * get_option( 'posts_per_page' )) + 1;
  $startNum_cb=$r_cb;
  $endNum_cb=$startNum_cb + ($num_cb -1);
}
      global $wp_query;
if (have_posts()) :
 if($wp_query->found_posts<=get_option( 'posts_per_page' )){
     echo $wp_query->found_posts;
 }else{
     echo "<b>$startNum_cb-$endNum_cb</b>";
 }

endif;

$totaltime= number_format($load,4);

?>
    of 
	<?php
echo $wp_query->found_posts;?>
    Results for '<?php echo strip_tags($s); ?>'
  </h1>
  <div class="searchform_results">
    <form role="search" method="get" id="searchform_results" action="<?php echo home_url( '/' ); ?>">
      <div>
        <label class="screen-reader-text" for="s">Search again:</label>
        <input type="text" class="input_text" maxlength="45" placeholder="Enter search term" value="" name="s" id="s1" />
        <input type="submit" id="searchsubmit_results" class="button" value="Search" />
      </div>
    </form>
  </div>
  <div class="list_article">
    <ul>
      <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
      <li>
       <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail('category-thumb-list') ?></a>
        <div class="flowhidden">
        <span class="cat">
            <?php the_category(', ');?>
            </span>
         <h3><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title();?></a></h3>
         
           <div class="shortdes"><?php the_excerpt_max_charlength(200); ?></div>
          <a class="readmore" href="<?php the_permalink();?>">Read more</a>
           </div>
      </li>
      <?php endwhile; ?>
      <?php else : ?>
      <p> There are no results!</p>
      <?php endif; ?>
    </ul>
  </div>
  <div class="clear"></div>
  <div class="paging">
    <?php if(function_exists('tw_pagination')) 
    tw_pagination();
?>
  </div>
    <div class="paging mobile">
          <?php if(function_exists('tw_pagination'))
          tw_pagination_mobile();
          ?>
    </div>
  <div class="clear btop"> <a href="#header" class="backtotop">top</a></div>
  </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
