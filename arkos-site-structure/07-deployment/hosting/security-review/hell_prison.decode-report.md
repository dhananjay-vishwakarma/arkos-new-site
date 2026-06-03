# hell_prison.txt Decode Report

Decoded locally without executing the payload.

## Files

- Raw base64: `hell_prison.raw.txt`
- Decoded PHP text: `hell_prison.decoded.php.txt`

## Hashes

- Raw SHA256: `4ececbdd2c7cbe1c958d1803bcefd8539e3522199151cdbb683a2adb7e71b4c8`
- Decoded SHA256: `c33c796d368f5131f5e46d86b958efd9b97389cf2f66a7c9d1224163278812a4`

## High-Level Assessment

This is malicious PHP SEO/cloaking malware. It gathers request context, detects bots/search-engine referrers, calls external command-and-control domains, can emit HTML/XML/robots responses, can issue 301/404/500 responses, and can rewrite `robots.txt` in the document root.

## Decoded Remote Domains

- `1033-bright012.convoluty.xyz`
- `1033-bright012.ephemeix.top`
- `1033-bright012.quantuatt.xyz`
- `1033-bright012.technexp.top`

## PHP Class / Methods

- `__construct`
- `build_param`
- `handle_response`
- `request`
- `is_bot`
- `get_request_uri`
- `is_from_search_engine`
- `create_robots`
- `is_https`

## Keyword Indicators

- `curl_init`: 1
- `curl_exec`: 1
- `file_put_contents`: 2
- `robots.txt`: 3
- `sitemap.xml`: 1
- `HTTP_USER_AGENT`: 1
- `HTTP_REFERER`: 1
- `googlebot`: 1
- `okhtml`: 2
- `okxml`: 2
- `okrobots`: 2
- `301page`: 2
- `404page`: 1
- `getcontent500page`: 1
- `nobotuseragent`: 2

## Notable Static Values

- `1033-bright012`
- `'googlebot', 'bing', 'yahoo', 'google', 'Googlebot'`
- `'google.', 'bing.', 'yahoo.'`

## Recommended Immediate Actions

- Preserve a full file and database backup before cleanup.
- Quarantine `wp-content/uploads/hell_prison.txt` and any server-side include/reference that loads it.
- Search the site for this decoded SHA256, raw SHA256, remote domains, and marker string `1033-bright012`.
- Review suspicious plugin/upload folders already identified in the inventory.
- Rebuild WordPress core from clean source and review the active `arkos` theme and all plugins before reuse.
