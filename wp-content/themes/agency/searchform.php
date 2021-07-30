
<div class="sidebar-widget">
    <div class="sidebar-widget-content">
        <div class="sidebar-widget-search">
            <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
                <input type="text" placeholder="Search..." <?php the_search_query(); ?> name="s" id="<?php echo $unique_id ?>">
                <button><i class="fas fa-search"></i></button>
            </form>
        </div>
    </div>
</div>
