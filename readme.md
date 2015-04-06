## Synopsis

A lightweight calendar module for Silverstripe. Implements the popular javascript http://fullcalendar.io/ library.

## Features
* Lightbox event details
* Stylish colour inheritance based on user selection
* Hide past events automatically
* Easily change the style/theme to match your brand
* Change between month and agenda views

## Basic modification

### Javascript
Common settings can be changed from the CMS, but to add additional options just add
them to the calendarSettings. 
```
function calendarSettings(json) {
    $('#calendar').fullCalendar({
        //custom settings here
    })
}
```
For more setting options see http://fullcalendar.io/docs/

### CSS
All libraries that have been imported are using their current versions default flies. All modifications have been made and commented in a single file named style.css
Add to this file to customize the look and feel. 

## Screen shots

### Calendar View
![Calendar view](https://github.com/peavers/silverstripe-full-calendar/blob/master/images/screens/calendar.png?raw=true "Calendar view")
---------------------------------------
### Event view
![Event view](https://github.com/peavers/silverstripe-full-calendar/blob/master/images/screens/calendar-event.png?raw=true "Event view")

## Libraries used
* Fullcalendar
* Moment.js
* Fancybox v2
* Font Awesome