<?php 

class Mori_plugins_hooks {

    function __construct() {
        add_action('upload_mimes',array(&$this,'mori_mime_type'));

    }

    function mori_mime_type($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }

    
}

new Mori_plugins_hooks();
