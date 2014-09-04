
<?php get_header();
session_start();
$parentCat = $_SESSION['currentCat'];

$inCatAbout = array('About Us');
$inCatHM = array('Health & Medical Research');
$inCatMember = array('Members','Our Members');
$inCatNews = array('News & Events','AAMRI News','Media Releases','News Clippings','Newsletters');
$inCatPoAd = array('Policy & Advocacy','Submissions','Policy Papers');
$inCatPub = array('Publications','Fact Sheets','Reports','Corporate Documents');

 ?>

<div class="news_detail">
<div class="inner">
  
     <h1 class="title title_mobile"><?php the_title(); ?></h1>
  <div class="left_sibar">
    <?php if ($parentCat || $parentCat != "") {
     
      if(in_array($parentCat, $inCatAbout)){
        dynamic_sidebar( 'Left menu About us' );
      }
      elseif (in_array($parentCat, $inCatHM)) {
         dynamic_sidebar( 'Health & Medical Research' );
      }
       elseif (in_array($parentCat, $inCatMember)) {
        dynamic_sidebar( 'Left menu members' );
      }
       elseif (in_array($parentCat, $inCatPoAd)) {
        dynamic_sidebar( 'Left menu Policy & Advocacy' ); 
      } elseif (in_array($parentCat, $inCatPub)) {
        dynamic_sidebar( 'Left menu Publications' ); 
      }elseif(in_array($parentCat, $inCatNews)){
        dynamic_sidebar( 'Left menu News Events' ); 
      }
      session_unset(); 
  }else {

          if(in_category('about-us-cat')){
          dynamic_sidebar( 'Left menu About us' );
        }
        elseif (in_category('health-and-medical-research')) {
           dynamic_sidebar( 'Health & Medical Research' );
        }
         elseif (in_category('members') || in_category('our-members')) {
          dynamic_sidebar( 'Left menu members' );
        }
         elseif (in_category('news-events') || in_category('aamri-news') || in_category('newsletter') || in_category('events')|| in_category('media-releases-news-events')|| in_category('news-clippings')) {
          dynamic_sidebar( 'Left menu News Events' ); 
        }
         elseif (in_category('policy-advocacy') || in_category('submissions') || in_category('policy-papers')) {
          dynamic_sidebar( 'Left menu Policy & Advocacy' ); 
        } elseif (in_category('publications') || in_category('fact-sheets') || in_category('reports') || in_category('strategic-plan')|| in_category('corporate-documents')) {
          dynamic_sidebar( 'Left menu Publications' ); 
        } 
  }
  ?>
  <div class="content_slider mobile"></div>
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
    <h1 class="title title_desktop"><?php the_title(); ?></h1>
  <p class="date_title"><strong><?php if (!in_category('our-members') && !in_category('about-us-cat') && !in_category('health-and-medical-research') && !in_category('members') && !in_category('policy-advocacy') ) { the_time('jS F, Y'); } ?>  </strong></p>
  <div class="content_slider desktop"></div>
    <?php the_content(); ?>
    <?php if ( ! empty( $meta['title'] ) )
$title = $meta['title'];?>
    <?php endwhile; ?>  <?php endif; ?>

    <?php         
$summary = get_field('summary');
$summarySize = size_format(filesize( get_attached_file( $summary['id'] ) ));

$report = get_field('full_report');
$reportSize = size_format(filesize( get_attached_file( $report['id'] ) ));

?>

<?php if($summary || $report) {?>
  <div class="attachments">
    <?php if($summary) {?>
 
      <a target="_blank" href="<?php echo $summary['url'] ?>"><span class="img_file"><img src="<?php bloginfo('template_url')?>/images/file_m.png"/></span>
         <span class="flowhidden_file">
          <span class="title_file">Summary</span><br>
          <span class="size_file"><?php echo $summarySize;?></span>
           </span>
         </a>
         <?php }?>
    <?php if($report) {?>
     <a target="_blank" href="<?php echo $report['url'] ?>"><span class="img_file"><img src="<?php bloginfo('template_url')?>/images/file_m.png"/></span>
         <span class="flowhidden_file">
          <span class="title_file"><?php 
          $cats = get_the_category();
          $downloadLink='';
          $dowloadCats = array('Submissions','Policy Papers','Reports','Fact Sheets','Corporate Documents');
          foreach ($cats as $cat) {
              if(in_array($cat->name, $dowloadCats)){
                  $downloadLink = $cat->name;
                  break;
              }
          }
         echo substr($downloadLink, 0, -1); ?></span><br>
          <span class="size_file"><?php echo $reportSize;?></span>
           </span>
         </a>
         <?php }?>
  </div>
<?php }?>

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

 <?php if(get_field('website')){?>
       <div class="siteadd">
          <a target="_blank" href="http://<?php the_field('website');?>"><?php the_field('website');?></a>
          </div>
        <?php }?>
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