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
								<input type="checkbox" id="obi-wan-example">
								<div class="switch"></div>
								<div class="plasmaBlue obi-wan"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-grid">
				<h2 id="bright_counter">
					200 Punkte
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
							<input type="checkbox" id="darth-vader-example">
							<div class="switch"></div>
							<div class="plasmaRed vader"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mdl-grid">
			<h2 id="dark_counter">
				200 Punkte
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
			$("#bright_counter").html(bright + " Punkte");
			$("#dark_counter").html(dark + " Punkte");
		});
	},1000);
});
</script>
