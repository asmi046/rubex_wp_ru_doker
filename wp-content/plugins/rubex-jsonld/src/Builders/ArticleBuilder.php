<?php

namespace RubexJsonLd\Builders;

if (!defined('ABSPATH')) {
    exit;
}

class ArticleBuilder
{
    /**
     * @param int|null $post_id
     * @param array $config
     * @return array
     */
    public static function build($post_id = null, $config = array())
    {
        if ($post_id === null) {
            $post_id = get_queried_object_id();
        }

        $post_id = (int) $post_id;

        if ($post_id <= 0) {
            return array();
        }

        $post = get_post($post_id);

        if (!$post || $post->post_status !== 'publish') {
            return array();
        }

        $author_name = get_the_author_meta('display_name', (int) $post->post_author);
        $organization_name = !empty($config['organization']['name'])
            ? (string) $config['organization']['name']
            : get_bloginfo('name');

        $schema = array(
            '@type' => 'Article',
            'mainEntityOfPage' => get_permalink($post_id),
            'headline' => wp_strip_all_tags(get_the_title($post_id)),
            'datePublished' => get_post_time('c', true, $post_id),
            'dateModified' => get_post_modified_time('c', true, $post_id),
            'author' => array(
                '@type' => 'Person',
                'name' => $author_name ? $author_name : get_bloginfo('name'),
            ),
            'publisher' => array(
                '@type' => 'Organization',
                'name' => $organization_name,
            ),
        );

        $description = has_excerpt($post_id)
            ? wp_strip_all_tags(get_the_excerpt($post_id))
            : wp_strip_all_tags(wp_trim_words($post->post_content, 35, ''));

        if ($description !== '') {
            $schema['description'] = $description;
        }

        $image_url = get_the_post_thumbnail_url($post_id, 'full');
        if ($image_url) {
            $schema['image'] = $image_url;
        }

        return $schema;
    }
}
