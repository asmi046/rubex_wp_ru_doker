<?php

namespace RubexJsonLd;

if (!defined('ABSPATH')) {
    exit;
}

class Plugin
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var \RubexJsonLd\Renderer
     */
    private $renderer;

    /**
     * @param string $config_path
     */
    public function __construct($config_path)
    {
        $this->config = $this->loadConfig($config_path);
        $this->renderer = new \RubexJsonLd\Renderer($this->config);
    }

    /**
     * @param string $config_path
     * @return array
     */
    private function loadConfig($config_path)
    {
        if (!is_readable($config_path)) {
            return array();
        }

        $config = include $config_path;

        return is_array($config) ? $config : array();
    }

    public function renderOrganization()
    {
        $this->renderer->renderOrganization();
    }

    public function renderWebSite()
    {
        $this->renderer->renderWebSite();
    }

    /**
     * @param int|null $post_id
     */
    public function renderArticle($post_id = null)
    {
        $this->renderer->renderArticle($post_id);
    }

    /**
     * @param int|null $post_id
     */
    public function renderBreadcrumb($post_id = null)
    {
        $this->renderer->renderBreadcrumb($post_id);
    }

    /**
     * @param array $types
     * @param int|null $post_id
     */
    public function renderGraph($types = array(), $post_id = null)
    {
        $this->renderer->renderGraph($types, $post_id);
    }

    /**
     * @param string $key
     */
    public function renderConfigKey($key)
    {
        $this->renderer->renderConfigKey($key);
    }
}
