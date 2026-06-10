<?php

namespace RubexJsonLd;

use RubexJsonLd\Builders\ArticleBuilder;
use RubexJsonLd\Builders\BreadcrumbBuilder;
use RubexJsonLd\Builders\OrganizationBuilder;
use RubexJsonLd\Builders\WebSiteBuilder;

if (!defined('ABSPATH')) {
    exit;
}

class Renderer
{
    /**
     * @var array
     */
    private $config;

    public function __construct($config)
    {
        $this->config = is_array($config) ? $config : array();
    }

    public function renderOrganization()
    {
        if (!$this->isTypeEnabled('organization')) {
            return;
        }

        $schema = OrganizationBuilder::build($this->config);
        $this->outputSingle($schema);
    }

    public function renderWebSite()
    {
        if (!$this->isTypeEnabled('website')) {
            return;
        }

        $schema = WebSiteBuilder::build($this->config);
        $this->outputSingle($schema);
    }

    /**
     * @param int|null $post_id
     */
    public function renderArticle($post_id = null)
    {
        if (!$this->isTypeEnabled('article')) {
            return;
        }

        $schema = ArticleBuilder::build($post_id, $this->config);
        $this->outputSingle($schema);
    }

    /**
     * @param int|null $post_id
     */
    public function renderBreadcrumb($post_id = null)
    {
        if (!$this->isTypeEnabled('breadcrumb')) {
            return;
        }

        $schema = BreadcrumbBuilder::build($post_id);
        $this->outputSingle($schema);
    }

    /**
     * @param array $types
     * @param int|null $post_id
     */
    public function renderGraph($types = array(), $post_id = null)
    {
        if (empty($types) || !is_array($types)) {
            return;
        }

        $graph = array();

        foreach ($types as $type) {
            $schema = $this->buildByType($type, $post_id);
            if (!empty($schema)) {
                $graph[] = $schema;
            }
        }

        if (empty($graph)) {
            return;
        }

        $this->outputGraph($graph);
    }

    /**
     * Renders a top-level config key payload as-is.
     * Example: renderConfigKey('organization').
     *
     * @param string $key
     */
    public function renderConfigKey($key)
    {
        if (!is_string($key) || $key === '') {
            return;
        }

        if (!isset($this->config[$key]) || !is_array($this->config[$key])) {
            return;
        }

        $this->printScript($this->config[$key]);
    }

    /**
     * @param string $type
     * @param int|null $post_id
     * @return array
     */
    private function buildByType($type, $post_id = null)
    {
        switch ($type) {
            case 'organization':
                return $this->isTypeEnabled('organization') ? OrganizationBuilder::build($this->config) : array();
            case 'website':
                return $this->isTypeEnabled('website') ? WebSiteBuilder::build($this->config) : array();
            case 'article':
                return $this->isTypeEnabled('article') ? ArticleBuilder::build($post_id, $this->config) : array();
            case 'breadcrumb':
                return $this->isTypeEnabled('breadcrumb') ? BreadcrumbBuilder::build($post_id) : array();
            default:
                return array();
        }
    }

    /**
     * @param array $schema
     */
    private function outputSingle($schema)
    {
        if (empty($schema) || !is_array($schema)) {
            return;
        }

        if (!isset($schema['@context'])) {
            $schema['@context'] = $this->getContext();
        }

        $this->printScript($schema);
    }

    /**
     * @param array $graph
     */
    private function outputGraph($graph)
    {
        $payload = array(
            '@context' => $this->getContext(),
            '@graph' => array_values($graph),
        );

        $this->printScript($payload);
    }

    /**
     * @param array $payload
     */
    private function printScript($payload)
    {
        $options = JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES;

        if (!empty($this->config['defaults']['pretty_print'])) {
            $options |= JSON_PRETTY_PRINT;
        }

        $json = wp_json_encode($payload, $options);

        if (!$json) {
            return;
        }

        echo '<script type="application/ld+json">' . $json . '</script>' . "\n";
    }

    /**
     * @return string
     */
    private function getContext()
    {
        if (!empty($this->config['defaults']['@context'])) {
            return (string) $this->config['defaults']['@context'];
        }

        return 'https://schema.org';
    }

    /**
     * @param string $type
     * @return bool
     */
    private function isTypeEnabled($type)
    {
        if (!isset($this->config['enabled_types']) || !is_array($this->config['enabled_types'])) {
            return true;
        }

        if (!array_key_exists($type, $this->config['enabled_types'])) {
            return true;
        }

        return (bool) $this->config['enabled_types'][$type];
    }
}
