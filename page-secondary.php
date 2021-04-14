<?php

/* Template Name: Secondary Page */

$context = Timber::context();
$timber_post     = new Timber\Post();
$context['post'] = $timber_post;

// Get all content fields
$context['content'] = get_field('content');

Timber::render( 'secondary-page.twig', $context );
