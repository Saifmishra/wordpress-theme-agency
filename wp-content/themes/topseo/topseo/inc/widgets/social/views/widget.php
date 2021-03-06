<?php if ( ! defined( 'ABSPATH' ) ) { die( 'Direct access forbidden.' ); }

/**
 * @var $instance
 * @var $before_widget
 * @var $after_widget
 * @var $title
 */


?>
<?php if ( ! empty( $instance ) ) : ?>
	<?php echo wp_kses_post($before_widget ); ?>
	<div class="wrap-social">
		<?php echo wp_kses_post($title); ?>
		<ul>
			<?php foreach ( $instance as $key => $value ) :
				if ( empty( $value ) ) {
					continue;
				}
				?>
				<li>
					<a href="<?php echo esc_attr( $value ); ?>" class="btn-share" target="_blank">
						<i class="fa-<?php echo esc_attr($key); ?>"></i>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php echo wp_kses_post($after_widget); ?>
<?php endif; ?>