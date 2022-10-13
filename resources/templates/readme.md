<h1>CutCode</h1>
<p>Education platform.</p>

<h2>How to use</h2>
<ol>
	<li>Clone repository</li>
	<li>Install Node Modules: <strong>yarn/npm i</strong></li>
	<li>Run: <strong>gulp</strong></li>
</ol>

<h2>Main Gulp tasks</h2>
<ul>
	<li><strong>gulp</strong>: run default gulp task (scripts, images, styles, browsersync, startwatch)</li>
	<li><strong>scripts, styles, images, assets</strong>: build assets (css, js, images or all)</li>
	<li><strong>deploy</strong>: project deployment via <strong>RSYNC</strong></li>
	<li><strong>build</strong>: project build</li>
</ul>

<h2>Generate fonts on the first run:</h2>
<code>gulp fonts</code>

<h2>Watch in-real time Tailwind:</h2>
<code>npx tailwindcss -i ./app/sass/tailwind.css -o ./dist/css/tailwind.css --watch</code>
