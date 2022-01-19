/*
Program Name:   EHW APP: Scrape Upwork Job Details
File Name:      App.js
Date Created:   01/19/22
Date Modified:  --
Version:        1.00
Programmer:     Eric L. Hepperle

TAGS:           Eric Hepperle, JavaScript, ES6, DOM Manipulation, App, Eric L. Hepperle

Purpose: 
    This JavaScript file contains the main "business logic" and primary
    mechanics of the current project. This project scrapes job details
    from Upwork job posts.
    
Usage:
    Navigate to any Upwork job post page and paste this code into the
    browser developer console and hit enter to run.

Sample results: 

--

Requires:
	* controller.php
    * Browser
    
Demonstrates:
    * Vanilla JavaScript
    * JavaScript ES6/ECMAScript2015

*/

console.log("HELLO!   I'm in App.js");


/*
// get chapter vids
const chapters = document.querySelectorAll('.classroom-toc-section__toggle-title');
[...chapters].forEach((el, i) => {
   console.log(el.innerText);
});

console.log("~~~ ~~~ ~~~");

// get sub-chapter vids
const subchaps = document.querySelectorAll('.classroom-toc-item__title');
[...subchaps].forEach((el, i) => {
   console.log(el.innerText);
});
*/
const menu = document.querySelector('.classroom-layout__sidebar');
const menu_sec_sel = '.classroom-toc-section';
const menu_ch_sel = '.classroom-toc-section__toggle-title';
const menu_sub_sel = '.classroom-toc-item__title';

const menu_sections = menu.querySelectorAll(menu_sec_sel);
console.log(menu_sections.length);

// get chapter vids
[...menu_sections].forEach((sec, i) => {
   //console.log(sec.innerText);

   var chapter = sec.querySelector(menu_ch_sel);
   console.log('~~~ ~~~ ~~~');
   console.log(chapter.innerText);

   var subchaps = sec.querySelectorAll(menu_sub_sel);

   [...subchaps].forEach((sub, j) => {
       //console.log(sub.innerText);
       var sub_txt = sub.innerText.split("(Viewed)")[0].trim();
       console.log(`[${sub_txt}]`);
   });
});

// Get rest of info
const course_title = '';
const instr_name = '';
const instr_avatar = '';
const instr_headline = '';
const instr_follow_url = '';

// Course details
const course_duration = '';
const course_level = '';
const release_date = '';
const course_rating_num = '';
const course_stars = '';
const course_descr = '';

const objectives = '';
const skills = '';
