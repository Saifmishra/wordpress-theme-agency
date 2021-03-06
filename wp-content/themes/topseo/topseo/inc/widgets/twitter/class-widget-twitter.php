<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

if ( defined( 'FW' ) && function_exists( 'fw_ext_social_twitter_get_connection' ) && function_exists( 'curl_exec' ) ) {

	class Topseo_Widget_Twitter extends WP_Widget {

		/**
		 * @internal
		 */
		function __construct() {
			$widget_ops = array( 'description' => esc_html__('Twitter Feed', 'topseo') );
			parent::__construct( false, esc_html__( 'Twitter', 'topseo' ), $widget_ops );
		}

		/**
		 * @param array $args
		 * @param array $instance
		 */
		function widget( $args, $instance ) {
			extract( $args );

			$user          = esc_attr( $instance['user'] );
			$title         = esc_attr( $instance['title'] );
			$number        = ( (int) ( esc_attr( $instance['number'] ) ) > 0 ) ? esc_attr( $instance['number'] ) : 5;
			$title         = $before_title . $title . $after_title;


			$tweets = get_site_transient( 'scratch_tweets_' . $user . '_' . $number );

			if ( empty( $tweets ) ) {
				/* @var $connection TwitterOAuth */
				$connection = fw_ext_social_twitter_get_connection();
				$tweets     = $connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=" . $user . "&count=" . $number );
				set_site_transient( 'scratch_tweets_' . $user . '_' . $number, $tweets, 12 * HOUR_IN_SECONDS );
			}
			$view_path = get_template_directory()."/inc/widgets/twitter/views/widget.php";
			echo fw_render_view( $view_path, compact( 'before_widget', 'title', 'tweets', 'number', 'after_widget' ) );
		}

		function update( $new_instance, $old_instance ) {
			return $new_instance;
		}

		function form( $instance ) {
			$instance = wp_parse_args( (array) $instance, array( 'user' => '', 'number' => '', 'title' => '' ) );
			?>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title', 'topseo' ); ?> </label>
				<input type="text" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"
				       value="<?php echo esc_attr( $instance['title'] ); ?>" class="widefat"
				       id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'user' )); ?>"><?php esc_html_e( 'User', 'topseo' ); ?> :</label>
				<input type="text" name="<?php echo esc_attr($this->get_field_name( 'user' )); ?>"
				       value="<?php echo esc_attr( $instance['user'] ); ?>" class="widefat"
				       id="<?php echo esc_attr($this->get_field_id( 'user' )); ?>"/>
			</p>
			<p>
				<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"><?php esc_html_e( 'Number of tweets', 'topseo' ); ?>
					:</label>
				<input type="text" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>"
				       value="<?php echo esc_attr( $instance['number'] ); ?>" class="widefat"
				       id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>"/>
			</p>
		<?php
		}
	}

}
