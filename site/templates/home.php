<?php snippet('header', ['title' => 'WOCHENMENÜ'] ) ?>

<body>

	<?php snippet('section-header') ?>

	<section class="text-center">
		<div class="kirbytext max-w-md inline-block leading-none text-sm mt-4">
			<?= $page->introtext()->kt() ?>
		</div>
	</section>

	<main class="mt-8 mx-2">
		<form method="post" action="<?= $page->url() ?>">
			<div class="max-w-md mx-auto text-center md:text-left md:flex">
				<input class="w-full border-b border-black text-center md:text-left" type="email" id="email" name="email" value="<?= esc(get('email')) ?>" placeholder="<?= $page->emailLabel() ?>">
				<input class="ml-4 mt-2 md:mt-0 bg-transparent cursor-pointer hover:underline" type="submit" name="submit" value="<?= $page->submitLabel() ?>">
			</div>
		</form>
	</main>

	<section class="text-center mt-8">
		<h3 class="font-bold"><?= $page->addEventTitle() ?></h3>
		<div class="kirbytext">
			<?= $page->addEventText()->kt() ?>
		</div>
	</section>


	<?php snippet('section-footer') ?>
	

</body>

<?php snippet('footer') ?>