<div class="sow-headline-container <?php if( $instance['fittext'] ) ?>">
	<?php foreach( $order as $item ) {
		switch( $item ) {
			case 'headline' :
				if( !empty( $headline ) ) {
					echo '<' . $headlineTag . ' class="sow-headline">' . wp_kses_post( $headline ) . '</' . $headlineTag . '>';
				}
			break;
			case 'divider' :
				if( $hasDivider ) {
					?>
					<div class="decoration">
						<div class="decoration-inside"></div>
					</div>
					<?php
				}
			break;
			case 'sub_headline' :
				if( !empty( $subHeadline ) ) {
					echo '<' . $subHeadlineTag . ' class="sow-sub-headline">' . wp_kses_post( $subHeadline ) . '</' . $subHeadlineTag . '>';
				}
			break;
		}
	} ?>
</div>