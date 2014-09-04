<?php
include(TEMPLATEPATH . '/Mobile_Detect.php');
$detect = new Mobile_Detect;
?>
<?php

$currentUrl = $_SERVER["REQUEST_URI"];
if($detect->isMobile()){
    if(!isset($_GET['modeview'])){

        $newurl =$currentUrl.'?modeview=grid';
        header ("Location: $newurl");
    }
}else{
    if(!isset($_GET['modeview'])){

        $newurl =$currentUrl.'?modeview=list';
        header ("Location: $newurl");
    }
}
?>
<?php get_header(); ?>

<div id="content" class="ourmember_listing news_listing ">
    <div class="inner">
        <h1 class="title title_mobile"><?php single_cat_title('',true); ?></h1>
        <div class="left_sibar">
            <?php dynamic_sidebar( 'Left menu members' ); ?>
        </div>
        <div class="list_member">
            <div class="breadcrumbs">
                <?php if(function_exists('bcn_display'))
            {
                bcn_display();
            }?>
            </div>
            <h1 class="title title_desktop"><?php single_cat_title('',true); ?></h1>
            <div class="title_filters"><a href="#1">Show filters</a></div>
            <div class="filters"><?php echo do_shortcode( '[searchandfilter taxonomies="mem_categories,states" headings="Showing,in" submit_label="Apply Filter" ]' ); ?>
                <div class="mode_view">
                    <?php
                    //$currentUrl = $_SERVER["REQUEST_URI"];
                    if(strpos($currentUrl,'page')){
                        $url = strstr($currentUrl,'page',true);
                    }else{
                        $url = strstr($currentUrl,'?',true);
                    }
                    $modeview = $_GET['modeview'];
                    $_SESSION['modeview'] = $modeview;
                    if(isset($modeview)){
                        if($modeview=='grid'){
                            $perPage = get_option('posts_per_page');
                        }else if($modeview){
                            $perPage = 15;
                        }
                    }else{
                        $perPage=get_option('posts_per_page');
                    }
                    if($perPage==get_option('posts_per_page')){
                        $ulclass= 'gridmode';
                    }elseif($perPage==15){
                        $ulclass= 'listmode';
                    }
                    ?>
                    <a href="<?php echo $url.'?modeview=grid'?>" id="gridview" class="<?php if($perPage==get_option('posts_per_page')){ echo 'active';}?>" title="view as grid">gird</a>
                    <a href="<?php echo $url.'?modeview=list'?>" id="listview" class="<?php if($perPage==15){ echo 'active';}?>" title="view as list">List</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="list_ourmember">
            <ul class="<?php echo $ulclass;?>" id="modeview">
                <?php $i=1 ?>

                <?php global $query_string; query_posts( $query_string . '&orderby=title&order=ASC&posts_per_page='.$perPage ); ?>
                <?php if(have_posts()) : while(have_posts()) : the_post();  ?>

      <li class="<?php if(($i%3) == 0):?>last <?php endif; if(($i%2) == 0):?>two <?php else: ?>one<?php endif;?>">
        <?php if($perPage==get_option('posts_per_page')){?>
                    <div class="thumb grid"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_post_thumbnail('member-thumb-grid') ;?></a></div>
                    <?php }elseif($perPage==15){?>
                    <div class="thumb list"><a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>"> <?php the_post_thumbnail('member-thumb-list') ;?></a></div>
                    <?php } ?>
                <div class="title">
                    <h3> <a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>">
                        <?php the_title();?></a>
                    </h3> <div class="siteadd">
                    <a target="_blank" href="<?php $website = get_field('website');
                        if (strstr($website,"http://") != false) { the_field('website');}
                        else{echo "http://".$website;};?>">
                        <?php the_field('website');?>
                    </a>
                </div>
                </div>

                <?php if($perPage==get_option('posts_per_page')){?>
                    <div class="shortdes"><p><?php the_excerpt_max_charlength(165); ?></p></div>
                    <?php } ?>
                <div class="read_link">
                    <a class="readmore" href="<?php the_permalink();?>">Read more</a>
                </div>
                <?php $i++ ?>
                <?php endwhile; ?>
      </li>
    </ul>

    <?php else : ?>
                <p> There are no posts to display !</p>
                <?php endif; ?>

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
        <div class="clear"></div>
    </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>
