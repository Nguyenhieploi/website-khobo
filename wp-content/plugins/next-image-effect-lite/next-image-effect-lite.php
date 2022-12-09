<?php
/*
Plugin Name: Next Image Effect Lite
Plugin URI:  www.divinext.com
Description: Create a creative image effect, lite version.
Version:     1.6
Author:      Divi Next
Author URI:  www.divinext.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: dnxtiel-next-image-effect-lite
Domain Path: /languages

Next Image Effect Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Next Image Effect Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Next Image Effect Lite. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
 */

if (!function_exists('dnxtiel_initialize_extension')):
/**
 * Creates the extension's main class instance.
 *
 * @since 1.0.0
 */
    function dnxtiel_initialize_extension()
{
        require_once plugin_dir_path(__FILE__) . 'includes/NextImageEffectLite.php';
    }
    add_action('divi_extensions_init', 'dnxtiel_initialize_extension');
endif;
