<div class="row">
	<div id="breadcrumb" class="col-md-12">
		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
		</ol>
	</div>
</div>
<div class="row">
	
</div>
<script>
// Draw Knob examples on page
function UIPage_Knob(){
	DrawKnob($(".knob"));
}
$(document).ready(function() {
	LoadKnobScripts(UIPage_Knob);
	// Start Knob clock avery 1 sec
	setInterval(RunClock, 1000);
	// Make all sliders on page
	CreateAllSliders();
	// Add Drag-n-Drop feature to boxes
	WinMove();
});
</script>
