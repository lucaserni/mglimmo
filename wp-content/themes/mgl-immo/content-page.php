<div class="row">
	<div class="col-md-9">
		<header class="section-heading">
			<h1 class="section-title"><?php the_title(); ?></h1>
		</header>
		<?php if (get_the_content()): ?>
			<div class="section-content">
				<?php the_content() ?>
			</div>
		<?php endif ?>
	</div>
</div>
