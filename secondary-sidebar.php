<?php
/**
 * The Template for the sidebar containing the main widget area
 *
 * @package  WordPress
 * @subpackage  Timber
 */

$context = array();
$context['secondary_sidebar'] = Timber::get_sidebar('secondary_sidebar');
Timber::render('secondary_sidebar.twig', $context);
