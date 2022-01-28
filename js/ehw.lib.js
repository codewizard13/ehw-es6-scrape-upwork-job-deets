/*
Project Name:   EHW APP: Scrape Upwork Job Details
Main Prj File:  controller.php

This Filename:  ehw.lib.js
Date Created:   01/19/22
Date Updated:   01/28/22
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  This JavaScript file is a LIBRARY of helper functions.

TAGS:   JavaScript, ES6, DOM Manipulation, App, Eric L. Hepperle, Eric Hepperle

Usage:
  Use with controller.php

Sample results: 
--

Requires:
  * controller.php
  * Browser
    
Demonstrates:
  * Vanilla JavaScript
  * JavaScript ES6/ECMAScript2015
  * 

Future:
  * Use fetch API or CURL to grab webpage content with controller.php
*/

var data = {
  "data": {
    "x": "1",
    "y": "1",
    "url": "http://url.com"
  },
  "event": "start",
  "show": 1,
  "id": 50
}


const autos = {
    "cars": [
        {
            "make": "Ford",
            "model": "Mustang",
            "year": 1979,
        },
        {
            "make": "Ford",
            "model": "Fiesta",
            "year": 1987,
        },
        {
            "make": "Chevy",
            "model": "Malibu",
            "year": 1979,
        },
    
    ],
    "trucks": [
        {
            "make": "Ford",
            "model": "Mustang",
            "year": 1979,
        },
        {
            "make": "Ford",
            "model": "Fiesta",
            "year": 1987,
        },
        {
            "make": "Chevy",
            "model": "Malibu",
            "year": 1979,
        },    
    ],
}

const org = {
    vars: {},
    websites: {
       erichepperle: {
          site_abbrev: "EHW",
          site_name: "erichepperle.com",
          site_pupose: "Eric's personal website",
          get_full_name: function () { return "https://" + this.site_name},
       },
       erichepperledesigns: {
          site_abbrev: "EHDS",
          site_name: "erichepperledesigns.com",
          site_purpose: "Eric's business website for freelance design & software projects",
          site_descr: null,
          get_full_name: function () { return "https://" + this.site_name},
       },
       organicharvestm: {
          site_abbrev: "OHM",
          site_name: "organicharvestm.org",
          site_pupose: "Eric's personal Christian ministry websites",
          site_descr: "",
          get_full_name: function () { return "https://" + this.site_name},         
       },
    }
 }

function create_results_box() {
    // create new element
    eh_div = document.createElement('div');

    // give class to element
    eh_div.id = "ehw-content";

    // define content to display
    var placeholder_cont = "This is PLACEHOLDER TEXT";

    // create a text node
    var text_node = document.createTextNode(placeholder_cont);

    // add text node to div
    eh_div.appendChild(text_node);

    // eh_div.innerHtml = "Hello!";

    // add div to body
    document.body.prepend(eh_div);
}
create_results_box();

function update_results(res) {
    
    if (res !== '' && res !== undefined) {
        res = res;
    } else {
        res = "You must pass a 'res' value to the update_results() function";
    }

    // define our content element handle
    const cont_el = document.querySelector('#ehw-content');

    // change content text
    cont_el.innerHTML = "<h4>Stringified JSON data</h4>";
    cont_el.innerHTML += res;    
}
update_results("Hello DOLLY!");
update_results("")
update_results("***")
//alert('press enter to change the message');
//update_results('Apples are AWESOME')


/*
function process_data(data){

    // create new element
    eh_div = document.createElement('div');

    // give class to element
    eh_div.id = "ehw-content";

    // define content to display
    var content =`${JSON.stringify(data)}`;
    content += `<br><br>${org}`;

    // create a text node
    var text_node = document.createTextNode("hello");

    // add text node to div
    eh_div.appendChild(text_node);

    // eh_div.innerHtml = "Hello!";

    // add div to body
    document.body.prepend(eh_div);

    // ----- Change Div Contents ---

    // define our content element handle
    const cont_el = document.querySelector('#ehw-content');

    // change content text
    cont_el.innerHTML = "<h4>Stringified JSON data</h4>";
    cont_el.innerHTML += content;

}
process_data(org);
*/





// loop through and print out json data
/*
function appendData(data) {
  var mainContainer = document.getElementById("myData");
  for (var i = 0; i < data.length; i++) {
    var div = document.createElement("div");
    div.innerHTML = 'Name: ' + data[i].firstName + ' ' + data[i].lastName;
    mainContainer.appendChild(div);
  }
}
*/


// not working with foreach yet ...
function formatJSONAutos_01(obj) {
    
    let keys = Object.keys(obj);
    console.log(`keys: ${keys}`);
    
    for (let i=0; i < keys.length; i++) {
        let p = document.createElement('p');
        console.log(obj[i]);
    }
}
formatJSONAutos_01(data);

