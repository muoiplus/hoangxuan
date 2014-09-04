
<?php get_header(); ?>

<div class="news_detail contact_wrapper">
<div class="inner">
  <h1 class="title">
    <?php echo "Not Found"; ?>
  </h1>
  <div class="content_contact" id="content" >
  	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?' ); ?></p>
  <div class="searchform_results">
    <form role="search" method="get" id="searchform_results" action="<?php echo home_url( '/' ); ?>">
      <div>
        <input type="text" class="input_text" placeholder="Enter search term" value="" name="s" id="s" />
        <input type="submit" id="searchsubmit_results" class="button" value="Search" />
      </div>
    </form>
  </div>
    <div class="clear"></div>
  </div>

  </div>
</div>
<!-- /.container -->

<?php get_footer(); ?>

