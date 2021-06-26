			Footer
			<?php wp_footer(); ?>

			<?php
				echo get_the_post_thumbnail(9, 'new-them-size', [
					'data-post_id' => 9,
					'lazyload' => 'false'
				]);
			 ?>
			
		</div>
	</body>
</html> 