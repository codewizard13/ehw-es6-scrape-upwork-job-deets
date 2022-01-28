<?php
/*
Project Name:   EHW APP: Scrape Upwork Job Details
Main Prj File:  controller.php

This Filename:  ehw.lib.php
Date Created:   01/26/22
Date Updated:   01/28/22
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
Library of my portable functions that can be used in
any PHP project. Similar to WordPress functions.php.
*/

/**
 * Slurp web page content with cURL and return html
 */

function get_web_content($search_url) {
    
    // Slurp page code with cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $search_url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    return curl_exec($curl);
}

/**
 * Get and return array of image urls from web content
 * 
 * Sample Regex:
 * '!https://media-exp1.licdn.com/dms/image/[^\s"]*!';
 */
function get_img_urls($html, $reg) {
    // Find and return array of all image urls
    preg_match_all($reg, $html, $matches);

    // Get unique urls only
    $images = array_values(array_unique($matches[0]));
    return $images;
}

/**
 * Get and return array of urls from web content
 */
function get_urls($html, $reg) {
    // Find and return array of all image urls
    preg_match_all($reg, $html, $matches);

    // Get unique urls only
    $urls = array_values(array_unique($matches[0]));
    return $urls;
}