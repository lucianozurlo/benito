<?php 
/*
Plugin Name: Disable Admin Bar and ToolBar
Plugin URI: https://slangji.wordpress.com/toolbar-removal-completely-disable/
Description: Disable WordPress 3.1+ Admin Bar and 3.3+ ToolBar (unified code work with WP 3.1+ ~ 3.7+) This is only a "Basic" disabler. For "Full" remover refer to <a href="//wordpress.org/plugins/wp-admin-bar-removal/" title="Completely Remove Admin Bar Frontend Backend and related Code">Admin Bar Removal</a> with Add-On <a href="//wordpress.org/plugins/wp-admin-bar-node-removal/" title="Remove Admin Bar Node Group and Top DashBoard Links Alone">Admin Bar Node Removal</a> and <a href="//wordpress.org/plugins/wp-toolbar-removal/" title="Completely Remove ToolBar Frontend Backend and related Code">ToolBar Removal</a> with Add-On <a href="//wordpress.org/plugins/wp-toolbar-node-removal/" title="Remove ToolBar Node Group and Top DashBoard Links Alone">ToolBar Node Removal</a> The configuration of this plugin is Automattic!
Version: 2013.0615.0936
Author: slangjis
Author URI: https://slangji.wordpress.com/
Requires at least: 3.1
Tested up to: 3.7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Indentation: GNU style coding standard
Indentation URI: https://www.gnu.org/prep/standards/standards.html
 *
 * LICENSING
 *
 * [WP Disable Admin Bar and ToolBar](//wordpress.org/plugins/toolbar-removal-completely-disable/)
 * Disable WP 3.1+ Admin Bar and 3.3+ ToolBar
 *
 * Copyright (C) 2011-2014 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the [GNU General Public License](//wordpress.org/about/gpl/)
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * on an "AS IS", but WITHOUT ANY WARRANTY; without even the implied
 * warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, see [GNU General Public Licenses](//www.gnu.org/licenses/),
 * or write to the Free Software Foundation, Inc., 51 Franklin Street,
 * Fifth Floor, Boston, MA 02110-1301, USA.
 *
 * DISCLAIMER
 *
 * The license under which the WordPress software is released is the GPLv2 (or later) from the
 * Free Software Foundation. A copy of the license is included with every copy of WordPress.
 *
 * Part of this license outlines requirements for derivative works, such as plugins or themes.
 * Derivatives of WordPress code inherit the GPL license.
 *
 * There is some legal grey area regarding what is considered a derivative work, but we feel
 * strongly that plugins and themes are derivative work and thus inherit the GPL license.
 *
 * The license for this software can be found on [Free Software Foundation](//www.gnu.org/licenses/gpl-2.0.html)
 * and as license.txt into this plugin package.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THERMS
 *
 * This uses (or it parts) code derived from
 *
 * wp-header-footer-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2009-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-admin-bar-removal.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2010-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-admin-bar-removal-node-addon.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2010-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * one-click-logout-barless.php by olyma <olyma [at] rack of power [dot] com>)
 * Copyright (C) 2011-2012 [olyma](//rackofpower.com/) (email: <olyma [at] rack of power [dot] com>)
 *
 * wp-toolbar-removal.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2012-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * wp-toolbar-removal-node-addon.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2012-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later)
 *
 * This wp-header-footer-log.php uses (or it parts) code derived from
 *
 * wp-footer-log.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2008-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * sLa2sLaNGjIs.php by slangjis <slangjis [at] googlemail [dot] com>
 * Copyright (C) 2009-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 *
 * according to the terms of the GNU General Public License version 2 (or later)
 *
 * According to the Terms of the GNU General Public License version 2 (or later) part of Copyright belongs to your own author
 * and part belongs to their respective others authors:
 *
 * Copyright (C) 2008-2013 [slangjis](//slangji.wordpress.com/) (email: <slangjis [at] googlemail [dot] com>)
 * Copyright (C) 2011-2012 [olyma](//rackofpower.com/) (email: <olyma [at] rack of power [dot] com>)
 *
 * VIOLATIONS
 *
 * [Violations of the GNU Licenses](//www.gnu.org/licenses/gpl-violation.en.html)
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * GUIDELINES
 *
 * This software meet [Detailed Plugin Guidelines](//wordpress.org/plugins/about/guidelines/)
 * paragraphs 1,4,10,12,13,16,17 quality requirements.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * CODING
 *
 * This software implement [GNU style](//www.gnu.org/prep/standards/standards.html) coding standard indentation.
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * VALIDATION
 *
 * This readme.txt rocks. Seriously. Flying colors. It meet the specifications according to
 * WordPress [Readme Validator](//wordpress.org/plugins/about/validator/) directives.
 *
 * The author of this plugin is available at any time, to make all changes, or corrections, to respect these specifications.
 *
 * THANKS
 *
 * To: olyma, storkontheroof, focus3d
 *
 * Please noted that for Completely Backend Removal is needed:
 * On WordPress 3.1+ (or later) [WP Admin Bar Removal](//wordpress.org/plugins/wp-admin-bar-removal/)
 * On WordPress 3.3+ (or later) [WP ToolBar Removal](//wordpress.org/plugins/wp-toolbar-removal/)
 * Try also your Add-On [WP Admin Bar Removal Node](//wordpress.org/plugins/wp-admin-bar-node-removal/)
 * Try also your Add-On [WP ToolBar Removal Node](//wordpress.org/plugins/wp-toolbar-node-removal/)
 */

	/**
	 * @package WP Disable Admin Bar and ToolBar
	 * @subpackage WordPress PlugIn
	 * @description Disable WP 3.1+ Admin Bar and 3.3+ ToolBar
	 * @since  3.1.0
	 * @tested 3.7.3
	 * @version 2013.0615.0936
	 * @status STABLE (trunk) release
	 * @development Code in Becoming!
	 * @install The configuration of this Plugin is Automattic!
	 * @author slangjis
	 * @license GPLv2 or later
	 * @indentation GNU style coding standard
	 * @keytag 74be16979710d4c4e7c6647856088456
	 */

	if ( !function_exists( 'add_action' ) )
		{
			header( 'HTTP/0.9 403 Forbidden' );
			header( 'HTTP/1.0 403 Forbidden' );
			header( 'HTTP/1.1 403 Forbidden' );
			header( 'Status: 403 Forbidden' );
			header( 'Connection: Close' );
				exit();
		}

	global $wp_version;

	if ( $wp_version < 3.1 )
		{
			wp_die( __( 'This Plugin Requires WordPress 3.1+ or Greater: Activation Stopped!' ) );
		}

	function wptrcd_1st()
		{
			$wp_path_to_this_file = preg_replace( '/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR . "/$2", __FILE__ );
			$this_plugin          = plugin_basename( trim( $wp_path_to_this_file ) );
			$active_plugins       = get_option( 'active_plugins' );
			$this_plugin_key      = array_search( $this_plugin, $active_plugins );

			if ( $this_plugin_key )
				{
					array_splice( $active_plugins, $this_plugin_key, 1 );
					array_unshift( $active_plugins, $this_plugin );
					update_option( 'active_plugins', $active_plugins );
				}
		}
	add_action( 'activated_plugin', 'wptrcd_1st', 0 );

	function wptrcd_rbams()
		{
			echo "\n\n<!--Start Disable Admin Bar and ToolBar Code-->\n\n";
			echo '<style type="text/css">#adminmenushadow,#adminmenuback{background-image:none}</style>';
			echo "\n\n<!--End Disable Admin Bar and ToolBar Code-->\n\n";
		}

	if ( $wp_version >= 3.2 )
		{
			add_action( 'admin_head', 'wptrcd_rbams', 0 );
		}

	function wptrcd_rbf28px()
		{
			echo "\n\n<!--Start Disable Admin Bar and ToolBar Code-->\n\n";
			echo '<style type="text/css">html.wp-toolbar,html.wp-toolbar #wpcontent,html.wp-toolbar #adminmenu,html.wp-toolbar #wpadminbar,body.admin-bar,body.admin-bar #wpcontent,body.admin-bar #adminmenu,body.admin-bar #wpadminbar{padding-top:0px !important}</style>';
			echo "\n\n<!--End Disable Admin Bar and ToolBar Code-->\n\n";
		}
	add_action( 'admin_print_styles', 'wptrcd_rbf28px', 21 );

	function wptrcd_atblh()
		{
			echo "\n\n<!--Start Disable Admin Bar and ToolBar Code-->\n\n";
?>
<style type="text/css">table#tbrcss td#tbrcss_ttl a:link,table#tbrcss td#tbrcss_ttl a:visited{text-decoration:none}table#tbrcss td#tbrcss_lgt,table#tbrcss td#tbrcss_lgt a{text-decoration:none}</style>
<table style="margin-left:6px;float:left;z-index:100;position:relative;left:0px;top:0px;background:none;padding:0px;border:0px;border-bottom:1px solid #DFDFDF" id="tbrcss" border="0" cols="4" width="97%" height="33">
<tr>
<td align="left" valign="center" id="tbrcss_ttl">
<?php

	echo '<a href="' . home_url() . '">' . __( get_bloginfo() ) . '</a>';

?>
</td>
<td align="right" valign="center" id="tbrcss_lgt">
<div style="padding-top:2px">
<?php

	echo date_i18n( get_option( 'date_format' ) );

?>

 @ 

<?php

	echo date_i18n( get_option( 'time_format' ) );

?>

<?php

	wp_get_current_user();

	$current_user = wp_get_current_user();

	if ( !( $current_user instanceof WP_User ) )
		return;

	echo ' | ' . $current_user->display_name . '';

	if ( is_multisite() && is_super_admin() )
		{
			if ( !is_network_admin() )
				{
					echo ' | <a href="' . network_admin_url() . '">' . __( 'Network Admin' ) . '</a>';
				}
			else
				{
					echo ' | <a href="' . get_DashBoard_url( get_current_user_id() ) . '">' . __( 'Site Admin' ) . '</a>';
				}
		}

	echo ' | <a href="' . wp_logout_url( home_url() ) . '">' . __( 'Log Out' ) . '</a>';

?>
</div>
</td>
<td width="8">
</td>
</tr>
</table>
<?php
			echo "\n<!--End Disable Admin Bar and ToolBar Code-->\n\n";
		}

	if ( $wp_version >= 3.3 )
		{
			add_action( 'in_admin_header', 'wptrcd_atblh', 0 );
			add_filter( 'show_wp_pointer_admin_bar', '__return_false' );
		}

	function wp_admin_bar_toolbar_init()
		{
			add_filter( 'show_admin_bar', '__return_false' );
			add_filter( 'wp_admin_bar_class', '__return_false' );
		}
	add_filter( 'init', 'wp_admin_bar_toolbar_init', 9 );

	function wptrcd_ruppoabpc()
		{
			echo "\n\n<!--Start Disable Admin Bar and ToolBar Code-->\n\n";
			echo '<style type="text/css">.show-admin-bar{display:none}</style>';
			echo "\n\n<!--End Disable Admin Bar and ToolBar Code-->\n\n";
		}
	add_action( 'admin_print_styles-profile.php', 'wptrcd_ruppoabpc', 0 );

	function wptrcd_prml( $links, $file )
		{
			if ( $file == plugin_basename( __FILE__ ) )
				{
					$links[] = '<a title="Offer a Beer to sLa" href="//slangji.wordpress.com/donate/">Donate</a>';
					$links[] = '<a title="Bugfix and Suggestions" href="//slangji.wordpress.com/contact/">Contact</a>';

					global $wp_version;

					if ( $wp_version < 3.8 )
						{
							$links[] = '<a title="Visit other author plugins" href="//slangji.wordpress.com/plugins/">Other Author Plugins</a>';
						}

					if ( $wp_version >= 3.8 )
						{
							$links[] = '<a title="Visit other author plugins" href="//slangji.wordpress.com/plugins/">Other</a>';
						}
				}
			return $links;
		}
	add_filter( 'plugin_row_meta', 'wptrcd_prml', 10, 2 );

	function wptrcd_hfl()
		{
			echo "\n<!--Plugin Disable Admin Bar and ToolBar 2013.0615.0936 Active - Tag ".md5(md5("".""))."-->\n";
			echo "\n<!--Site Optimized to Speedup Control Panel Minimize Memory Consumption with Disabled";

			global $wp_version;

			if ( $wp_version >= 3.3 )
				{
					echo " ToolBar";
				}

			if ( $wp_version >= 3.1 )
				{
					if ( $wp_version < 3.3 )
						{
							echo " Admin Bar";
						}
				}

			echo "-->\n\n";
		}
	add_action( 'wp_head', 'wptrcd_hfl', 0 );
	add_action( 'wp_footer', 'wptrcd_hfl', 0 );
?>