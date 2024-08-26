<?php
/**
 * Merlin WP configuration file.
 *
 * @package   Merlin WP
 * @version   @@pkg.version
 * @link      https://merlinwp.com/
 * @author    Rich Tabor, from ThemeBeans.com & the team at ProteusThemes.com
 * @copyright Copyright (c) 2018, Merlin WP of Inventionn LLC
 * @license   Licensed GPLv3 for Open Source Use
 */

if ( ! class_exists( 'Merlin' ) ) {
	return;
}

/**
 * Set directory locations, text strings, and settings.
 */
$wizard = new Merlin(

	$config = array(
		'directory'            => 'components/merlin', // Location / directory where Merlin WP is placed in your theme.
		'merlin_url'           => 'merlin', // The wp-admin page slug where Merlin WP loads.
		'parent_slug'          => 'themes.php', // The wp-admin parent page slug for the admin menu item.
		'capability'           => 'manage_options', // The capability required for this menu to be displayed to the user.
		'child_action_btn_url' => 'https://codex.wordpress.org/child_themes', // URL for the 'child-action-link'.
		'dev_mode'             => false, // Enable development mode for testing.
		'license_step'         => false, // EDD license activation step.
		'license_required'     => false, // Require the license activation step.
		'license_help_url'     => '', // URL for the 'license-tooltip'.
		'edd_remote_api_url'   => '', // EDD_Theme_Updater_Admin remote_api_url.
		'edd_item_name'        => '', // EDD_Theme_Updater_Admin item_name.
		'edd_theme_slug'       => '', // EDD_Theme_Updater_Admin item_slug.
		'ready_big_button_url' => '', // Link for the big button on the ready step.
	),
	$strings = array(
		'admin-menu'               => esc_html__( 'Theme Setup', 'serano' ),

		/* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
		'title%s%s%s%s'            => esc_html__( '%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'serano' ),
		'return-to-dashboard'      => esc_html__( 'Return to the dashboard', 'serano' ),
		'ignore'                   => esc_html__( 'Disable this wizard', 'serano' ),

		'btn-skip'                 => esc_html__( 'Skip', 'serano' ),
		'btn-next'                 => esc_html__( 'Next', 'serano' ),
		'btn-start'                => esc_html__( 'Start', 'serano' ),
		'btn-no'                   => esc_html__( 'Cancel', 'serano' ),
		'btn-plugins-install'      => esc_html__( 'Install', 'serano' ),
		'btn-child-install'        => esc_html__( 'Install', 'serano' ),
		'btn-content-install'      => esc_html__( 'Install', 'serano' ),
		'btn-import'               => esc_html__( 'Import', 'serano' ),
		'btn-license-activate'     => esc_html__( 'Activate', 'serano' ),
		'btn-license-skip'         => esc_html__( 'Later', 'serano' ),

		/* translators: Theme Name */
		'license-header%s'         => esc_html__( 'Activate %s', 'serano' ),
		/* translators: Theme Name */
		'license-header-success%s' => esc_html__( '%s is Activated', 'serano' ),
		/* translators: Theme Name */
		'license%s'                => esc_html__( 'Enter your license key to enable remote updates and theme support.', 'serano' ),
		'license-label'            => esc_html__( 'License key', 'serano' ),
		'license-success%s'        => esc_html__( 'The theme is already registered, so you can go to the next step!', 'serano' ),
		'license-json-success%s'   => esc_html__( 'Your theme is activated! Remote updates and theme support are enabled.', 'serano' ),
		'license-tooltip'          => esc_html__( 'Need help?', 'serano' ),

		/* translators: Theme Name */
		'welcome-header%s'         => esc_html__( 'Welcome to %s', 'serano' ),
		'welcome-header-success%s' => esc_html__( 'Hi. Welcome back', 'serano' ),
		'welcome%s'                => esc_html__( 'This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'serano' ),
		'welcome-success%s'        => esc_html__( 'You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'serano' ),

		'child-header'             => esc_html__( 'Install Child Theme', 'serano' ),
		'child-header-success'     => esc_html__( 'You\'re good to go!', 'serano' ),
		'child'                    => esc_html__( 'Let\'s build & activate a child theme so you may easily make theme changes.', 'serano' ),
		'child-success%s'          => esc_html__( 'Your child theme has already been installed and is now activated, if it wasn\'t already.', 'serano' ),
		'child-action-link'        => esc_html__( 'Learn about child themes', 'serano' ),
		'child-json-success%s'     => esc_html__( 'Awesome. Your child theme has already been installed and is now activated.', 'serano' ),
		'child-json-already%s'     => esc_html__( 'Awesome. Your child theme has been created and is now activated.', 'serano' ),

		'plugins-header'           => esc_html__( 'Install Plugins', 'serano' ),
		'plugins-header-success'   => esc_html__( 'You\'re up to speed!', 'serano' ),
		'plugins'                  => esc_html__( 'Let\'s install some essential WordPress plugins to get your site up to speed.', 'serano' ),
		'plugins-success%s'        => esc_html__( 'The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'serano' ),
		'plugins-action-link'      => esc_html__( 'Advanced', 'serano' ),

		'import-header'            => esc_html__( 'Import Content', 'serano' ),
		'import'                   => esc_html__( 'Let\'s import content to your website, to help you get familiar with the theme. If you are using Elementor, please skip this step and install the import.xml manually from demo-data folder as described in the documentation.', 'serano' ),
		'import-action-link'       => esc_html__( 'Advanced', 'serano' ),

		'ready-header'             => esc_html__( 'All done. Have fun!', 'serano' ),

		/* translators: Theme Author */
		'ready%s'                  => esc_html__( 'Your theme has been all set up. Enjoy your new theme by %s.', 'serano' ),
		'ready-action-link'        => esc_html__( 'Extras', 'serano' ),
		'ready-big-button'         => esc_html__( 'View your website', 'serano' ),
		'ready-link-1'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__( 'Explore WordPress', 'serano' ) ),
		'ready-link-2'             => sprintf( '<a href="%1$s" target="_blank">%2$s</a>', 'https://clapatsupport.ticksy.com/', esc_html__( 'Get Theme Support', 'serano' ) ),
		'ready-link-3'             => sprintf( '<a href="%1$s">%2$s</a>', admin_url( 'customize.php' ), esc_html__( 'Start Customizing', 'serano' ) ),
	)
);
