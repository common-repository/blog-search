<?php
/*
Plugin Name: Blog-search
Plugin URI: http://www.arcgate.com/
Description: This plugin allows you to search within blogs.
Version: 1.0
Author: Sunil Mahendra
Author URI: http://www.arcgate.com
*/
function widget_blogSearch()
{
    $path=plugins_url('/blog-search/');
    echo "<script type='text/javascript' src='wp-includes/js/jquery/jquery.js'></script>";
    echo "<script type='text/javascript' src='".$path."/js/custom.js'></script>";
    
   ?>
     <form method="post" action="">
        <input type="hidden" id="url" value="<? echo $path ?>" >
        <table style="border:1px dotted #000">
            <tr><td>
                <strong>Blog Search</strong>
            </td></tr>
             <tr><td>
                <table>
                    <tr>
                        <td>Term:</td>
                        <td><input type="text" id="term" size="10"></td>
                        <td><input type="button" value="Search" id="search"></td>
                    </tr>
                    <tr><td colspan=3><div id="result"></div></td></tr>
                </table>
            </td></tr>
        </table>
      </form>   
   
   <?
}
function blogSearch_init() //initilisation
{
   register_sidebar_widget(__('Blog Search'), 'widget_blogSearch');   
}
add_action("plugins_loaded", "blogSearch_init"); // load plugin

?>