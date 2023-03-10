<?php
defined( 'ABSPATH' ) || die;

foreach ( $blocks as $block ) :
	if ( $block instanceof WP_Post ) :
		$template_type = get_post_meta( $block->ID, 'riode_template_type', true );
		?>
		<div class="block block-template">
			<img src="<?php echo RIODE_URI; ?>/assets/images/studio/<?php echo esc_attr( $template_type ); ?>.svg">
			<h5 class="block-title"><?php echo esc_html( $block->post_title ); ?></h5>
			<div class="block-actions" data-id="<?php echo esc_attr( $block->ID ); ?>" data-category="<?php echo esc_attr( $template_type ); ?>">
				<button class="btn btn-primary <?php echo boolval( $studio->new_template_mode ) ? 'select' : 'import'; ?>">
					<i class="fas fa-download"></i>
					<?php $studio->new_template_mode ? esc_html_e( 'Select', 'riode' ) : esc_html_e( 'Import', 'riode' ); ?>
				</button>
			</div>
		</div>
		<?php
	else :
		$class = 'block block-online';

		if ( isset( $block['h'] ) && ( 80 >= (int) $block['h'] || 500 <= (int) $block['h'] ) ) {
			$class .= ' center';
		}
		if ( isset( $favourites_map[ $block['block_id'] ] ) ) {
			$class .= ' favour';
		}
		?>
		<div class="<?php echo esc_attr( $class ); ?>">
			<img src="<?php echo esc_url( 'https://d-themes.com/wordpress/riode/dummy/images/studio/' . intval( isset( $block['s'] ) ? $block['s'] : $block['block_id'] ) . '.jpg' ); ?>" alt="<?php echo esc_attr( $block['t'] ); ?>"<?php echo isset( $block['w'] ) && $block['w'] ? ' width="' . intval( $block['w'] ) . '"' : '', isset( $block['h'] ) && $block['h'] ? ' height="' . intval( $block['h'] ) . '"' : ''; ?>>
			<h5 class="block-title"><?php echo esc_html( $block['t'] ); ?></h5>
			<div class="block-actions" data-id="<?php echo esc_attr( $block['block_id'] ); ?>" data-category="<?php echo esc_attr( $block['c'] ); ?>">
				<button class="btn btn-dark favourite"><i class="far fa-heart"></i><?php esc_html_e( 'Favourite', 'riode' ); ?></button>
				<?php if ( ( function_exists( 'Riode' ) && Riode()->is_registered() || get_option( 'riode_registered' ) ) ) : ?>
					<button class="btn btn-primary <?php echo boolval( $studio->new_template_mode ) ? 'select' : 'import'; ?>">
						<i class="fas fa-download"></i>
						<?php $studio->new_template_mode ? esc_html_e( 'Select', 'riode' ) : esc_html_e( 'Import', 'riode' ); ?>
					</button>
				<?php endif; ?>
			</div>
		</div>
		<?php
	endif;
endforeach;
