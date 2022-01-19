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

const bar = "~~~ ~~~ ~~~";
const rgb2hex = (rgb) => `#${rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/).slice(1).map(n => parseInt(n, 10).toString(16).padStart(2, '0')).join('')}`

const main = document.querySelector('.cfe-ui-job-details-content');
const sidebar = document.querySelector('.job-details-sidebar');

const prj_title = document.querySelector('.up-card-header').innerText;

console.log(main);
console.log(bar);
console.log(sidebar);
console.log(bar);
console.log(`Project Title: ${prj_title}`);

const occupation = document.querySelector('.cfe-ui-job-breadcrumbs a');
console.log(occupation);

const occ_link = `<a href ='${occupation.href}' target='_blank'>${occupation.innerText}</a>`;
console.log(occ_link);

const posted_time = document.querySelector('#posted-on').innerText;

const us_only = document.querySelector('.domestic-opening-label-color + span').innerText;

const job_descr = document.querySelector('.job-description').innerText;

const job_features = document.querySelector('.cfe-ui-job-features');

const hrs_per_wk = job_features.querySelector('li:nth-of-type(1) .header').innerText;
const hourly = job_features.querySelector('li:nth-of-type(1) small.text-muted').innerText;
// const hourly = job_features.querySelector('small.text-muted').innerText;

const prj_len = job_features.querySelector('li:nth-of-type(2) .header').innerText;
const prj_head = job_features.querySelector('li:nth-of-type(2) small.text-muted').innerText;

const exp_lev = job_features.querySelector('li:nth-of-type(3) .header').innerText;
const exp_lev_deets = job_features.querySelector('li:nth-of-type(3) small.text-muted').innerText;

const pay_range = job_features.querySelector('li:nth-of-type(4) .header').innerText;
const pay_type = job_features.querySelector('li:nth-of-type(4) small.text-muted').innerText;

const prj_type = document.querySelector('.up-card-section:nth-of-type(4) span').innerText;

// const rgb2hex = (rgb) => `#${rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/).slice(1).map(n => parseInt(n, 10).toString(16).padStart(2, '0')).join('')}`

const skills_sel = '.up-card-section:nth-of-type(5) span span';
const skills = document.querySelectorAll(skills_sel);
console.log(skills);

[...skills].forEach((skill, i) => {
   console.log(skill.innerText);
   console.log(skill.querySelector('a').href);
   
   attrs = skill.attributes;
   // console.log(attrs);
   
   parent_el = skill.parentElement;
   parent_tag_name = parent_el.tagName.toLowerCase();
   console.log(parent_el);
   console.log('Parent Tag Name: ' + parent_tag_name);
   console.log('Skill a Classlist:')
   console.log(skill_clist_str);
   
   // Compute selector for current skill element
   skill_classList = skill.querySelector('a').classList;
   skill_clist_str = [...skill_classList].join('.');
   curr_tag_sel = skill.tagName.toLowerCase();
   curr_tag_sel +=  ' a.' + skill_clist_str;
   console.log(curr_tag_sel);
   
   // Get computed styles with selector
   var skillStyles = window.getComputedStyle(skill.querySelector('a'));
   console.log ("---- STYLES: -----");
   console.log(skillStyles);
   
   console.log(rgb2hex(skillStyles.backgroundColor));
   console.log(skillStyles.getPropertyValue('background-color'));
   
   // Store relevant value set as object properties
   var ourStyles = {};
   ourStyles.className = 'skill';
   ourStyles.colorHex = rgb2hex(skillStyles.color);
   ourStyles.bgColorHex = rgb2hex(skillStyles.backgroundColor);
   ourStyles.alignItems = skillStyles.alignItems;
   ourStyles.height = skillStyles.height;
   ourStyles.margin = skillStyles.margin;
   ourStyles.padding = skillStyles.padding;
   ourStyles.borderRad = skillStyles.borderRadius;
   ourStyles.fontSize = skillStyles.fontSize;
   ourStyles.lineHeight = skillStyles.lineHeight;
   
   console.log(ourStyles);
   
   
   var style_class_def = `
   .${ourStyles.className} {
      color: ${ourStyles.colorHex};
      background-color: ${ourStyles.bgColorHex};
   }
   `;
   
   var styled_skill = `<a href="#" class="skill">${skill.innerText}</a>`;
   console.log(style_class_def);
   console.log(styled_skill);
   
});

// styled_skill still needs href URL