<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<span>
<h2>
    You have a new order. </h2><br>
    Clicking the link to see more...
    <a href="{!!$link!!}" target="_blank">{!!$link!!}</a><br>
    If clicking the link doesn't work you can copy the link into your browser window or type it there directly.<br>
    <p>Customer: <br>
    Name: {!!$customer->name!!}<br>
    Email: {!!$customer->email!!}<br>
    Phone: {!!$customer->phone!!}<br>
    Mobile: {!!$customer->mobile!!}<br>
    Address: {!!$customer->address!!}<br></p>
-----------------------------
<br>
    </div></span>
</body>
</html>