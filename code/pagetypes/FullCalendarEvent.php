<?php

/**
 * Class FullCalendarEvent
 */
class FullCalendarEvent extends Page
{
    private static $singular_name = "[Calendar] Event item";

    private static $plural_name = "[Calendar] Event items";

    private static $can_be_root = false;

    private static $allowed_children = array();

    private static $db = array(
        'IncludeOnCalendar' => 'Boolean',
        'Title'             => 'Varchar(255)',
        'StartDate'         => 'Date',
        'EndDate'           => 'Date',
        'Url'               => 'Varchar(255)',
        'BackgroundColor'   => 'Varchar(255)',
        'TextColor'         => 'Varchar(255)',
        'ShortDescription'  => 'Varchar(255)'
    );

    private static $defaults = array(
        'IncludeOnCalendar' => true,
        'TextColor'         => '#ffffff', //white
        'BackgroundColor'   => '#658fcd' //blue
    );

    /**
     * Setup the basic CMS user fields
     *
     * @return mixed
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab("Root.Main", array(

            TextareaField::create('ShortDescription', 'A short description')
                ->setDescription("Text shown when an event is first clicked on. Should be a quick description of the event. </br><strong>Limit 255 characters</strong>"),

            DropdownField::create('IncludeOnCalendar', 'Include on calendar')->setSource(array(
                true  => "Yes",
                false => "No"
            )),

            DateField::create("StartDate", "Start date"),
            DateField::create("EndDate", "End date"),

            DropdownField::create("TextColor", "Text colour")->setSource(array(
                "#ffffff" => "White",
                "#000000" => "Black",
            )),

            DropdownField::create("BackgroundColor", "Background colour")->setSource(array(
                "#e6b31b" => "Yellow",
                "#a6c03c" => "Green",
                "#c35441" => "Red",
                "#658fcd" => "Blue",
                "#c3c6a8" => "Tan",
                "#000000" => "Black"
            )),
        ));

        return $fields;
    }

    /**
     * Clear the cache if a new event is written
     */
    public function onAfterWrite()
    {
        $cache = SS_Cache::factory('calendar');
        $cache->remove('events');

        parent::onAfterWrite();
    }
}