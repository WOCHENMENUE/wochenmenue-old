<?php snippet('header') ?>

<body>

	<?php snippet('section-header', ['title' => $page->title()]) ?>

	<section class="text-center">
		<div class="kirbytext max-w-md inline-block leading-none text-sm mt-4">
			<?= $page->text()->kt() ?>
		</div>
	</section>

	<section>
		
	</section>

	<?php snippet('section-footer') ?>

</body>

<?php snippet('footer') ?>