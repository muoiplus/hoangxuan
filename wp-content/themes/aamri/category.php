<?php get_header(); ?>
<div id="content" class="news_listing">
<div class="inner">
  <h1 class="title title_mobile"><?php single_cat_title('',true); ?></h1>
  <div class="left_sibar">
    <?php 
    $parentIdNews = get_category_by_slug('news-events')->term_id;
    $parentIdPub = get_category_by_slug('publications')->term_id;
    $parentIdPol = get_category_by_slug('policy-advocacy')->term_id;
    if (cat_is_ancestor_of($parentIdNews, $cat)) {
     dynamic_sidebar( 'Left menu News Events' ); 
    } 
    elseif (cat_is_ancestor_of($parentIdPub, $cat)) {
       dynamic_sidebar( 'Left menu Publications' ); 
    }
    elseif (cat_is_ancestor_of($parentIdPol, $cat)) {
      dynamic_sidebar( 'Left menu Policy & Advocacy' ); 
    }
     dynamic_sidebar( 'News listing left sidebar' ); ?>
  </div> 
  <?php // session_start();
  //$_SESSION['currentCat'] =  get_cat_name( $cat);
  $category_id = get_query_var('cat');
  $arr = explode('/', get_category_link($category_id));
  $newArr = array($arr[4],$arr[5]);
  $linkPostFirst = '/'.implode('/', $newArr).'/';
  ?>
  <div class="list_news">
       <div class="breadcrumbs">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
    </div>
<h1 class="title title_desktop"><?php single_cat_title('',true); ?></h1>
  <div class="list_article">
    <ul>
      <?php if(have_posts()) : while(have_posts()) : the_post();  ?>
      <li>
        <?php 
          $cats = get_the_category();
          $downloadLink='';
          $dowloadCats = array('Submissions','Policy Papers','Reports','Fact Sheets','Corporate Documents');
          foreach ($cats as $cat) {
              if(in_array($cat->name, $dowloadCats)){
                  $downloadLink = $cat->name;
                  break;
              }
          }
          $linkPostFull = $linkPostFirst.basename(get_permalink());
        ?>
         <a href="<?php echo $linkPostFull;?>" title="<?php the_title_attribute();?>"><?php the_post_thumbnail('category-thumb-list')?></a>
        <div class="flowhidden">
        <h3> <a href="<?php echo $linkPostFull;?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a></h3>
        <span class="date"><?php the_time('jS F, Y');echo('&nbsp;<span class="dot">&middot;</span>&nbsp;');the_category(', ');?> </span>
          <div class="shortdes">
          <?php the_excerpt_max_charlength(200); ?>
            </div>
        <?php         
        $summary = get_field('summary');
        $summarySize = size_format(filesize( get_attached_file( $summary['id'] ) ));
        $report = get_field('full_report');
        $reportSize = size_format(filesize( get_attached_file( $report['id'] ) ));
        ?>
        <div class="file_listing"><a class="readmore" href="<?php echo $linkPostFull;?>">Read more</a>
          <?php if($summary) {?>
           <a target="_blank" href="<?php echo $summary['url'] ?>"><span class="img_file"><img src="<?php bloginfo('template_url')?>/images/file_new.png"/></span><span class="title_file">Download summary</span></a>
          <?php }?>
          <?php if($report) {?>
           <a target="_blank" href="<?php echo $report['url'] ?>"><span class="img_file"><img src="<?php bloginfo('template_url')?>/images/file_new.png"/></span><span class="title_file">Download <?php $category = get_the_category(); $dlName = substr($downloadLink, 0, -1); if ($dlName == 'Corporate Document') {
             echo "Document";} else {echo $dlName;} ?></span></a>
          <?php }?>
        </div>
         </div>
      </li> 
	  <?php endwhile; ?>
    </ul>
     
    <?php else : ?>
    <p> There are no posts to display !</p>
    <?php endif; ?>
  
  </div>
    <div class="clear"></div>
 
   </div>
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
