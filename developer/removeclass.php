<!DOCTYPE html>
<html>
<head>
<style>
p { margin: 4px; font-size:16px; font-weight:bolder; }
.blue { color:blue; }
.under { text-decoration:underline; }
.highlight { background:yellow; }
</style>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<p class="blue under">Hello</p>
<p class="blue under highlight">and</p>
<p class="blue under">then</p>
<p class="blue under">Goodbye</p>
<script>$("p:eq(1)").removeClass();</script>
</body>
</html>