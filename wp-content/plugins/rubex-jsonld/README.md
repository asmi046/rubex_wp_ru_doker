# Rubex JSON-LD

Minimal WordPress plugin for manual JSON-LD rendering.

## Principles

- No automatic output in `wp_head`.
- Render only where you call template functions manually.
- Configuration is stored in `config/schema-config.php`.

## Available template functions

- `rubex_jsonld_render_organization();`
- `rubex_jsonld_render_website();`
- `rubex_jsonld_render_article($post_id = null);`
- `rubex_jsonld_render_breadcrumb($post_id = null);`
- `rubex_jsonld_render_graph(array $types, $post_id = null);`

`$types` values for graph:

- `organization`
- `website`
- `article`
- `breadcrumb`

## Config

Edit `config/schema-config.php`.

Main sections:

- `defaults`
- `enabled_types`
- `organization`
- `website`

## Example graph call

```php
<?php rubex_jsonld_render_graph(array('organization', 'website')); ?>
```
