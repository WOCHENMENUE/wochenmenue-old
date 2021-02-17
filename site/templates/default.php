<?php snippet('header') ?>

<body>

	<h1 class="text-2xl"><?= $page->title() ?></h1>
	<p>
		<?= $page->text()->kt() ?>
	</p>

</body>

<?php snippet('footer') ?>