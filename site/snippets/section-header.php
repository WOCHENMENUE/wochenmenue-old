<header class="inline-block w-full text-center">
	<a href="<?= page('home')->url() ?>"><img src="<?= asset('assets/images/UE.png')->url() ?>" title="<?= $site->title() ?>" class="w-32 h-auto inline-block"></a>
	<h1 class="text-2xl"><?php if(isset($title)){echo $title;}else{echo $site->title();} ?></h1>
</header>