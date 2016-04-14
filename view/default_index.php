<?php
include_once('/model/PointModel.php');
include_once('/model/SideModel.php');
$sideModel = new SideModel();
$pointModel = new PointModel();

?>
<div id="container">
	<h1 class="grey center big">
		The Space Battle
	</h1>
	<br/>
	<div id="bright_side">
		<div id="bright_header">
			<h2 class="middle">
				Light Side
			</h2>
		</div>
		<div id="bright_side_statistic">
			<div id="placeholderBlueHandle">
				<div id="placeholderBlueBlade">
					<div id="placeholderBlueTip"></div>
					<div>
						<img id="blueTip" src="/view/img/lightsaber/blue/tip.png" alt="blue tip">
					</div>
				</div>
				<div>
					<img id="blueBlade" src="/view/img/lightsaber/blue/blade.png" alt="blue blade">
				</div>
			</div>
			<div>
				<img id="blueHandle" src="/view/img/lightsaber/blue/handle.png" alt="blue handle">
			</div>
		</div>
		<div>
			<h2 id="bright_counter" class="middle">
				<?php echo $pointModel->getPointsOfSide($sideModel->getSideID("bright")." Points");?>
			</h2>
		</div>
	</div>
	<div id="dark_side">
		<div id="dark_header">
			<h2 class="middle">
				Dark Side
			</h2>
		</div>
		<div id="dark_side_statistic">
			<div id="placeholderRedHandle">
				<div id="placeholderRedBlade">
					<div id="placeholderRedTip"></div>
					<div>
						<img id="redTip" src="/view/img/lightsaber/red/tip.png" alt="red tip">
					</div>
				</div>
				<div>
					<img id="redBlade" src="/view/img/lightsaber/red/blade.png" alt="red blade">
				</div>
			</div>
			<div>
				<img id="redHandle" src="/view/img/lightsaber/red/handle.png" alt="red handle">
			</div>
		</div>
		<div>
			<h2 id="dark_counter" class="middle">
				<?php echo $pointModel->getPointsOfSide($sideModel->getSideID("dark"))." Points";?>
			</h2>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		setInterval(function(){
			$.getJSON("/stats/getCurrentStats").success(function (data) {
				var bright = data["bright"];
				var dark = data["dark"];
				$("#bright_counter").html(bright + " Punkte");
				$("#dark_counter").html(dark + " Punkte");
			});
		},1000);
	});

</script>
