<h2>Event Reminder</h2>
<p>Title: {{ $event->title }}</p>
<p>Description: {{ $event->description }}</p>
<p>Starts at: {{ $event->date_time->format('d M Y, h:i A') }}</p>
