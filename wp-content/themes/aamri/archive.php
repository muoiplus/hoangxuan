<?php get_header(); ?>
<div id="content" class="news_listing">
<div class="inner">
<h1 class="title"> <?php single_cat_title('',true); ?></h1>
  <div class="left_sibar">
    <?php dynamic_sidebar( 'News listing left sidebar' ); ?>
  </div>
  <div class="list_article">
    <ul>
      <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
      <li>
         <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail('category-thumb-list')?></a>
        <div class="flowhidden">
        <h3> <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h3>
        <span class="date"><?php the_time('jS F, Y');echo('&nbsp;<span class="dot">&middot;</span>&nbsp;');the_category(', ');?> </span>
          <div class="shortdes">
          <?php the_excerpt_max_charlength(200);?>
            </div>
        <a class="readmore" href="<?php the_permalink() ?>">Read more</a>
         </div>
      </li> 
    <?php endwhile; ?>
    </ul>
     
    <?php else : ?>
    <p> There are no posts to display !</p>
    <?php endif; ?>
  
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
