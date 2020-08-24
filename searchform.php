<?php
/**
 * The template for displaying search forms
 */
?>
<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<!--label for="s" class="assistive-text"><?php _e( 'Search', 'my-theme' ); ?></label-->
	<div class="row">
		<div class="col-md-6">
			<div class="input-group">
				<input type="text" name="s" id="s" class="form-control" placeholder="<?php _e( 'Search', 'my-theme' ); ?>" />
				<div class="input-group-append">
					<button type="submit" class="btn btn-secondary" name="submit" id="searchsubmit"><?php _e( 'Search', 'my-theme' ); ?></button>
				</div><!-- /.input-group-append -->
			</div><!-- /.input-group -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</form>
