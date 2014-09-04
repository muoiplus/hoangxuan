
<?php get_header(); ?>

<div class="news_detail">
<div class="inner">
  
     <h1 class="title title_mobile">
    <?php the_title(); ?>
  </h1>

  <div class="left_sibar">
    <?php if(in_category('about-us-cat')){
    dynamic_sidebar( 'Left menu About us' );
  }
  elseif (in_category('health-and-medical-research')) {
     dynamic_sidebar( 'Health & Medical Research' );
  }
   elseif (in_category('members') || in_category('our-members')) {
    dynamic_sidebar( 'Left menu members' );
  }
   elseif (in_category('news-events') || in_category('aamri-news') || in_category('newsletter') || in_category('events')) {
    dynamic_sidebar( 'Left menu News Events' ); 
  }
   elseif (in_category('policy-advocacy') || in_category('submissions') || in_category('policy-papers')) {
    dynamic_sidebar( 'Left menu Policy & Advocacy' ); 
  } elseif (in_category('publications') || in_category('fact-sheets') || in_category('reports') || in_category('strategic-plan')) {
    dynamic_sidebar( 'Left menu Publications' ); 
  } 
  ?>  <div class="content_slider mobile"></div>
     <div class="cta_wrapper">
      <?php if(get_field('cta_button')==true):?>
      <div class="cta_button">
        <h2 class="widgettitle"><?php the_field('title_cta'); ?></h2>
      <div class="textwidget"><div class="cta_banner">
       <?php the_field('content_cta'); ?></div>
      </div>
    </div>
    <?php endif;?>
    
    <div class="social_block clear">
    <?php include(TEMPLATEPATH . '/social.php')?>
    </div>
  </div>
  </div>
  <div class="content_article" id="content" > 
    <div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
  <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
    <h1 class="title title_desktop">
    <?php the_title(); ?>
  </h1>
  <div class="content_slider desktop"></div>
    <?php the_content(); ?>
    <?php if ( ! empty( $meta['title'] ) )
$title = $meta['title'];?>
    <?php endwhile; ?>  <?php endif; ?>
    <?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
  <div class="attachments">
      <?php while( $attachments->get() ) : ?>
      <a target="_blank" href="<?php echo $attachments->url(); ?>"><span class="img_file"><img src="<?php bloginfo('template_url')?>/images/file_m.png"/></span>
         <span class="flowhidden_file">
          <span class="title_file"><?php echo $attachments->field( 'title' ); ?></span><br>
          <span class="size_file"><?php echo $attachments->subtype(); ?>&nbsp;<span class="size"><?php echo $attachments->filesize(); ?></span></span>
           </span>
         </a>
     
    <?php endwhile; ?>
  </div>
<?php endif; ?>
  </div>

  <div class="clear btop"> <a href="#header" class="backtotop">top</a></div>
  </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
<script type="text/javascript">
    jQuery(document).ready(function(e) {
        jQuery('.mejs-mediaelement').each(function(){
            var title = jQuery(this).find('audio').attr('title');
            var a = jQuery(this).next().next().find('.mejs-playpause-button');
            jQuery('<div id="title-audio">'+title+' -</div>').insertAfter(a);
        })
    })
</script>