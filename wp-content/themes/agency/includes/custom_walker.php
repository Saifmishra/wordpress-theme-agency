<?php


class hasagency_Theme_Custom_Walker extends Walker_Nav_Menu{

    public function start_lvl(&$output, $depth=0, $args=[]){
        $output .= "<span class=\"menu-toggle\"><i class=\"far fa-angle-down\"></i></span><ul class='sub-menu'>";
    }
    public function start_el(&$output,$item, $depth=0, $args=[], $id=0){
        $output .= "<li class=''>";
        $output .= $args->before;
        $output .= '<a href="' .$item->url .'"><span class="menu-text">';
        $output .= $args->link_before . $item->title .$args->link_after;
        $output .= '</span></a>';
        $output .= $args->after;
    }

    public function end_el(&$output,$item, $depth=0, $args=[], $id=0){
        $output .= "";
    }
    public function end_lvl(&$output, $depth=0, $args=[]){
        $output .= "</ul>";
    }

}
//$custom_walker = new hasagency_Theme_Custom_Walker();
