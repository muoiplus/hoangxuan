<?php /*
Template Name: Contact Content Page
*/
 ?>
<?php get_header(); ?>

<div class="news_detail contact_wrapper">
<div class="inner">
  <div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
    </div>
  <h1 class="title"><?php the_title(); ?></h1>
  <div class="content_contact" id="content" >
  <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
    <?php the_content(); ?>
    <?php endwhile; ?>  <?php endif; ?>
    <div class="clear"></div>
  </div>

  <div class="clear btop"> <a href="#header" class="backtotop">top</a></div>
  </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
