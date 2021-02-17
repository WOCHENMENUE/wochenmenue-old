<?php snippet('header', ['title' => 'WOCHENMENUE'] ) ?>

<body>

	<section class="text-center">
		<img src="<?= asset('assets/images/UE.png')->url() ?>" class="w-32 h-auto inline-block">
		<h1 class="text-2xl"><?= $site->title() ?></h1>
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


	<?php snippet('section-footer') ?>
	

</body>

<?php snippet('footer') ?>