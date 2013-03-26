<h3>droppable</h3>



<script type='text/javascript'>
$("document").ready(function(){
$( "#draggable" ).draggable();
$( "#droppable" ).droppable({
    drop: function() {
        alert( "dropped" );
    }
	});
});
</script>

 <div id="droppable">Drop here</div>
<div id="draggable">Drag me</div>