<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>selectable demo</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">
    <style>
    #selectable .ui-selecting {
        background: #ccc;
    }
    #selectable .ui-selected {
        background: #999;
    }
    </style>
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
</head>
<body>
 
<ul id="selectable">
    <li>Item 1</li>
    <li>Item 2</li>
    <li>Item 3</li>
    <li>Item 4</li>
    <li>Item 5</li>
</ul>
 
<script>
$( "#selectable" ).selectable();
</script>
 
</body>
</html>