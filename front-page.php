<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$context          = Timber::context();
$context['posts'] = new Timber\PostQuery();

// Get slider posts
$slider_args = array(
    'post_type' => 'slide',
    'posts_per_page' => 3,
);

$context['slider'] = Timber::get_posts( $slider_args );

// Get all content fields
$context['content'] = get_field('content');


Timber::render( 'front-page.twig', $context );
