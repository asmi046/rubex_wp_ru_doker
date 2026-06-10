<?php

namespace RubexJsonLd\Builders;

if (!defined('ABSPATH')) {
    exit;
}

class BreadcrumbBuilder
{
    /**
     * @param int|null $post_id
     * @return array
     */
    public static function build($post_id = null)
    {
        if ($post_id === null) {
            $post_id = get_queried_object_id();
        }

        $post_id = (int) $post_id;

        if ($post_id <= 0) {
            return array();
        }

        $post = get_post($post_id);
        if (!$post) {
            return array();
        }

        $items = array();
        $position = 1;

        $items[] = self::makeItem($position++, home_url('/'), get_bloginfo('name'));

        if ($post->post_type === 'page') {
            $ancestor_ids = array_reverse(get_post_ancestors($post_id));

            foreach ($ancestor_ids as $ancestor_id) {
                $items[] = self::makeItem($position++, get_permalink($ancestor_id), get_the_title($ancestor_id));
            }
        } else {
            $categories = get_the_category($post_id);

            if (!empty($categories) && !is_wp_error($categories)) {
                $primary_category = $categories[0];
                $items[] = self::makeItem($position++, get_category_link($primary_category->term_id), $primary_category->name);
            }
        }

        $items[] = self::makeItem($position, get_permalink($post_id), get_the_title($post_id));

        if (count($items) < 2) {
            return array();
        }

        return array(
            '@type' => 'BreadcrumbList',
            'itemListElement' => $items,
        );
    }

    /**
     * @param int $position
     * @param string $url
     * @param string $name
     * @return array
     */
    private static function makeItem($position, $url, $name)
    {
        return array(
            '@type' => 'ListItem',
            'position' => (int) $position,
            'item' => array(
                '@id' => (string) $url,
                'name' => wp_strip_all_tags((string) $name),
            ),
        );
    }
}
