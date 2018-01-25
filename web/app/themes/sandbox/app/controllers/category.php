<?php


namespace App;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Sober\Controller\Controller;


class Category extends Controller {
    
    public function testimonials() {
        
        global $post;
        
        try {
            return template( 'partials/testimonials/' . $post->post_name );
        } catch ( \InvalidArgumentException $e ) {
            return null;
        }
    }
    
}
