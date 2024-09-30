<input type="hidden" name="roll_no" value="ZCC241011">
<style>

/* General container styling */
#attendanceCalendar {
    background-color: var(--bs-body-bg)!important;
    border-radius: 10px;
    box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
}

/* Header style for the calendar */
.fc-toolbar {
    background-color: #007bff; /* Primary blue background */
    color: white;
    padding: 10px;
    border-radius: 5px 5px 0 0;
}

/* Title of the calendar (Month/Day) */
.fc-toolbar h2 {
    font-size: 20px;
    font-weight: bold;
    color: #ffffff;
    text-align: center;
}

/* Navigation buttons */
.fc-button {
    background-color: #ffffff;
    border: none;
    color: #007bff;
    font-weight: bold;
    border-radius: 5px;
    padding: 5px 10px;
    margin: 0 2px;
}

.fc-button:hover {
    background-color: #007bff;
    color: white;
}

/* Calendar Day Headers (Sun, Mon, etc.) */
.fc-day-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    font-weight: bold;
}

/* Calendar grid cells */
.fc-day-grid .fc-row {
    background-color: white;
}

.fc-day {
    border: 1px solid #ddd;
    padding: 10px;
    cursor: pointer;
}

/* Current day styling */
.fc-today {
    background-color: #ffeb3b !important; /* Highlight current day */
}

/* Event styling */
.fc-event {
    background-color: #28a745; /* Default color for events */
    border: none;
    border-radius: 4px;
    font-size: 14px;
    padding: 5px;
    color: white;
    cursor: pointer;
}

/* Event colors for different statuses */
.fc-event.present {
    background-color: #28a745; /* Green for present */
}

.fc-event.absent {
    background-color: #dc3545; /* Red for absent */
}

.fc-event.late {
    background-color: #ffc107; /* Yellow for late */
}

/* Hover effect on events */
.fc-event:hover {
    opacity: 0.85;
}

/* Tooltip for event details */
.fc-event .fc-title {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
button{
    line-height: 0!important;
}
[data-bs-theme=dark] .fc-unthemed .fc-divider, 
[data-bs-theme=dark] .fc-unthemed .fc-list-heading td, 
[data-bs-theme=dark] .fc-unthemed .fc-list-view, 
[data-bs-theme=dark] .fc-unthemed .fc-popover, 
[data-bs-theme=dark] .fc-unthemed .fc-row, 
[data-bs-theme=dark] .fc-unthemed tbody, 
[data-bs-theme=dark] .fc-unthemed td, 
[data-bs-theme=dark] .fc-unthemed th, 
[data-bs-theme=dark] .fc-unthemed thead{
    color: var(--bs-body-bg)!important;
}
</style>

<div class="{card_class}">
    <div class="card-header">
        <h3 class="card-title">Attendance Report</h3>
    </div>
    <div class="card-body p-1">
    <div id="attendanceCalendar"></div>
    </div>
</div>