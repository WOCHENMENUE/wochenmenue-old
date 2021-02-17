<?php snippet('header') ?>

<body>

	<h1 class="text-2xl"><?= $page->title() ?></h1>
	<div>
		<?= $page->text()->kt() ?>
	</div>

</body>

<?php snippet('footer') ?>