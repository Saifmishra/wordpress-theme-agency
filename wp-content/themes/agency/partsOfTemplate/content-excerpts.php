<div class="row row-cols-1 no-gutters">

    <!-- Blog Start -->
    <div class="blog-3 col" data-aos="fade-up">
        <div class="thumbnail">
            <a href="blog-details.html" class="image">

                <?php

                if(has_post_thumbnail()){
                    the_post_thumbnail('100%');
                }



                ?>
            </a>
        </div>
        <div class="info">
            <ul class="meta">
                <li><i class="fal fa-pencil-alt"></i><?php echo get_the_date(); ?></li>
                <style>

                </style>
                <li><i class="fas fa-tags"></i> <?php the_category(' '); ?> </li>
                <li><i class="fas fa-comments"></i><?php comments_number(); ?> Comments</li>
            </ul>
            <h3 class="title"><a href=" <?php echo the_permalink(); ?> "> <?php the_title(); ?> </a></h3>
            <div class="desc">
                <p><?php the_excerpt(); ?></p>
            </div>
            <a href="<?php echo the_permalink(); ?> " class="btn btn-primary btn-hover-secondary mt-6">Read More</a>
        </div>
    </div>

</div>
