<?php

namespace RubexJsonLd\Builders;

if (!defined('ABSPATH')) {
    exit;
}

class WebSiteBuilder
{
    /**
     * @param array $config
     * @return array
     */
    public static function build($config)
    {
        $website = isset($config['website']) && is_array($config['website'])
            ? $config['website']
            : array();

        $defaults = array(
            '@type' => 'WebSite',
            'name' => !empty($website['name']) ? (string) $website['name'] : get_bloginfo('name'),
            'url' => !empty($website['url']) ? (string) $website['url'] : home_url('/'),
        );

        $schema = array_merge($defaults, $website);

        if (empty($schema['@type'])) {
            $schema['@type'] = 'WebSite';
        }

        return $schema;
    }
}
