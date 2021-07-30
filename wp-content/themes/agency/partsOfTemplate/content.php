

<div class="row row-cols-1 no-gutters">

    <!-- Blog Start -->
    <div class="blog-3 blog-details col" data-aos="fade-up">
        <div class="thumbnail">
            <img class="w-100" src="assets/images/blog/770/blog-1.jpg" alt="Blog Image">
        </div>
        <div class="info">
            <h3 class="title"> <?php the_title(); ?> </h3>
            <div class="desc">
                <p><?php the_content(); ?></p>
            </div>
            <ul class="meta mb-0 mt-12">
                <li><i class="fal fa-pencil-alt"></i><?php echo get_the_date(); ?></li>
                <li><i class="fas fa-tags"></i><?php the_category(', '); ?></li>
                <li><i class="fas fa-comments"></i><?php comments_number('0'); ?> Comments</li>
                <li class="media"><a href="#"><i class="fas fa-share-alt"></i>Share this post</a>
                    <div class="list">
                        <a href="<?php echo get_theme_mod('agency_footer_facebook') ?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo get_theme_mod('agency_footer_twitter') ?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo get_theme_mod('agency_footer_instagram') ?>"><i class="fab fa-instagram"></i></a>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Blog End -->

    <div class="entry-author">
        <div class="author-info">
            <div class="author-avatar">
                <?php echo get_avatar($author_ID, '', false); ?>
            </div>
            <div class="author-description">
                <h6 class="author-name"><?php the_author(); ?></h6>
                <span class="designation"> <?php echo get_the_author_meta('user_registered'); ?></span>
                <div class="author-biographical-info">
                   <?php echo get_the_author_meta('description'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-nav-links">
        <h4 class="title">Related Posts </h4>
        <div class="nav-list">

            <?php
            $categories = get_the_category();

            global $post;
            $relatedPost = new WP_Query([
                    'posts_per_page' => 2,
                    'post__not_in'   => [ $post->ID],
                    'cat'            => !empty($categories) ? $categories[0]-> term_id : null,
            ]);
            if( $relatedPost->have_posts() ) {
                while ( $relatedPost->have_posts() ){

                    $relatedPost->the_post();
                    ?>

                    <div class="nav-item prev">
                        <div class="inner">
                            <a href="#">
                                <?php the_post_thumbnail('', ['class'=>'hover-bg has-thumbnail'] ); ?>
                               <?php if(has_post_thumbnail()) ?>
                                <span class="cate"><?php echo $categories[0]-> name; ?></span>
                                <h6><?php the_title(); ?></h6>
                            </a>
                        </div>
                    </div>
            <?php
                }
                wp_reset_postdata();

            }
            ?>



        </div>
    </div>
<?php
if(comments_open() || get_comments_number()){
    comments_template();
}

 ?>

</div>