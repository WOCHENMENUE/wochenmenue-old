<?php snippet('header') ?>

<body>

	<?php snippet('section-header', ['title' => $page->title()]) ?>

	<section>
		<?= $page->text()->kt() ?>
	</section>

	<?php snippet('section-footer') ?>

</body>

<?php snippet('footer') ?>