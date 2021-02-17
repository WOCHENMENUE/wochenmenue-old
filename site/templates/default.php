<?php snippet('header') ?>

<body>

	<?php snippet('section-header', ['title' => $page->title()]) ?>
	
	<section class="text-center">
		<div class="max-w-md text-left inline-block mt-8 p-2">
			<?= $page->text()->kt() ?>
		</div>
	</section>

	<?php snippet('section-footer') ?>

</body>

<?php snippet('footer') ?>