<?php

/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define('ASTRA_THEME_VERSION', '4.7.2');
define('ASTRA_THEME_SETTINGS', 'astra-settings');
define('ASTRA_THEME_DIR', trailingslashit(get_template_directory()));
define('ASTRA_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define('ASTRA_EXT_MIN_VER', '4.7.0');

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define('ASTRA_PRO_UPGRADE_URL', astra_get_pro_url('https://wpastra.com/pro/', 'dashboard', 'free-theme', 'upgrade-now'));
define('ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', astra_get_pro_url('https://wpastra.com/pro/', 'customizer', 'free-theme', 'upgrade'));

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if (is_admin()) {
    require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if (is_admin()) {
    /**
     * Admin Menu Settings
     */
    require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
    require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
    require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if (version_compare(PHP_VERSION, '5.4', '>=')) {
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if (version_compare(PHP_VERSION, '5.3', '>=')) {
    require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';


function myplugin_create_table()
{
    global $wpdb;
    $table_name_user = $wpdb->prefix . 'user_submisstion';
    $table_name_certificate = $wpdb->prefix . 'certificate';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name_user (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        phone varchar(100) NOT NULL,
        email varchar(100) NOT NULL,
        certificated varchar(50) NOT NULL,
        isCertified ENUM('pending', 'certified', 'rejected') DEFAULT 'pending',
        isDeleted TINYINT(1) DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    $sql2 = "CREATE TABLE $table_name_certificate (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        name tinytext NOT NULL,
        templateSvg longtext NOT NULL,
        enroll Date DEFAULT CURRENT_TIMESTAMP,
        isDeleted TINYINT(1) DEFAULT 0,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
    dbDelta($sql2);
}
add_action('after_switch_theme', 'myplugin_create_table');

add_action('elementor_pro/forms/new_record', 'handle_elementor_form_after_send', 10, 2);

function handle_elementor_form_after_send($record, $handler)
{
    $form_id = $record->get_form_settings('id');

    if (strval($form_id) !== '982ec71') {
        return;
    }

    $fields = $record->get('fields');

    $name = isset($fields['name']['value']) ? sanitize_text_field($fields['name']['value']) : '';
    $email = isset($fields['email']['value']) ? sanitize_email($fields['email']['value']) : '';
    $phone = isset($fields['phone']['value']) ? sanitize_text_field($fields['phone']['value']) : '';
    $certificate = isset($fields['certificate']['value']) ? sanitize_text_field($fields['certificate']['value']) : '';

    global $wpdb;
    $table_name = $wpdb->prefix . 'user_submisstion';
    $wpdb->insert(
        $table_name,
        array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'certificated' => $certificate,
        )
    );
}

// Thêm hook để tạo menu
add_action('admin_menu', 'add_custom_admin_tab');

function add_custom_admin_tab()
{
    add_menu_page(
        'Trao chứng chỉ', // Tiêu đề trang
        'Trao chứng chỉ', // Tên hiển thị trong menu
        'manage_options', // Quyền truy cập cần thiết
        'chung-chi', // Slug của trang
        'display_custom_tab_content', // Callback function để hiển thị nội dung
        'dashicons-admin-generic', // Icon (tùy chọn)
        6 // Vị trí trong menu (tùy chọn)
    );
}

// Function để hiển thị nội dung của tab
function display_custom_tab_content()
{
    // Đường dẫn đến file nội dung
    $content_file = plugin_dir_path(__FILE__) . '/custom/certificate-tab.php';

    // Kiểm tra xem file có tồn tại không
    if (file_exists($content_file)) {
        include $content_file;
    } else {
        echo '<div class="wrap"><p>Không tìm thấy file nội dung.</p></div>';
    }
}

// Tạo Submenu
function custom_submenu_page()
{
    add_submenu_page(
        'chung-chi',          // Slug menu cha
        'Quản lý chứng chỉ',      // Tiêu đề trang submenu
        'Quản lý chứng chỉ',            // Tiêu đề submenu
        'manage_options',            // Khả năng người dùng cần có để xem submenu này
        'quan-ly-chung-chi',       // Slug submenu
        'display_submenu_page_content' // Hàm hiển thị nội dung trang submenu
    );
}
add_action('admin_menu', 'custom_submenu_page');

// Nội dung Trang Submenu
function display_submenu_page_content()
{
    // Đường dẫn đến file nội dung
    $content_file = plugin_dir_path(__FILE__) . '/custom/certificate-manage.php';

    // Kiểm tra xem file có tồn tại không
    if (file_exists($content_file)) {
        include $content_file;
    } else {
        echo '<div class="wrap"><p>Không tìm thấy file nội dung.</p></div>';
    }
}
