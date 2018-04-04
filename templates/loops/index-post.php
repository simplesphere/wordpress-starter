<?php
/*
The Index Post (or excerpt)
===========================
Used by index.php, category.php and author.php
*/
?>

<article id="post-<?php the_ID(); ?>" class="article-listing d-flex flex-column">
  <div class="article-listing__image">
    <?php
      if (has_post_thumbnail()) {
        echo '<a href="'. get_the_permalink() . '">';
        the_post_thumbnail('homepage-list-post');
        echo '</a>';
      } else{
        echo '<a href="'. get_the_permalink() . '">';
        echo '<img src=" '. get_template_directory_uri() .'/assets/images/post-img.png" />';
        echo '</a>';
      }
    ?>
  </div>
  <div class="article-listing__content"> 
    <h3><?php echo '<a href="'. get_the_permalink() . '">' . get_the_title() .'</a>' ?></h3>
    <?php if ( has_excerpt( $post->ID ) ) {
      the_excerpt();
    ?>
    <p><a href="<?php the_permalink(); ?>"><?php _e( '&hellip; ' . __('Continue reading', 'b4st' ) . ' <i class="fas fa-arrow-right"></i>', 'b4st' ) ?></a></p>
    <?php } else {
      the_content( __( '&hellip; ' . __('Continue reading', 'b4st' ) . ' <i class="fas fa-arrow-right"></i>', 'b4st' ) );
    } ?>
  </div>
</article>
