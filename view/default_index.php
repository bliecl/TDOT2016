<?php
include_once('model/PointModel.php');
include_once('model/SideModel.php');
$sideModel = new SideModel();
$pointModel = new PointModel();
$bright = $pointModel->getPointsOfSide($sideModel->getSideID("bright"));
$dark = $pointModel->getPointsOfSide($sideModel->getSideID("dark"));

?>
<div class="container">
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--12-col">
			<h1>
				The Space Battle
			</h1>
		</div>
	</div>
	<div class="mdl-grid">
		<div class="mdl-cell mdl-cell--2-offset-desktop mdl-cell--4-col-desktop
		mdl-cell--8-col-tablet mdl-cell--8-col-phone">
		<div class="lightSide">
			<div class="mdl-grid">
				<h2>Light Side</h2>
			</div>
			<div class="mdl-grid light_sword">
				<div class="blueSword">
					<div class="placeholderBlue"></div>
					<!-- Lichtschwert Blau -->
					<div id="lichtschwertBlau">
						<div class="example-item clearfix">
							<div class="lightsaberBlue">
								<label for="obi-wan-example"></label>
								<div class="switch"></div>
								<div id="bladeBlue" class="plasmaBlue obi-wan" style="height: <?php echo 44*$bright/($dark+$bright); ?>vh;"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-grid">
				<h2 id="bright_counter">
					<?php echo $bright ?> Punkte
				</h2>
			</div>
		</div>
	</div>
	<div class="mdl-cell mdl-cell--4-col-desktop
	mdl-cell--8-col-tablet mdl-cell--8-col-phone">
	<div class="darkSide">
		<div class="mdl-grid ">
			<h2>Dark Side</h2>
		</div>
		<div class="mdl-grid dark_sword">
			<div class="redSword">
				<div class="placeholderRed"></div>
				<!-- Lichtschwert Rot -->
				<div id="lichtschwertRot">
					<div class="example-item">
						<div class="lightsaberRed">
							<label for="darth-vader-example"></label>
							<div class="switch"></div>
							<div id="bladeRed" class="plasmaRed vader" style="height: <?php echo 44*$dark/($dark+$bright); ?>vh;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mdl-grid">
			<h2 id="dark_counter">
				<?php echo $dark ?> Punkte
			</h2>
		</div>
	</div>
</div>
</div>
</div>



<script>
$(document).ready(function(){
	setInterval(function(){
		$.getJSON("/stats/getCurrentStats").success(function (data) {
			var bright = data["bright"];
			var dark = data["dark"];
			if (bright==null){
				bright=0;
			}else{bright = parseInt(bright);}
			if (dark==null){
				dark=0;
			}else{dark = parseInt(dark);}
			$("#bright_counter").html(bright + " Punkte");
			$("#dark_counter").html(dark + " Punkte");
			var sum = bright+dark;
			if (sum==0){
				bright=0.1;
				dark=0.1;
				sum=0.2;
			}
			$("#bladeBlue").height(44*bright/(sum)+"vh");
			$("#bladeRed").height(44*dark/(sum)+"vh");

		});
	},1000);
});
</script>
