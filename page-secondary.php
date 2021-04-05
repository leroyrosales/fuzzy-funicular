<?php

/* Template Name: Secondary Page */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;



Timber::render( 'secondary-page.twig', $context );
