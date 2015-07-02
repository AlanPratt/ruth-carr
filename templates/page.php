<?php

fn('site.header');
?>

<?=$page['content']?>

<ul id="lightSlider">

	<?php $medias = fn::get_medias($page['id']); 
		foreach($medias as $media): ?>
			<li data-thumb="<?=$media['url']?>"><img src="<?=$media['url']?>" alt="<?=$media['lookup_title']?>" /><?=$media['lookup_data']?></li>
	<?php endforeach; ?>

</ul>

<?=$page['c2']?>