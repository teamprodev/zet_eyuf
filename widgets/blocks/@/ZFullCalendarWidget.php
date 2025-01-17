<?php

namespace zetsoft\widgets\blocks;

use zetsoft\system\Az;
use zetsoft\system\helpers\ZArrayHelper;
use function GuzzleHttp\Psr7\str;
use zetsoft\system\kernels\ZWidget;
use kartik\widgets\Select2;
use yii\web\JsExpression;

/**
 *
 * Class ZKSelect2Widget
 * http://demos.krajee.com/widget-details/select2
 *
 * Created By: Asror Zakirov
 * Refactored: Asror Zakirov
 */
class ZFullCalendarWidget extends ZWidget
{

    /**
     * Configuration
     */
    public $config = [];
    public $_config = [


    ];


    /**
     *
     * Plugin Events
     * https://select2.org/programmatic-control/events
     */
    public $event = [];
    public $_event = [

    ];

     public $layout = [];
     public $_layout = [

        'main' => <<<HTML
    <script>

        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                /**
                 * https://fullcalendar.io/docs/height
                 * Sets the height of the entire calendar, including header and footer.
                 */


                /**
                 * https://fullcalendar.io/docs/contentHeight
                 * Sets the height of the view area of the calendar.
                 */


                /**
                 * https://fullcalendar.io/docs/aspectRatio
                 * Sets the width-to-height aspect ratio of the calendar.
                 */
                'aspectRatio': 1.35,

                /**
                 * https://fullcalendar.io/docs/timeZone
                 * A time zone is a region of the world that serves as a context for displaying dates.
                 */
                'timezone': 'local',

                /**
                 * https://fullcalendar.io/docs/plugin-index
                 */


                /**
                 * https://fullcalendar.io/docs/handleWindowResize
                 * Whether to automatically resize the calendar when the browser window resizes.
                 */
                'handleWindowResize': true,

                /**
                 * https://fullcalendar.io/docs/windowResizeDelay
                 * The time the calendar will wait to adjust its size after a window resize occurs, in milliseconds.
                 */
                'windowResizeDelay': 100,

                /**
                 * https://fullcalendar.io/docs/windowResize
                 * Triggered after the calendar’s dimensions have been changed due to the browser window being resized.
                 */


                /**
                 * https://fullcalendar.io/docs/viewSkeletonRender
                 * Triggered after a view’s non-date-related DOM structure has been rendered.
                 */


                /**
                 * https://fullcalendar.io/docs/viewSkeletonDestroy
                 * Triggered before a view’s DOM skeleton is removed from the DOM.
                 */


                /**
                 * https://fullcalendar.io/docs/datesRender
                 * Triggered when a new set of dates has been rendered.
                 */


                /**
                 * https://fullcalendar.io/docs/datesDestroy
                 * Triggered before the currently rendered set of dates is removed from the DOM.
                 */


                /**
                 * https://fullcalendar.io/docs/bootstrapFontAwesome
                 * bootstrapFontAwesome-Работает только с themeSystem "bootstrap"
                 */



                /**
                 * https://fullcalendar.io/docs/footer
                 */
                'footer': {
                    'left': '',
                    'center': '',
                    'right': ''
                },

                /**
                 * https://fullcalendar.io/docs/titleFormat
                 * Defines the controls at the bottom of the calendar.
                 */
                'titleFormat': {
                    'year': 'numeric', //'2-digit' will produce something like 18
                    'month': '2-digit',// 'long','short','narrow', 'numeric', '2-digit'
                    'day': '2-digit', //'numeric' , '2-digit'
                    'weekday': 'short', //'long', 'short', 'narrow'
                    'hour': 'numeric',  // 'numeric' ,'2-digit'
                    'minute': 'numeric', // 'numeric' ,'2-digit'
                    'second': 'numeric', // 'numeric' or '2-digit'
                    'hour12': true,
                    'timeZoneName': 'short'
                },

                /**
                 * https://fullcalendar.io/docs/titleRangeSeparator
                 * Determines the separator text when formatting the date range in the toolbar title.
                 */
                'titleRangeSeparator': " – ",

                /**
                 * https://fullcalendar.io/docs/buttonText
                 * Text that will be displayed on buttons of the header/footer.
                 */
                /*'buttonText' : {
                    'today': 'today',
                    'month': 'month',
                    'week': 'week',
                    'day': 'day',
                    'list': 'list'
                },*/


                /**
                 * https://fullcalendar.io/docs/customButtons
                 * Defines custom buttons that can be used in the header/footer.
                 */






                'fixedWeekCount': true,

                /**
                 * https://fullcalendar.io/docs/showNonCurrentDates
                 * In month view, whether dates in the previous or next month should be rendered at all.
                 */
                'showNonCurrentDates': true,

                /**
                 * https://fullcalendar.io/docs/allDaySlot
                 * Determines if the “all-day” slot is displayed at the top of the calendar.
                 */
                'allDaySlot': true,

                /**
                 * https://fullcalendar.io/docs/allDayText
                 * The text titling the “all-day” slot at the top of the calendar.
                 */
                'allDayText': 'all-day',

                /**
                 * https://fullcalendar.io/docs/slotEventOverlap
                 * Determines if timed events in TimeGrid view should visually overlap.
                 */
                'slotEventOverlap': true,

                /**
                 * https://fullcalendar.io/docs/timeGridEventMinHeight
                 * Guarantees that events within the TimeGrid views will be a minimum height.
                 */
                'timeGridEventMinHeight': null,

                /**
                 * https://fullcalendar.io/docs/listDayFormat
                 * A Date Formatter that affects the text on the left side of the day headings in list view.
                 */
                'listDayFormat': false,

                /**
                 * https://fullcalendar.io/docs/listDayAltFormat
                 * A Date Formatter that affects the text on the right side of the day headings in list view.
                 */
                'listDayAltFormat': false,

                /**
                 * https://fullcalendar.io/docs/noEventmessages
                 * The text that is displayed in the middle of list view, alerting the user that there are no events within the given range.
                 */
                'noEventmessages': 'No events to display',

                /**
                 * https://fullcalendar.io/docs/defaultView
                 * The initial view when the calendar loads.
                 */
                //'defaultView' : 'month',

                /**
                 * https://fullcalendar.io/docs/view-object
                 * An object containing information about a calendar view, such as title and date range.
                 *
                 * https://fullcalendar.io/docs/custom-view-with-settings
                 * It is possible to customize an existing available view by tweaking settings.
                 *
                 * https://fullcalendar.io/docs/view-specific-options
                 * Provide separate options objects within the views option, keyed by the name of your view.
                 */


                /**
                 * https://fullcalendar.io/docs/weekends
                 * Whether to include Saturday/Sunday columns in any of the calendar views.
                 */
                'weekends': true,

                /**
                 * https://fullcalendar.io/docs/hiddenDays
                 * Exclude certain days-of-the-week from being displayed.
                 */
                'hiddenDays': [],

                /**
                 * https://fullcalendar.io/docs/columnHeader
                 * Whether the day headers should appear. For the Month, TimeGrid, and DayGrid views.
                 */
                'columnHeader': true,

                /**
                 * https://fullcalendar.io/docs/columnHeaderFormat
                 * Determines the text that will be displayed on the calendar’s column headings.
                 */
                'columnHeaderFormat': {'weekday': 'short'},

                /**
                 * https://fullcalendar.io/docs/columntitle
                 * Programmatically generates text that will be displayed on the calendar’s column headings.
                 * Если задано свойство columnHeaderHtml, то columntitle будет перезаписан.
                 */
               

                /**
                 * https://fullcalendar.io/docs/columnHeaderHtml
                 * Programmatically generates HTML that will be injected on the calendar’s column headings.
                 */
              

                /**
                 * https://fullcalendar.io/docs/slotDuration
                 * The frequency for displaying time slots.
                 */
                slotDuration: '00:30:00',

                /**
                 * https://fullcalendar.io/docs/slotLabelInterval
                 * The frequency that the time slots should be labelled with text.
                 */
                slotLabelInterval: false,

                /**
                 * https://fullcalendar.io/docs/slotLabelFormat
                 * Determines the text that will be displayed within a time slot.
                 */
                slotLabelFormat: {
                    hour: 'numeric',
                    minute: '2-digit',
                    omitZeroMinute: true,
                    meridiem: 'short'
                },

                /**
                 * https://fullcalendar.io/docs/minTime
                 * Determines the first time slot that will be displayed for each day.
                 */
                'minTime': '00:00:00',

                /**
                 * https://fullcalendar.io/docs/maxTime
                 * Determines the last time slot that will be displayed for each day. Specified as an exclusive end time.
                 */
                'maxTime': '24:00:00',

                /**
                 * https://fullcalendar.io/docs/scrollTime
                 * Determines how far forward the scroll pane is initially scrolled.
                 */
                'scrollTime': '06:00:00',


                /**
                 * https://fullcalendar.io/docs/navLinks
                 * Determines if day nameOn and week nameOn are clickable.
                 */
                'navLinks': false,


                /**
                 * https://fullcalendar.io/docs/weekNumbers
                 * Determines if week numbers should be displayed on the calendar.
                 */
                'weekNumbers': false,

                /**
                 * https://fullcalendar.io/docs/weekNumbersWithinDays
                 * Determines the styling for week numbers in Month and DayGrid views.
                 */
                'weekNumbersWithinDays': false,

                /**
                 * https://fullcalendar.io/docs/weekNumberCalculation
                 * The method for calculating week numbers that are displayed with the weekNumbers setting.
                 */
                'weekNumberCalculation': 'local',

                /**
                 * https://fullcalendar.io/docs/weekLabel
                 * The heading text for week numbers. Also affects weeks in date formatting.
                 */
                'weekLabel': 'W',

                /**
                 * https://fullcalendar.io/docs/selectable
                 * Allows a user to highlight multiple days or timeslots by clicking and dragging.
                 */
                'selectable': true,

                /**
                 * https://fullcalendar.io/docs/selectMirror
                 * Whether to draw a “placeholder” event while the user is dragging.
                 */
                'selectMirror': true,

                /**
                 * https://fullcalendar.io/docs/unselectAuto
                 * Whether clicking elsewhere on the page will cause the current selection to be cleared.
                 */
                'unselectAuto': true,

                /**
                 * https://fullcalendar.io/docs/unselectCancel
                 * A way to specify elements that will ignore the unselectAuto option.
                 */
                'unselectCancel': '',

                /**
                 * https://fullcalendar.io/docs/selectOverlap
                 * Determines whether the user is allowed to select periods of time that are occupied by events.
                 */
                'selectOverlap': true,

 ''

                /**
                 * https://fullcalendar.io/docs/selectMinDistance
                 * The minimum distance the user’s mouse must travel after a mousedown, before a selection is allowed.
                 */
                'selectMinDistance': 0,

                /**
                 * https://fullcalendar.io/docs/dateClick
                 * Triggered when the user clicks on a date or a time.
                 */


                /**
                 * https://fullcalendar.io/docs/select-callback
                 * Triggered when a date/time selection is made.
                 */


                /**
                 * https://fullcalendar.io/docs/unselect-callback
                 * Triggered when the current selection is cleared.
                 */


                /**
                 * https://fullcalendar.io/docs/nowIndicator
                 * Whether or not to display a marker indicating the current time.
                 */
                'nowIndicator': true,

                /**
                 * https://fullcalendar.io/docs/now
                 * Explicitly sets the “today” date of the calendar. This is the day that is normally highlighted in yellow.
                 */
                //'now' : '2019-06-06'

                /**
                 *
                 */
                busineshours: {

                    daysOfWeek: [1, 2, 3, 4, 5],
                    startTime: '9:00',
                    endTime: '18:00'
                },

                /**
                 * https://fullcalendar.io/docs/event-parsing
                 * https://fullcalendar.io/docs/event-object
                 * https://fullcalendar.io/docs/events-array
                 * https://fullcalendar.io/docs/events-json-feed
                 * https://fullcalendar.io/docs/events-function
                 * https://fullcalendar.io/docs/google-calendar
                 * https://fullcalendar.io/docs/event-source-object
                 */



                /**
                 * https://fullcalendar.io/docs/rrule-plugin
                 * The RRule plugin is a connector to the rrule js library. It is powerful for specifying recurring events, moreso than FullCalendar’s built-in simple event recurrence.
                 */
                /*'rrule' : [
                    'freq' : 'weekly',
                    'interval' : 5,
                    'byweekday' : [ 'mo', 'fr' ],
                    'dtstart' : '2019-05-01T10:30:00',
                    'until' : '2019-06-01'
                ],*/

                /**
                 * https://fullcalendar.io/docs/eventDataTransform
                 * A hook for transforming custom data into a standard Event object.
                 */


                /**
                 * https://fullcalendar.io/docs/allDayDefault
                 * Determines the default value for each Event Object’s allDay property when it is unspecified.
                 */


                /**
                 * https://fullcalendar.io/docs/defaultTimedEventDuration
                 * A fallback duration for timed Event Objects without a specified end value.
                 */
                'defaultTimedEventDuration': '01:00',

                /**
                 * https://fullcalendar.io/docs/defaultAllDayEventDuration
                 * A fallback duration for all-day Event Objects without a specified end value.
                 */
                'defaultAllDayEventDuration': {'days': 1},

                /**
                 * https://fullcalendar.io/docs/forceEventDuration
                 * A flag to force assignment of an event’s end if it is unspecified.
                 */
                'forceEventDuration': false,

                /**
                 * https://fullcalendar.io/docs/eventSourceSuccess
                 * A function that gets called when fetching succeeds. It can transform the response. Gets called for any type of Event source.
                 */


                /**
                 * https://fullcalendar.io/docs/eventSourceFailure
                 * Called when any of the event sources fails. Probably because an AJAX request failed.
                 */


                /**
                 * https://fullcalendar.io/docs/startParam
                 * A parameter of this name will be sent to each JSON event feed. It describes the start of the interval being fetched.
                 */
                'startParam': 'start',

                /**
                 * https://fullcalendar.io/docs/endParam
                 * A parameter of this name will be sent to each JSON event feed. It describes the exclusive end of the interval being fetched.
                 */
                'endParam': 'end',

                /**
                 * https://fullcalendar.io/docs/timeZoneParam
                 * A parameter of this name will be sent to each JSON event feed.
                 */
                'timeZoneParam': 'timeZone',

                /**
                 * https://fullcalendar.io/docs/lazyFetching
                 * Determines when event fetching should occur.
                 */
                'lazyFetching': true,

                /**
                 * https://fullcalendar.io/docs/loading
                 * Triggered when event or resource fetching starts/stops.
                 */


                /**
                 * https://fullcalendar.io/docs/eventColor
                 * Sets the background and border colors for all events on the calendar.
                 * Может быть перезаписан в параметре events
                 */
                'eventColor': 'lightblue',

                /**
                 * https://fullcalendar.io/docs/eventBackgroundColor
                 * Sets the background color for all events on the calendar.
                 * Может быть перезаписан в параметре events
                 */
                'eventBackgroundColor': 'darkgray',

                /**
                 * https://fullcalendar.io/docs/eventBorderColor
                 * Sets the border color for all events on the calendar.
                 */
                'eventBorderColor': '#000',

                /**
                 * https://fullcalendar.io/docs/eventTextColor
                 * Sets the text color for all events on the calendar.
                 */
                'eventTextColor': '#ffffff',

                /**
                 * https://fullcalendar.io/docs/eventTimeFormat
                 * Determines the time-text that will be displayed on each event.
                 */
                'eventTimeFormat': {
                    'hour': '2-digit',
                    'minute': '2-digit',
                    'second': '2-digit'
                },

                /**
                 * https://fullcalendar.io/docs/displayEventTime
                 * Whether or not to display the text for an event’s date/time.
                 */
                //'displayEventTime' : true,

                /**
                 * https://fullcalendar.io/docs/displayEventEnd
                 * Whether or not to display an event’s end time.
                 *
                 * default
                 * false // for dayGridMonth and dayGridWeek views
                 * true  // for timeGridWeek, timeGridDay, and dayGridDay
                 */
                //'displayEventEnd' : true,

                /**
                 * https://fullcalendar.io/docs/nextDayThreshold
                 * When an event’s end time spans into another day, the minimum time it must be in order for it to render as if it were on that day.
                 */
                'nextDayThreshold': '00:00:00',

                /**
                 * https://fullcalendar.io/docs/eventOrder
                 * Determines the ordering events within the same day.
                 */
                'eventOrder': 'start,-duration,allDay,title',

                /**
                 * https://fullcalendar.io/docs/progressiveEventRendering
                 * When to render multiple asynchronous event sources in an individual or batched manner.
                 */
                'progressiveEventRendering': false,

                /**
                 * https://fullcalendar.io/docs/eventRender
                 * Triggered while an event is being rendered. A hook for modifying its DOM.
                 */


                /**
                 * https://fullcalendar.io/docs/eventPositioned
                 * Triggered after an event has been placed on the calendar in its final position.
                 */




                /**
                 * https://fullcalendar.io/docs/editable
                 * Determines whether the events on the calendar can be modified.
                 */
                'editable': true,

                /**
                 * https://fullcalendar.io/docs/eventStartEditable
                 * Allow events’ start times to be editable through dragging.
                 */
                'eventStartEditable': true,

                /**
                 * https://fullcalendar.io/docs/eventResizableFromStart
                 * Whether the user can resize an event from its starting edge.
                 */
                'eventResizableFromStart': true,

                /**
                 * https://fullcalendar.io/docs/eventDurationEditable
                 * Allow events’ durations to be editable through resizing.
                 */
                'eventDurationEditable': true,

                /**
                 * https://fullcalendar.io/docs/eventResourceEditable
                 * Determines whether the user can drag events between resources.
                 */
                'eventResourceEditable': false,

                /**
                 * https://fullcalendar.io/docs/droppable
                 * Determines if external draggable elements or events from other calendars can be dropped onto the calendar.
                 */
                'droppable': true,

                /**
                 * https://fullcalendar.io/docs/eventDragMinDistance
                 * How many pixels the user’s mouse/touch must move before an event drag activates.
                 */
                'eventDragMinDistance': 5,

                /**
                 * https://fullcalendar.io/docs/dragRevertDuration
                 * Time it takes for an event to revert to its original position after an unsuccessful drag.
                 */
                'dragRevertDuration': 500,

                /**
                 * https://fullcalendar.io/docs/dragScroll
                 * Whether to automatically scoll the scroll-containers during event drag-and-drop and date selecting.
                 */
                'dragScroll': true,

                /**
                 * https://fullcalendar.io/docs/snapDuration
                 * The time interval at which a dragged event will snap to the time axis.
                 */
                //'snapDuration' : '00:30',

                /**
                 * https://fullcalendar.io/docs/allDayMaintainDuration
                 * Determines how an event’s duration should be mutated when it is dragged from a timed section to an all-day section and vice versa.
                 */
                'allDayMaintainDuration': false,

                /**
                 * https://fullcalendar.io/docs/eventOverlap
                 * Determines if events being dragged and resized are allowed to overlap each other.
                 */
                'eventOverlap': true,

                /**
                 * https://fullcalendar.io/docs/eventConstraint
                 * Limits event dragging and resizing to certain windows of time.
                 */
                //'eventConstraint' : 'groupId',

                /**
                 * https://fullcalendar.io/docs/eventAllow
                 * Exact programmatic control over where an event can be dropped.
                 */


                /**
                 * https://fullcalendar.io/docs/dropAccept
                 * Provides a way to filter which external elements can be dropped onto the calendar.
                 */
                'dropAccept': '*',

                /**
                 * https://fullcalendar.io/docs/eventDragStart
                 * Triggered when event dragging begins.
                 */


                /**
                 * https://fullcalendar.io/docs/eventDragStop
                 * Triggered when event dragging stops.
                 */


                /**
                 * https://fullcalendar.io/docs/eventDrop
                 * Triggered when dragging stops and the event has moved to a different day/time.
                 */


                /**
                 * https://fullcalendar.io/docs/drop
                 * Called when an external draggable element or an event from another calendar has been dropped onto the calendar.
                 */


                /**
                 * https://fullcalendar.io/docs/eventReceive
                 * Called when an external draggable element with associated event data was dropped onto the calendar. Or an event from another calendar.
                 */


                /**
                 * https://fullcalendar.io/docs/eventLeave
                 * Triggered when on a calendar when one if its events is about to be dropped onto another calendar.
                 */


                /**
                 * https://fullcalendar.io/docs/eventResizeStart
                 * Triggered when event resizing begins.
                 */


                /**
                 * https://fullcalendar.io/docs/eventResizeStop
                 * Triggered when event resizing stops.
                 */


                /**
                 * https://fullcalendar.io/docs/eventResize
                 * Triggered when resizing stops and the event has changed in duration.
                 */


                /**
                 * https://fullcalendar.io/docs/eventLimit
                 * Limits the number of events displayed on a day. The rest will show up in a popover.
                 */
                'eventLimit': false,

                /**
                 * https://fullcalendar.io/docs/eventLimitClick
                 * Determines the action taken when the user clicks on a “more” link created by the eventLimit option.
                 */
                'eventLimitClick': 'popover',

                /**
                 * https://fullcalendar.io/docs/eventLimitText
                 * Determines the text of the link created by the eventLimit setting.
                 */
                'eventLimitText': 'more',

                /**
                 * https://fullcalendar.io/docs/dayPopoverFormat
                 * Determines the date format of title of the popover created by the eventLimitClick option.
                 */
                'dayPopoverFormat': {
                    'month': 'long',
                    'day': 'numeric',
                    'year': 'numeric'
                },

                /**
                 * https://fullcalendar.io/docs/locale
                 * The locale and locales options allow you to localize certain aspects of the calendar:
                 */
                'locale': 'ru',

                /**
                 * https://fullcalendar.io/docs/dir
                 * The direction that elements in the calendar are rendered. Either left-to-right or right-to-left.
                 */
                'dir': 'ltr',

                /**
                 * https://fullcalendar.io/docs/firstDay
                 * The day that each week begins.
                 */
                'firstDay': 1,

                /**
                 * https://fullcalendar.io/docs/longPressDelay
                 * For touch devices, the amount of time the user most hold down before an event becomes draggable or a date becomes selectable.
                 */
                'longPressDelay': 1000,

                /**
                 * https://fullcalendar.io/docs/eventLongPressDelay
                 * For touch devices, the amount of time the user most hold down before an event becomes draggable.
                 */
                'eventLongPressDelay': 1000,

                /**
                 * https://fullcalendar.io/docs/selectLongPressDelay
                 * For touch devices, the amount of time the user most hold down before a date becomes selectable.
                 */
                selectLongPressDelay: 1000,
                buttonText: {
                    today: 'today',
                    month: 'month',
                    week: 'week',
                    day: 'day',
                    list: 'list'
                },
                timeZone: 'UTC',
                plugins: [
                    'interaction',
                    'bootstrap',
                    'timeGrid',
                    'resourceTimeline'
                ], //'list','dayGrid',
                header: {
                    left: 'prevYear,prev,next,nextYear today',
                    center: 'title', //'dayGridMonth,timeGridWeek'
                    right: 'dayGridMonth,dayGridWeek,dayGridDay'
                },

                /**
                 *
                 * https://fullcalendar.io/docs/toolbar
                 */

                slotDuration: '00:30:00',
                defaultDate: '2019-04-12',
                navLinks: true, // can click day/week nameOn to navigate views
                editable: true,
                selectable: true,
                dateClick: function (info) {
                    console.log('Clicked on: ' + info.dateStr);
                    console.log('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    console.log('Current view: ' + info.view.type);
                    // change the day's background color just for fun
                    info.dayEl.style.backgroundColor = 'red';
                },
                defaultDate: '2020-02-17',
                selectMirror: false,
                unselectAuto: true,
                unselectCancel: '',
                selectOverlap: (event) => event.rendering === 'background',
                eventStartEditable: true,
                eventResizableFromStart: true,
                eventDurationEditable: true,
                eventResourceEditable: true,
                weekNumbers: true,
                eventLimit: true, // allow "more" link when too many events
                droppable: true,
                eventDragMinDistance: 5,
                dragRevertDuration: 500,
                dragScroll: true,
                allDayMaintainDuration: true,
                eventOverlap: (stillEvent, movingEvent) => stillEvent.allDay && movingEvent.allDay,
                titleRangeSeparator: ' \u2013 ',
                scrollTime: '08:00',
                //defaultView: 'timeGridWeek', //'listWeek','timeline','resourceTimeline'
                //duration: { days: 3 }
                views: {
                    /*resourceTimelineDay: {
                        buttonText: ':15 slots',
                        slotDuration: '00:15'
                    }, */// only for resource Time Line
                    dayGridMonth: { // name of view
                        titleFormat: {
                            year: 'numeric', //'2-digit' will produce something like 18
                            month: '2-digit',// 'long','short','narrow', 'numeric', '2-digit'
                            day: '2-digit', //'numeric' , '2-digit'
                            weekday: 'short', //'long', 'short', 'narrow'
                            hour: 'numeric',  // 'numeric' ,'2-digit'
                            minute: 'numeric', // 'numeric' ,'2-digit'
                            second: 'numeric', // 'numeric' or '2-digit'
                            hour12: true,
                            timeZoneName: 'short'
                        },
                        dayCount: 4 //
                        // other view-specific options here
                    },
                    timeGrid: {
                        titleFormat: {year: 'numeric', month: 'short', day: 'numeric'} // like 'Sep 13 2009', for week views// options apply to timeGridWeek and timeGridDay views
                    },
                    week: {
                        titleFormat: {year: 'numeric', month: 'long', day: 'numeric'}  // like 'September 8 2009', for day views// options apply to dayGridWeek and timeGridWeek views
                    },
                    day: {
                        titleFormat: {year: 'numeric', month: 'long'}                  // like 'September 2009', for month view // options apply to dayGridDay and timeGridDay views
                    }
                },
                /**
                 *
                 * https://fullcalendar.io/docs/theming
                 */

                // standard | bootstrap | 


                themeSystem: 'standard',
                bootstrapFontAwesome: {
                    close: 'fa-times',
                    prev: 'fa-chevron-left',
                    next: 'fa-chevron-right',
                    prevYear: 'fa-angle-double-left',
                    nextYear: 'fa-angle-double-right'
                },


                /**
                 *
                 * https://fullcalendar.io/docs/sizing
                 */

                // parent | auto | 300
                height: 'auto',
                themeSystem: 'bootstrap',
                // auto | 300
                contentHeight: 'auto',

                // Used only for Resource Time Line
                /* handleWindowResize: true,
                resourceAreaWidth: "30%",
                resourceLabelText: "Resources",
                resourcesInitiallyExpanded: true,
                resourceColumns: [
                    {
                        labelText: 'First Name',
                        field: 'fname'
                    },
                    {
                        labelText: 'Last Name',
                        field: 'lname'
                    }
                ],
                aspectRatio: 1.6,
                resourceGroupField: 'building',
                resources: [
                    {id: 'a', building: '460 Bryant', title: 'Auditorium A'},
                    {id: 'b', building: '460 Bryant', title: 'Auditorium B'},
                    {id: 'c', building: '460 Bryant', title: 'Auditorium C'},
                    {id: 'd', building: '460 Bryant', title: 'Auditorium D'},
                    {id: 'e', building: '460 Bryant', title: 'Auditorium E'},
                    {id: 'f', building: '460 Bryant', title: 'Auditorium F'},
                    {id: 'g', building: '564 Pacific', title: 'Auditorium G'},
                    {id: 'h', building: '564 Pacific', title: 'Auditorium H'},
                    {id: 'i', building: '564 Pacific', title: 'Auditorium I'},
                    {id: 'j', building: '564 Pacific', title: 'Auditorium J'},
                    {id: 'k', building: '564 Pacific', title: 'Auditorium K'},
                    {id: 'l', building: '564 Pacific', title: 'Auditorium L'},
                    {id: 'm', building: '564 Pacific', title: 'Auditorium M'},
                    {id: 'n', building: '564 Pacific', title: 'Auditorium N'},
                    {id: 'o', building: '101 Main St', title: 'Auditorium O'},
                    {id: 'p', building: '101 Main St', title: 'Auditorium P'},
                    {id: 'q', building: '101 Main St', title: 'Auditorium Q'},
                    {id: 'r', building: '101 Main St', title: 'Auditorium R'},
                    {id: 's', building: '101 Main St', title: 'Auditorium S'},
                    {id: 't', building: '101 Main St', title: 'Auditorium T'},
                    {id: 'u', building: '101 Main St', title: 'Auditorium U'},
                    {id: 'v', building: '101 Main St', title: 'Auditorium V'},
                    {id: 'w', building: '101 Main St', title: 'Auditorium W'},
                    {id: 'x', building: '101 Main St', title: 'Auditorium X'},
                    {id: 'y', building: '101 Main St', title: 'Auditorium Y'},
                    {id: 'z', building: '101 Main St', title: 'Auditorium Z'}
                ],*/
                windowResize: function (view) {
                    console.log('The calendar has adjusted to a window resize');
                },


                /**
                 *
                 * https://fullcalendar.io/docs/month-view
                 */
                fixedWeekCount: true,
                showNonCurrentDates: true,
                /*validRange: function(nowDate) {
                    return {
                        start: nowDate,
                        end: nowDate.clone().add(1, 'months')
                    };
                },*/ // function for range 
                eventLimit: true, // allow "more" link when too many events
                eventAllow: (dropInfo, draggedEvent) => draggedEvent.id === '999' ? dropInfo.start < new Date(2016, 0, 1) : true,
                dropAccept: '*',
                eventLimit: true, // allow "more" link when too many events
                eventAllow: (dropInfo, draggedEvent) => draggedEvent.id === '999' ? dropInfo.start < new Date(2016, 0, 1) : true,
                dropAccept: '*',
                resources: [
                    {id: 'a', title: 'Auditorium A'},
                    {id: 'b', title: 'Auditorium B', eventColor: 'green'},
                    {id: 'c', title: 'Auditorium C', eventColor: 'orange'},
                    {
                        id: 'd', title: 'Auditorium D', children: [
                            {id: 'd1', title: 'Room D1'},
                            {id: 'd2', title: 'Room D2'}
                        ]
                    },
                    {id: 'e', title: 'Auditorium E'},
                    {id: 'f', title: 'Auditorium F', eventColor: 'red'},
                    {id: 'g', title: 'Auditorium G'},
                    {id: 'h', title: 'Auditorium H'},
                    {id: 'i', title: 'Auditorium I'},
                    {id: 'j', title: 'Auditorium J'},
                    {id: 'k', title: 'Auditorium K'},
                    {id: 'l', title: 'Auditorium L'},
                    {id: 'm', title: 'Auditorium M'},
                    {id: 'n', title: 'Auditorium N'},
                    {id: 'o', title: 'Auditorium O'},
                    {id: 'p', title: 'Auditorium P'},
                    {id: 'q', title: 'Auditorium Q'},
                    {id: 'r', title: 'Auditorium R'},
                    {id: 's', title: 'Auditorium S'},
                    {id: 't', title: 'Auditorium T'},
                    {id: 'u', title: 'Auditorium U'},
                    {id: 'v', title: 'Auditorium V'},
                    {id: 'w', title: 'Auditorium W'},
                    {id: 'x', title: 'Auditorium X'},
                    {id: 'y', title: 'Auditorium Y'},
                    {id: 'z', title: 'Auditorium Z'}
                ],
                events: [
                    {id: '1', resourceId: 'b', start: '2020-05-07T02:00:00', end: '2020-05-07T07:00:00', title: 'event 1'},
                    {id: '2', resourceId: 'c', start: '2020-05-07T05:00:00', end: '2020-05-07T22:00:00', title: 'event 2'},
                    {id: '3', resourceId: 'd', start: '2020-05-06', end: '2016-05-08', title: 'event 3'},
                    {id: '4', resourceId: 'e', start: '2020-05-07T03:00:00', end: '2020-05-07T08:00:00', title: 'event 4'},
                    {id: '5', resourceId: 'f', start: '2020-05-07T00:30:00', end: '2020-05-07T02:30:00', title: 'event 5'}
                ]
            });

            calendar.render();
        });


    </script>
        <div id='calendar'></div>
HTML,

         'css' => <<<CSS
          #calendar {
            max-width: 900px;
            margin: 0 auto;
        }
CSS,
     ];
    /**
     *
     * Constants
     */


    public function asset()
    {
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.0/main.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid/main.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/list/main.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid/main.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/resource-timeline/main.css');
        $this->fileCss('https://cdn.jsdelivr.net/npm/@fullcalendar/timeline/main.css');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/core@4.4.0/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@4.4.0/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@4.4.0/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@4.4.0/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/list@4.4.0/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/timeline/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/resource-common/main.js');
        $this->fileJs('https://cdn.jsdelivr.net/npm/@fullcalendar/resource-timeline/main.js');
    }
    

    public function codes()
    {


        $this->htm = strtr($this->_layout['main'], []);

        $this->css = strtr($this->_layout['css'], []);
        
    }

}


