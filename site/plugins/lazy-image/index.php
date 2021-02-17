<?php

/* Overrides the standard image KirbyTag and adds Lazy loading support (using aFarkas/lazysizes) */

$originalTag = Kirby\Text\KirbyTag::$types['image'];
Kirby::plugin('rubenphilipp/lazyimage', [
    'tags' => [
        'image' => [
            'attr' => $originalTag['attr'],

            'html' => function($tag) use ($originalTag)  {
                
                $result = $originalTag['html']($tag);

                $result = str_replace('src=', 'class="lazyload" data-src=', $result);

                return $result;
            }
        ]
    ]
]);