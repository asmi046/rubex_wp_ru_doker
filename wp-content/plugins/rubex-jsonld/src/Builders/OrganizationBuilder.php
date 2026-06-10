<?php

namespace RubexJsonLd\Builders;

if (!defined('ABSPATH')) {
    exit;
}

class OrganizationBuilder
{
    /**
     * @param array $config
     * @return array
     */
    public static function build($config)
    {
        $organization = isset($config['organization']) && is_array($config['organization'])
            ? $config['organization']
            : array();

        $defaults = array(
            '@type' => 'Organization',
            'name' => !empty($organization['name']) ? (string) $organization['name'] : get_bloginfo('name'),
            'url' => !empty($organization['url']) ? (string) $organization['url'] : home_url('/'),
        );

        $schema = array_merge($defaults, $organization);

        if (!empty($schema['phone']) && empty($schema['telephone'])) {
            $schema['telephone'] = (string) $schema['phone'];
            unset($schema['phone']);
        }

        if (isset($schema['sameAs'])) {
            $schema['sameAs'] = self::normalizeSameAs($schema['sameAs']);

            if (empty($schema['sameAs'])) {
                unset($schema['sameAs']);
            }
        }

        if (empty($schema['@type'])) {
            $schema['@type'] = 'Organization';
        }

        return $schema;
    }

    /**
     * @param mixed $raw_same_as
     * @return array
     */
    private static function normalizeSameAs($raw_same_as)
    {
        if (is_string($raw_same_as)) {
            $raw_same_as = explode(',', $raw_same_as);
        }

        if (!is_array($raw_same_as)) {
            return array();
        }

        $links = array();

        foreach ($raw_same_as as $link) {
            $link = trim((string) $link);

            if ($link !== '') {
                $links[] = $link;
            }
        }

        return array_values(array_unique($links));
    }
}
