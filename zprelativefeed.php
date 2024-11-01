<?php

/*
Plugin Name: ZP Relative Feed
Plugin URI: http://wordpress.org/extend/plugins/zprelativefeed/
Description: Converts relative links in feeds into absolute links by adding the base of the site from server environment variable.
Version: 0.1
Author: zetaprints
Author URI: http://www.zetaprints.com
License: MIT
*/

/**
 * Copyright (c) 2010 ZetaPrints Ltd.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

/**
 * Insert or replace scheme, domain name and ports values
 * from server environment variable
 *
 * @param string $url
 * @return string
 */
function zp_relative_feed_set_host ($url) {
  $parsed_url = @parse_url($url);

  if ($parsed_url === false)
    return $url;

  if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')
    $url =  'https';
  else
    $url = 'http';

  $url .= '://' . $_SERVER['SERVER_NAME'];

  if (isset($parsed_url['port']))
    $url .= ':' . $parsed_url['port'];

  if (isset($parsed_url['path']))
    $url .= $parsed_url['path'];
  else
    $url .= '/';

  if (isset($parsed_url['query']))
    $url .= '?' . $parsed_url['query'];

  if (isset($parsed_url['fragment']))
    $url .= '#' . $parsed_url['fragment'];

  return $url;
}

//Register function as filter
add_filter('option_home', zp_relative_feed_set_host);
add_filter('option_url', zp_relative_feed_set_host);
add_filter('option_siteurl', zp_relative_feed_set_host);

?>
