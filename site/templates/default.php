<?php snippet('header') ?>

<body>

	<?php snippet('section-header', ['title' => $page->title()]) ?>

	<main class="mt-8">
		<?= $page->text()->kt() ?>
	</main>

	<?php snippet('section-footer') ?>

</body>

<?php snippet('footer') ?>