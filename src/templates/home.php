<?php snippet('header', ['title' => 'WOCHENMENÜ'] ) ?>

<body>

	<?php snippet('section-header') ?>

	<section class="text-center">
		<div class="kirbytext max-w-md inline-block leading-none text-sm mt-4">
			<?= $page->introtext()->kt() ?>
		</div>
	</section>

	<main class="mt-8 mx-2">



		<form method="post" name="subscribeform" id="subscribeform" enctype="multipart/form-data">	

			<div class="max-w-md mx-auto text-center md:text-left md:flex">
				<input type="email" class="w-full border-b border-black text-center md:text-left" id="email" name="email" value="" placeholder="<?= $page->emailLabel() ?>">

				<input type="hidden" name="htmlemail" value="<?= $kirby->option('phpListHTMLEmail') ?>">
				<input type="hidden" name="list[<?= $kirby->option('phpListId') ?>]" value="signup">
				<input type="hidden" name="subscribe" value="subscribe">

				<button class="md:ml-4 mt-2 md:mt-0 bg-transparent cursor-pointer hover:underline" onclick="if (checkform()) {submitForm();} return false;"><?= $page->submitLabel() ?></button>
			</div>
		</form>

		<div id="formMessages" class="flex justify-center flex-wrap">
			<div id="subscribeSuccessMessage" class="kirbytext max-w-md text-left italic p-2 text-xs mt-4 hidden">
				<?= $page->subscribeSuccessMessage()->kt() ?>
			</div>

			<div id="subscribeInvalidMailMessage" class="kirbytext max-w-md text-left italic p-2 text-xs mt-4 hidden">
				<?= $page->subscribeInvalidMailMessage()->kt() ?>
			</div>

			<div id="subscribeFailureMessage" class="kirbytext max-w-md text-left italic p-2 text-xs mt-4 hidden">
				<?= $page->subscribeFailureMessage()->kt() ?>
			</div>

			<div id="loader" class="kirbytext max-w-md text-center italic p-2 text-xs mt-4 hidden">
				<?= $page->loaderText() ?>
			</div>
		</div>

		<script type="text/javascript"> 

			<!-- cf. https://www.phplist.org/manual/books/phplist-manual/page/creating-a-subscribe-page#bkmrk-add-an-ajax-subscrib -->

			function checkform() { 
				// hide messages
				jQuery('#formMessages > div').hide();

				re = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/; 

				if (!(re.test(jQuery("#email").val()))) { 
					jQuery('#subscribeInvalidMailMessage').show();
					jQuery("#email").focus(); 
					return false; 
				} 
				return true; 
			} 

			function submitForm() { 
				// hide messages
				jQuery('#formMessages > div').hide();

				// show loader
				jQuery('#loader').show();

				data = jQuery('#subscribeform').serialize(); 
				jQuery.ajax({ 
						type: 'POST', 
						data: data, 
						url: '<?= $kirby->option('phpListURL'); ?>', 
						dataType: 'html'
					})
					.done(function(data, status, request){
						// hide loader
						jQuery('#loader').hide();
						jQuery('#subscribeSuccessMessage').show();
					})
					.fail(function(request, status, error){
						// hide loader
						jQuery('#loader').hide();
						jQuery('#subscribeFailureMessage').show();
					});
			} 

		</script>

	</main>

	<section class="text-center mt-12">
		<h3 class="font-bold"><?= $page->addEventTitle() ?></h3>
		<div class="max-w-md inline-block">
			<a href="https://forms.gle/nmQaa9m8MdkRUUq37" target="_blank" title="<?= $page->addEventButton() ?>" class="underline"><?= $page->addEventButton() ?></a>
		</div>
	</section>


	<?php snippet('section-footer') ?>
	

</body>

<?php snippet('footer') ?>