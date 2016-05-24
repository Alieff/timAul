
<?php
Mail::raw('Laravel with Mailgun is easy!', function($message)
{
    $message->to('foo@example.com');
});
?>
Question for Inspire Crawler

<p>
Name: {{ $name }}
</p>

<p>
{{ $email }}
</p>

<p>
{{ $user_message }}
</p>
