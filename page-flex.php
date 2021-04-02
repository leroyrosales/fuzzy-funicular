<?php

/* Template Name: Flexible Layout */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;



Timber::render( 'page-flex.twig', $context );
