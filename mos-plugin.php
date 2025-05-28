<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://mostak-shahid.github.io/
 * @since             1.0.0
 * @package           Mos_Plugin
 *
 * @wordpress-plugin
 * Plugin Name:       Mos Plugin
 * Plugin URI:        https://mostak-shahid.github.io/mos-plugin/
 * Description:       Generates a custom plugin from a template using a form and provides it as a ZIP download.
 * Version:           1.0.0
 * Author:            Md. Mostak Shahid
 * Author URI:        https://mostak-shahid.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       mos-plugin
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

define('MOS_PLUGIN_PATH', plugin_dir_path(__FILE__));

add_shortcode('plugin_generator_form', 'mos_plugin_display_form');
add_action('init', 'mos_plugin_handle_form_submission');

function mos_plugin_display_form($atts, $content = "")
{
    $atts = shortcode_atts(array(
        'pname' => esc_html__('Plugin Name', 'pl-wp-plugin-boilerplate-generator'),
        'pslug' => esc_html__('Plugin Slug', 'pl-wp-plugin-boilerplate-generator'),
        'purl' => esc_html__('Plugin URL', 'pl-wp-plugin-boilerplate-generator'),
        'aname' => esc_html__('Author Name', 'pl-wp-plugin-boilerplate-generator'),
        'aemail' => esc_html__('Author Email', 'pl-wp-plugin-boilerplate-generator'),
        'aurl' => esc_html__('Author URL', 'pl-wp-plugin-boilerplate-generator'),
        'shortdescription' => esc_html__('Short Description', 'pl-wp-plugin-boilerplate-generator'),

        'pname_width' => esc_html('100%'),
        'pslug_width' => esc_html('100%'),
        'purl_width' => esc_html('100%'),
        'aname_width' => esc_html('100%'),
        'aemail_width' => esc_html('100%'),
        'aurl_width' => esc_html('100%'),
        'shortdescription_width' => esc_html('100%'),

        'label_position' => esc_html('top'), // top, left, right
        'button_position' => esc_html('left'), // top, left, right

    ), $atts, 'plugin_generator_form');
    ob_start(); ?>
    <div class="pl_wp_plugin_boilerplate_generator_form_wrapper">
        <form method="post">
            <div class="form-wrapper <?php echo isset($atts['label_position']) ? 'label-' . sanitize_text_field(wp_unslash($atts['label_position'])) : 'label-top' ?> <?php echo isset($atts['button_position']) ? 'button-' . sanitize_text_field(wp_unslash($atts['button_position'])) : 'button-left' ?>">
                <div class="form-unit" style="<?php echo isset($atts['pname_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['pname_width'])) . ';' : '' ?>">
                    <input type="text" name="plugin_name" class="plugin_name" data-default="<?php echo esc_html__('Plugin Name', 'pl-wp-plugin-boilerplate-generator') ?>" required>
                    <label><?php echo isset($atts['pname']) ? esc_html($atts['pname']) : esc_html__('Plugin Name', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['pslug_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['pslug_width'])) . ';' : '' ?>">
                    <input type="text" name="plugin_slug" class="plugin_slug" required>
                    <label><?php echo isset($atts['pslug']) ? esc_html($atts['pslug']) : esc_html__('Plugin Slug', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['purl_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['purl_width'])) . ';' : '' ?>">
                    <input type="url" name="plugin_url" class="plugin_url" required>
                    <label><?php echo isset($atts['purl']) ? esc_html($atts['purl']) : esc_html__('Plugin URL', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['aname_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['aname_width'])) . ';' : '' ?>">
                    <input type="text" name="author_name" class="author_name" data-default="<?php echo esc_html__('Plugin Name', 'pl-wp-plugin-boilerplate-generator') ?>" required>
                    <label><?php echo isset($atts['aname']) ? esc_html($atts['aname']) : esc_html__('Author Name', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['aemail_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['aemail_width'])) . ';' : '' ?>">
                    <input type="email" name="author_email" class="author_email" required>
                    <label><?php echo isset($atts['aemail']) ? esc_html($atts['aemail']) : esc_html__('Author Email', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['aurl_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['aurl_width'])) . ';' : '' ?>">
                    <input type="url" name="author_url" class="author_url" required>
                    <label><?php echo isset($atts['aurl']) ? esc_html($atts['aurl']) : esc_html__('By Your Name or Your Company', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>

                <div class="form-unit" style="<?php echo isset($atts['shortdescription_width']) ? 'width: ' . sanitize_text_field(wp_unslash($atts['shortdescription_width'])) . ';' : '' ?>">
                    <input type="text" name="plugin_description" class="plugin_description" required>
                    <label><?php echo isset($atts['shortdescription']) ? esc_html($atts['shortdescription']) : esc_html__('Short Description', 'pl-wp-plugin-boilerplate-generator') ?></label>
                </div>
                <div class="form-unit"><?php do_action('pwpbg_captha') ?></div>
                <div class="form-unit button-unit">
                    <button type="submit" name="mos_plugin_generate_plugin" value="<?php echo esc_html__('Generate Plugin', 'pl-wp-plugin-boilerplate-generator') ?>" class="generate_plugin_button"><?php echo esc_html__('Generate Plugin', 'pl-wp-plugin-boilerplate-generator') ?></button>
                </div>

            </div>
        </form>
        <div class="live-preview">
            <div class="live-preview-header">
                <div class="live-preview-header-checkbox"></div>
                <div class="live-preview-header-title">Plugin</div>
            </div>
            <div class="live-preview-body">
                <h3 class="live-preview-title">WordPress Plugin Boilerplate</h3>
                <div class="live-preview-action-buttons">
                    <span class="action-button action-button-blue">Activate</span>
                    <span class="action-button action-button-red">Delete</span>
                </div>
                <div class="live-preview-action-intro">
                    <p class="short-description-result">This is a short description of what the plugin does. It's displayed in the WordPress admin area.</p>
                    <p>Plugin Slug: <strong class="plugin-slug-result"></strong></p>
                    <p>Plugin URL: <strong class="plugin-url-result"></strong></p>
                    <p>Author Email: <strong class="author-email-result"></strong></p>
                    <p>Author URL: <strong class="author-url-result"></strong></p>
                </div>
                <div class="live-preview-action-buttons">
                    <span class="action-button action-button-black">Version 1.0.0</span>
                    <a href="" class="action-button action-button-blue action-button-author-name">By Your Name or Your Company</a>
                    <a href="" class="action-button action-button-blue action-button-view-details">View Details</a>
                </div>
                <div class="live-preview-action-buttons">
                    <span class="action-button action-button-blue">Enable auto-updates</span>
                </div>
            </div>
        </div>
    </div>
<?php
    if (isset($_GET['download']) && file_exists($_GET['download'])) {
        echo '<p><a href="' . esc_url($_GET['download']) . '">Download Your Plugin</a></p>';
    }

    return ob_get_clean();
}

// Download a zip file with the plugin name
function mos_plugin_handle_form_submission()
{
    if (!isset($_POST['mos_plugin_generate_plugin'])) return;

    $data = [
        'plugin_name'        => sanitize_text_field($_POST['plugin_name']),
        'plugin_slug'        => sanitize_title($_POST['plugin_slug']),
        'plugin_url'         => esc_url_raw($_POST['plugin_url']),
        'author_name'        => sanitize_text_field($_POST['author_name']),
        'author_email'       => sanitize_email($_POST['author_email']),
        'author_url'         => esc_url_raw($_POST['author_url']),
        'plugin_description' => sanitize_text_field($_POST['plugin_description']),
    ];

    $template_path = plugin_dir_path(__FILE__) . 'plugin-starter/';
    $temp_dir = plugin_dir_path(__FILE__) . 'tmp/' . $data['plugin_slug'];
    $zip_file_path = plugin_dir_path(__FILE__) . 'tmp/' . $data['plugin_slug'] . '.zip';

    // Clean previous
    if (file_exists($temp_dir)) mos_plugin_rrmdir($temp_dir);
    if (file_exists($zip_file_path)) unlink($zip_file_path);

    // Copy & customize
    mos_plugin_recursive_copy($template_path, $temp_dir);
    mos_plugin_replace_plugin_data($temp_dir, $data);

    // Zip the plugin
    if (!mos_plugin_zip_plugin($temp_dir, $zip_file_path)) {
        wp_die('Failed to create ZIP archive.');
    }

    // Clear buffer to avoid output corruption
    if (ob_get_length()) {
        ob_end_clean();
    }

    // Send the ZIP file as a download
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename="' . basename($zip_file_path) . '"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($zip_file_path));

    readfile($zip_file_path);

    // Optional cleanup
    // mos_plugin_rrmdir($temp_dir);
    // unlink($zip_file_path);
    exit;
}


// Copy recursively
function mos_plugin_recursive_copy($src, $dst)
{
    $dir = opendir($src);
    @mkdir($dst, 0755, true);
    while (false !== ($file = readdir($dir))) {
        if ($file == '.' || $file == '..') continue;
        if (is_dir($src . '/' . $file)) {
            mos_plugin_recursive_copy($src . '/' . $file, $dst . '/' . $file);
        } else {
            copy($src . '/' . $file, $dst . '/' . $file);
        }
    }
    closedir($dir);
}

// Replace all placeholders & rename files
function mos_plugin_replace_plugin_data($dir, $data)
{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($files as $file) {
        $filePath = $file->getRealPath();
        $variations = mos_plugin_generate_plugin_name_variations($data['plugin_slug']);
        // Replace in file contents
        if ($file->isFile()) {
            $contents = file_get_contents($filePath);
            $contents = str_replace([
                'Plugin Starter',
                "plugin-starter",

                "plugin_starter",
                "plugin starter",
                "PLUGIN-STARTER",
                "PLUGIN_STARTER",
                "PLUGIN STARTER",
                "Plugin-Starter",
                "Plugin_Starter",
                "Plugin Starter",
                "PluginStarter",
                "Plugin starter",

                'https://mostak-shahid.github.io/plugin-starter/',
                'Md. Mostak Shahid',
                'mostak.shahid@gmail.com',
                'https://mostak-shahid.github.io/',
                'Plugin boilerplate for WordPress',
            ], [
                $data['plugin_name'],
                $data['plugin_slug'],

                $variations[1],
                $variations[2],
                $variations[3],
                $variations[4],
                $variations[5],
                $variations[6],
                $variations[7],
                $variations[8],
                $variations[9],
                $variations[10],

                $data['plugin_url'],
                $data['author_name'],
                $data['author_email'],
                $data['author_url'],
                $data['plugin_description'],
            ], $contents);
            file_put_contents($filePath, $contents);
        }

        // Rename files
        if (strpos($file->getFilename(), 'plugin-starter') !== false) {
            $newName = str_replace('plugin-starter', $data['plugin_slug'], $file->getFilename());
            rename($filePath, $file->getPath() . '/' . $newName);
        }
    }

    // Rename root directory main file
    rename($dir . 'plugin-starter.php', $dir . $data['plugin_slug'] . '.php');
}

// Zip directory
function mos_plugin_zip_plugin($source, $destination)
{
    if (!extension_loaded('zip') || !file_exists($source)) return false;

    $zip = new ZipArchive();
    if (!$zip->open($destination, ZipArchive::CREATE | ZipArchive::OVERWRITE)) return false;

    $source = realpath($source);
    $plugin_folder_name = basename($source); // e.g., "my-plugin"

    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($source, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $file) {
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($source) + 1); // inside folder

        // Add with plugin slug as the folder name
        $zip->addFile($filePath, $plugin_folder_name . '/' . $relativePath);
    }

    return $zip->close();
}
/**
 * Generates different variations of a plugin name
 * 
 * @param string $original_name The original plugin name in kebab-case format
 * @return array Array of all variations of the plugin name
 */
function mos_plugin_generate_plugin_name_variations($original_name)
{
    // Start with the original format (kebab-case)
    $variations = array();
    $variations[] = $original_name; // your-renamed-plugin

    // Convert to snake_case
    $snake_case = str_replace('-', '_', $original_name);
    $variations[] = $snake_case; // your_renamed_plugin

    // Convert to space separated
    $space_separated = str_replace('-', ' ', $original_name);
    $variations[] = $space_separated; // your renamed plugin

    // Convert to uppercase versions
    $variations[] = strtoupper($original_name); // YOUR-RENAMED-PLUGIN
    $variations[] = strtoupper($snake_case); // YOUR_RENAMED_PLUGIN
    $variations[] = strtoupper($space_separated); // YOUR RENAMED PLUGIN

    // Convert to title case versions
    $title_case_kebab = implode('-', array_map('ucfirst', explode('-', $original_name)));
    $variations[] = $title_case_kebab; // Your-Renamed-Plugin

    $title_case_snake = implode('_', array_map('ucfirst', explode('-', $original_name)));
    $variations[] = $title_case_snake; // Your_Renamed_Plugin

    $title_case_space = implode(' ', array_map('ucfirst', explode('-', $original_name)));
    $variations[] = $title_case_space; // Your Renamed Plugin

    // Convert to PascalCase (CamelCase with first letter capitalized)
    $pascal_case = str_replace(' ', '', $title_case_space);
    $variations[] = $pascal_case; // YourRenamedPlugin

    // Convert to sentence case
    $sentence_case = ucfirst($space_separated);
    $variations[] = $sentence_case; // Your renamed plugin

    return $variations;
}

// Remove temporary folder
function mos_plugin_rrmdir($dir)
{
    if (!is_dir($dir)) return;
    $objects = scandir($dir);
    foreach ($objects as $object) {
        if ($object != '.' && $object != '..') {
            $path = $dir . '/' . $object;
            if (is_dir($path)) mos_plugin_rrmdir($path);
            else unlink($path);
        }
    }
    rmdir($dir);
}
add_action('admin_enqueue_scripts', 'mos_plugin_enqueue_scripts');
add_action('wp_enqueue_scripts', 'mos_plugin_enqueue_scripts');
function mos_plugin_enqueue_scripts()
{
    wp_enqueue_style('mos-plugin-style', plugin_dir_url(__FILE__) . 'assets/css/style.css');
    wp_enqueue_script('mos-plugin-script', plugin_dir_url(__FILE__) . 'assets/js/script.js', array('jquery'), null, true);
}
