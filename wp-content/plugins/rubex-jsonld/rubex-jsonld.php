<?php
/**
 * Plugin Name: Rubex JSON-LD
 * Description: Minimal JSON-LD renderer with config file and manual render methods.
 * Version: 1.0.0
 * Author: Rubex
 */

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/src/Builders/OrganizationBuilder.php';
require_once __DIR__ . '/src/Builders/WebSiteBuilder.php';
require_once __DIR__ . '/src/Builders/ArticleBuilder.php';
require_once __DIR__ . '/src/Builders/BreadcrumbBuilder.php';
require_once __DIR__ . '/src/Renderer.php';
require_once __DIR__ . '/src/Plugin.php';

$GLOBALS['rubex_jsonld_plugin'] = new RubexJsonLd\Plugin(__DIR__ . '/config/schema-config.php');

if (!function_exists('rubex_jsonld_plugin')) {
    /**
     * @return RubexJsonLd\Plugin|null
     */
    function rubex_jsonld_plugin()
    {
        return isset($GLOBALS['rubex_jsonld_plugin']) ? $GLOBALS['rubex_jsonld_plugin'] : null;
    }
}

if (!function_exists('rubex_jsonld_render_organization')) {
    function rubex_jsonld_render_organization()
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderOrganization();
        }
    }
}

if (!function_exists('rubex_jsonld_render_website')) {
    function rubex_jsonld_render_website()
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderWebSite();
        }
    }
}

if (!function_exists('rubex_jsonld_render_article')) {
    function rubex_jsonld_render_article($post_id = null)
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderArticle($post_id);
        }
    }
}

if (!function_exists('rubex_jsonld_render_breadcrumb')) {
    function rubex_jsonld_render_breadcrumb($post_id = null)
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderBreadcrumb($post_id);
        }
    }
}

if (!function_exists('rubex_jsonld_render_graph')) {
    function rubex_jsonld_render_graph($types = array(), $post_id = null)
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderGraph($types, $post_id);
        }
    }
}

if (!function_exists('rubex_jsonld_render_key')) {
    function rubex_jsonld_render_key($key)
    {
        $plugin = rubex_jsonld_plugin();

        if ($plugin) {
            $plugin->renderConfigKey($key);
        }
    }
}
