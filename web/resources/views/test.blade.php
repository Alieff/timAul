<?php
Mail::raw('Laravel with Mailgun is easy!', function($message)
{
    $message->to('foo@example.com');
});
?>
