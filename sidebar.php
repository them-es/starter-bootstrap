<?php
/**
 * Sidebar Template
 */

if ( is_active_sidebar('primary_widget_area') || is_archive() || is_single()  ):

?>

<div id="sidebar" class="col-lg-4 col-lg-pull-8 col-md-4 col-md-pull-8 col-sm-12">
	
	<?php if ( is_active_sidebar('primary_widget_area') ) : ?>

		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'primary_widget_area' ); ?>

			<?php if ( current_user_can('manage_options') ) : ?>
				<a href="<?php echo admin_url( 'widgets.php' ); ?>" class="badge badge-info">Edit</a><!-- Show Edit Widget link -->
			<?php endif; ?>
		</div><!-- .widget-area -->

	<?php elseif ( is_archive() || is_single() ) : ?>
		
		<div class="well sidebar-nav">
			<div id="primary-two" class="widget-area">
				<?php
                    $content = '<ul class="recentposts">';
                        $content .= '<li><h3>' . __('Recent Posts', 'my-theme') . '</h3></li>';
                        $recentposts_query = new WP_Query( "posts_per_page=5" );// max 5 posts in Sidebar!
                        $month_check = null;
                        if ( $recentposts_query->have_posts() ) : while ( $recentposts_query->have_posts() ) : $recentposts_query->the_post();
                            $content .= '<li>';
                                // Show monthly archive and link to months
                                $month = get_the_date('F, Y');
                                if ($month !== $month_check) : $content .= '<p><a href="' . get_month_link( get_the_date('Y'), get_the_date('m') ) . '" title="' . get_the_date('F, Y') . '">' . $month . '</a></p>'; endif;
                                $month_check = $month;
                            $content .= '<h4><a href="' . get_the_permalink() . '" title="' . sprintf( __('Permalink to %s', 'my-theme'), the_title_attribute('echo=0') ) . '" rel="bookmark">' . get_the_title() . '</a></h4>';
                            $content .= '</li>';
                        endwhile; endif; wp_reset_postdata(); // end of the loop.
                    $content .= '</ul>';

                    //$content = ob_get_clean();
                    echo $content;
                ?>
				<br />
				<ul>
					<li><h3 class="border-bottom"><?php _e('Categories', 'my-theme'); ?></h3></li>
					<?php
						wp_list_categories("&title_li=");
					?>
					
					<?php if ( !is_author() ) : ?>
						<li>&nbsp;</li>
						<li><a href="<?php echo home_url( '/blog/' ); ?>" class="btn btn-default"><?php _e('more', 'my-theme'); ?></a></li>
					<?php endif; ?>
				</ul>
			</div><!-- /#primary-two -->
		</div>
	
	<?php endif; ?>
	
</div><!-- /#sidebar -->

<?php endif; ?>