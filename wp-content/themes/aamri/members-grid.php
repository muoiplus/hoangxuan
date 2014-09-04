
<?php get_header(); ?>
<div id="content" class="ourmember_listing">
<div class="inner">
<h1 class="title"> <?php single_cat_title('',true); ?></h1>
<div class="title_filters"><a href="#1">Show filters</a></div>
<div class="filters"><?php echo do_shortcode( '[searchandfilter taxonomies="mem_categories,states" headings="Showing,in" submit_label="Apply Filter" ]' ); ?>
	<div class="mode_view">
    	<a href="/our-members-grid/" id="gridview" class="active" title="view as grid">gird</a>
        <a href="/our-members-list/" id="listview" title="view as list">List</a>
    </div>
    <div class="clear"></div>
</div>
  <div class="list_ourmember">
    <ul class="gridmode" id="modeview">
    <?php $i=1 ?>
    <?php global $query_string; query_posts( $query_string . '&orderby=title&order=ASC' );
        $membersGrid = new WP_query();
        $membersGrid -> query(array('category_name'=>'our-members','posts_per_page'=>9,'paged'=>$paged));
      while($membersGrid->have_posts()): $membersGrid->the_post();
     ?>
      <li class="<?php if(($i%3) == 0):?>last <?php endif; if(($i%2) == 0):?>two <?php else: ?>one<?php endif;?>">
        <div class="thumb grid"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_post_thumbnail('member-thumb-grid') ;?></a></div>
        <div class="title">
          <h3> <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
            <?php the_title();?></a>
          </h3>
           </div>
           <div class="siteadd">
          <a target="_blank" href="http://<?php the_field('website');?>"><?php the_field('website');?></a>
          </div>
          <div class="shortdes"><p><?php the_excerpt_max_charlength(165); ?></p></div>
          <div class="read_link">
          <a class="readmore" href="<?php the_permalink();?>">Read more</a> 
         </div>
         <?php $i++ ?>
        <?php endwhile; ?>
      </li>
    </ul>

  
  </div>
   <div class="paging"> 
 <?php if(function_exists('tw_pagination')) 
    tw_pagination($membersGrid);
?>
    </div>
       <div class="paging mobile">
          <?php if(function_exists('tw_pagination'))
          tw_pagination_mobile($membersGrid);
          ?>
    </div>
   <div class="clear btop"> <a href="#header" class="backtotop">top</a></div>
   </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
