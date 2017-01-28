<?php if ($page->type === 'home'): ?>
	<div class="landing-strip-wrapper">
		<div class="intro-jet"></div>
		<div class="cloud-1"></div>
		<div class="cloud-2"></div>
		<div class="cloud-3"></div>
		<div class="cloud-4"></div>
		<div class="white-drift"></div>
		<div class="landing-strip-text">
			<div class="landing-strip-text-line">Hartwell Corporation</div>
			<div class="landing-strip-text-line">is the Market Leader</div>
			<div class="landing-strip-text-line">for Latches & Latching Systems</div>
			<div class="landing-strip-text-line">used in Aerospace, Defense & Commercial Aircraft</div>
		</div>
	</div>
<?php endif; ?>

<!--
<div class="outer">
		<div class="para-col-left">
			<div
				class="para"
				style="background-image: url('/static/public/img/buttons.jpg');"
			></div>
			<div class="body">
				<h3 id="who-we-are">Who We Are</h3>
				<p>Hartwell is a leader in the aerospace industry for latches and latching systems for commercial and military aircraft applications.</p>
				<p>Over 75 years in operation and we continue to be on the leading edge of product design and development, delivering high quality, robust and reliable latching products.</p>
				<h3 id="what-we-do">What We Do Best</h3>
				<p>Hartwell is uniquely capable of designing and manufacturing high quality quick access latching systems for every aircraft manufacturer's unique accessibility challenges, all with in-house resources. We provide the industry's most rapid response for prototypes and "first to market" concepts.  We also deliver the lowest cost of ownership, in part by relieving the customers of the design responsibility. Additionally, we support our customers from concept to delivery for the life of the aircraft through our Aftermarket Support Company, HASCO&reg;.</p>
			</div>
			<div
				class="img"
				style="background-image: url('/static/public/img/man-with-drill.jpg');"
			></div>
		</div>
		<div class="para-col-right">
			<div
				class="img"
				style="background-image: url('/static/public/img/history-banner.jpg');"
			></div>
			<div class="body">
				<h3 id="who-we-are">History</h3>
				<p>Founded as a small distribution company in 1939, Hartwell Corporation has grown into a global leader specializing in the design, development, and manufacture of latches and latching systems for the aerospace industry. Virtually every aircraft flying today has a variety of Hartwell Latches aboard.</p>
				<p>Our strength and success is partly due to our philosophy of working side by side with aircraft and engine manufacturers to solve complex problems wherever access into the aircraft is required.  We have specialized in quick access latches since our WWII wartime invention of the Trigger-Lock® latch, which became the industry standard by dramatically reducing the time required to service an aircraft.</p>
				<p>Today we are tooled for over 20,000 versions of latches for various applications including engine cowlings, nacelles and thrust reversers, as well as interior and exterior access panels, cargo doors and interior stowage bins.</p>
			</div>
			<div
				class="para"
				style="background-image: url('/static/public/img/history-floating-item.png');"
			></div>
		</div>
		<div class="para-col-left">
			<div
				class="para"
				style="background-image: url('/static/public/img/capabilities-floating-item.png');"
			></div>
			<div class="body">
				<h3 id="who-we-are">Capabilities</h3>
				<p>Hartwell brings you state-of-the-art on-time engineering, manufacturing, and aftermarket support.</p>
				<ul>
					<li>
						Design, analysis, and product development
					</li>
					<li>
						Testing and reporting
					</li>
					<li>
						Innovation
					</li>
					<li>
						Rapid prototyping & 3D Printing
					</li>
					<li>
						Design validation
					</li>
					<li>
						Sustaining engineering support
					</li>
				</ul>
			</div>
			<div
				class="img"
				style="background-image: url('/static/public/img/capabilities-banner.jpg');"
			></div>
		</div>
		<div class="para-col-2-right">
			<div
				class="img"
				style="background-image: url('/static/public/img/sota-banner.jpg');"
			></div>
			<div class="body">
				<h3 id="who-we-are">State-of-the-Art Manufacturing</h3>
				<p>Our manufacturing capabilities allow us to provide innovative solutions.  We are able to handle various materials including Aluminum, Stainless, High Carbon Steels, Titanium and Inconel. We can support low volume and high volume mix requirements.</p>
				<ul>
					<li>State-of-the-art Manufacturing Capabilities</li>
					<ul>
						<li>Horizontal and Vertical Mills</li>

						<li>Sheet Metal Forming</li>

						<li>5-Axis</li>

						<li>Mil-Turns</li>

						<li>Swiss</li>
					</ul>
					<li>Flexible technology</li>
					<li>Plating Capabilities</li>
					<ul>
						<li>Chemical Conversion</li>
						<li>Passivation</li>
						<li>Electro Polishing</li>
						<li>Cadmium Plating</li>
						<li>Anodize Type I and II</li>
						<li>Hard Anodize</li>
					</ul>
					<li>Sheet Metal Tooling and Fixture Development</li>
					<li>Paint Finishing and Dry Film Application</li>
					<li>Non Destructive Testing</li>
					<ul>
						<li>Laser Marking</li>
					</ul>
				</ul>
			</div>
		</div>
		<div class="para-col-left">
			<div
				class="para"
				style="background-image: url('/static/public/img/products-certificates-floating-item.png');"
			></div>
			<div class="body">
				<h3 id="products">Products</h3>
				<p>Hartwell has 3 different business units internally that focus on specific markets and customers. Airframe, Propulsion and Diversified.  Our product ranges from standard off the shelf latches, and hinges, to complex highly engineered custom designs to fit the desired application.</p>
				<h3 id="certificates">Certificates</h3>
				<p>• NADCAP • AS9100C • EASA Part 145 Individual customer certifications and approvals</p>
			</div>
			<div
				class="img"
				style="background-image: url('/static/public/img/products-certificates-banner.jpg');"
			></div>
		</div>
</div>
-->
@foreach($page->bands as $band)

	<?= View::make('band', ['band' => $band])->render() ?>

@endforeach

<?php if ($page->type === 'contact'): ?>
	<?= view('contact-form')->render() ?>
<?php endif; ?>

<?php if ($page->type === 'careers'): ?>
	<?= view('careers', ['positions' => $positions])->render() ?>
<?php endif; ?>
