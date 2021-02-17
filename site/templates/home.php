<?php snippet('header', ['title' => 'WOCHENMENUE'] ) ?>

<body>

	<section class="text-center">
		<img src="<?= asset('assets/images/UE.png')->url() ?>" class="w-32 h-auto inline-block">
		<h1 class="text-2xl"><?= $site->title() ?></h1>
		<div class="max-w-md inline-block leading-none text-sm mt-4">
			<?= $page->descriptionShort()->kt() ?>
		</div>
	</section>

	<main>
		
	</main>

	<section>
		
	</section>

	<?php snippet('section-footer') ?>
	

</body>

<?php snippet('footer') ?>