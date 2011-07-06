		<h1>Heading 1</h1>
		<h2>Heading 2</h2>
		<h3>Heading 3</h3>
		<h4>Heading 4</h4>
		<h5>Heading 5</h5>
		<h6>Heading 6</h6>
		
		<section>
			<h1>Section Heading 1</h1>
			<article>
				<h4>Article Heading 2</h4>
				<address>Address: somewhere, world</address>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m.</p>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m.</p>
			</article>
		</section>
		
		<h1>Text-level semantics</h1>

		<p>
		The <a href="#">a element</a> example<br>
		The <abbr title="Title text">abbr element</abbr> example<br>
		The <b>b element</b> example<br>
		The <cite>cite element</cite> example<br>
		The <code>code element</code> example<br>
		The <del>del element</del> example<br>
		The <dfn>dfn element</dfn> example<br>
		The <em>em element</em> example<br>
		The <i>i element</i> example<br>
		The <ins>ins element</ins> example<br>
		The <kbd>kbd element</kbd> example<br>
		The <q>q element <q>inside</q> a q element</q> example<br>
		The <s>s element</s> example<br>
		The <samp>samp element</samp> example<br>
		The <small>small element</small> example<br>
		The <span>span element</span> example<br>
		The <strike>strike element</strike> example<br>
		The <strong>strong element</strong> example<br>
		The <sub>sub element</sub> example<br>
		The <sup>sup element</sup> example<br>
		The <var>var element</var> example<br>
		The <u>u element</u> example<br>
		The <mark>mark element</mark> example
		</p>
		
		<h1>Grouping content</h1>
		
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et m.</p>
		
		<h3>pre</h3>
		
		<pre>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et me.</pre>
		<pre><code>&lt;html></code>
	<code>&lt;head></code>
	<code>&lt;/head></code>
	<code>&lt;body></code>
		<code>&lt;div class="main"> &lt;div></code>
	<code>&lt;/body></code>
<code>&lt;/html></code></pre>
		
		<h3>blockquote</h3>
		
		<blockquote>
			<p>Some sort of famous witty quote marked up with a &lt;blockquote> and a child &lt;p> element.</p>
		</blockquote>
		
		<blockquote>Even better philosophical quote marked up with just a &lt;blockquote> element.</blockquote>
		
		<h3>ordered list</h3>
		
		<ol>
			<li>list item 1</li>
			<li>list item 1
				<ol>
					<li>list item 2</li>
					<li>list item 2
						<ol>
							<li>list item 3</li>
							<li>list item 3</li>
						</ol>
					</li>
					<li>list item 2</li>
					<li>list item 2</li>
				</ol>
			</li>
			<li>list item 1</li>
			<li>list item 1</li>
		</ol>
		
		<h3>unordered list</h3>
		
		<ul>
			<li>list item 1</li>
			<li>list item 1
				<ul>
					<li>list item 2</li>
					<li>list item 2
						<ul>
							<li>list item 3</li>
							<li>list item 3</li>
						</ul>
					</li>
					<li>list item 2</li>
					<li>list item 2</li>
				</ul>
			</li>
			<li>list item 1</li>
			<li>list item 1</li>
		</ul>
		
		<h3>description list</h3>
		
		<dl>
			<dt>Description name</dt>
			<dd>Description value</dd>
			<dt>Description name</dt>
			<dd>Description value</dd>
			<dd>Description value</dd>
			<dt>Description name</dt>
			<dt>Description name</dt>
			<dd>Description value</dd>
		</dl>
		
		<h3>figure</h3>
		
		<figure>
			<img src="http://placehold.it/1000x200" alt="">
			<figcaption>Figcaption content</figcaption>
		</figure>
		<blockquote>lol</blockquote>

		<h1>Tabular data</h1>
		
		<table summary="Jimi Hendrix albums">
			<caption>Jimi Hendrix - albums</caption>
			<thead>
				<tr>
					<th>Album</th>
					<th>Year</th>
					<th>Price</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Album</th>
					<th>Year</th>
					<th>Price</th>
				</tr>
			</tfoot>
			<tbody>
				<tr>
					<td>Are You Experienced</td>
					<td>1967</td>
					<td>$10.00</td>
				</tr>
				<tr>
					<td>Axis: Bold as Love</td>
					<td>1967</td>
					<td>$12.00</td>
				</tr>
				<tr>
					<td>Electric Ladyland</td>
					<td>1968</td>
					<td>$10.00</td>
				</tr>
				<tr>
					<td>Band of Gypsys</td>
					<td>1970</td>
					<td>$12.00</td>
				</tr>
			</tbody>
		</table>
		
		<h1>Forms</h1>
		
		<form>
			<fieldset>
				<legend>Inputs as descendents of labels (form legend)</legend>
				<p><label>Text input <input type="text" value="default value"></label></p>
				<p><label>Email input <input type="email"></label></p>
				<p><label>Search input <input type="search"></label></p>
				<p><label>Tel input <input type="tel"></label></p>
				<p><label>URL input <input type="url" placeholder="http://"></label></p>
				<p><label>Password input <input type="password" value="password"></label></p>
				<p><label>File input <input type="file"></label></p>
				
				<p><label>Radio input <input type="radio" name="rad"></label></p>
				<p><label>Checkbox input <input type="checkbox"></label></p>
				<p><label><input type="radio" name="rad"> Radio input</label></p>
				<p><label><input type="checkbox"> Checkbox input</label></p>
				
				<p><label>Select field <select><option>Option 01</option><option>Option 02</option></select></label></p>
				<p><label>Textarea <textarea cols="30" rows="5" >Textarea text</textarea></label></p>
			</fieldset>
			
			<fieldset>
				<legend>Inputs as siblings of labels</legend>
				<p><label for="ic">Color input</label> <input type="color" id="ic" value="color"></p>
				<p><label for="in">Number input</label> <input type="number" id="in" min="0" max="10" value="5"></p>
				<p><label for="ir">Range input</label> <input type="range" id="ir" value="range"></p>
				<p><label for="idd">Date input</label> <input type="date" id="idd" value="date"></p>
				<p><label for="idm">Month input</label> <input type="month" id="idm" value="month"></p>
				<p><label for="idw">Week input</label> <input type="week" id="idw" value="week"></p>
				<p><label for="idt">Datetime input</label> <input type="datetime" id="idt" value="datetime"></p>
				<p><label for="idtl">Datetime-local input</label> <input type="datetime-local" id="idtl" value="datetime-local"></p>

				<p><label for="irb">Radio input</label> <input type="radio" id="irb" name="rad"></p>
				<p><label for="icb">Checkbox input</label> <input type="checkbox" id="icb"></p>
				<p><input type="radio" id="irb2" name="rad"> <label for="irb2">Radio input</label></p>
				<p><input type="checkbox" id="icb2"> <label for="icb2">Checkbox input</label></p>
				
				<p><label for="s">Select field</label> <select id="s"><option>Option 01</option><option>Option 02</option></select></p>
				<p><label for="t">Textarea</label> <textarea id="t" cols="30" rows="5" >Textarea text</textarea></p>
			</fieldset>
			
			<fieldset>
				<legend>Clickable inputs and buttons</legend>
				<p><input type="image" src="http://placehold.it/90x24" alt="Image (input)"></p>
				<p><input type="reset" value="Reset (input)"></p>
				<p><input type="button" value="Button (input)"></p>
				<p><input type="submit" value="Submit (input)"></p>

				<p><button type="reset">Reset (button)</button></p>
				<p><button type="button">Button (button)</button></p>
				<p><button type="submit">Submit (button)</button></p>
			</fieldset>
			
		<fieldset id="boxsize">
			<legend>box-sizing tests</legend>
			<div><input type="text" placeholder="text"></div>
			<div><input type="email" placeholder="email"></div>
			<div><input type="search" placeholder="search"></div>
			<div><input type="url" placeholder="http://"></div>
			<div><input type="password" placeholder="password"></div>

			<div><input type="color" placeholder="color"></div>
			<div><input type="number" placeholder="number"></div>
			<div><input type="range" placeholder="range"></div>
			<div><input type="date" placeholder="date"></div>
			<div><input type="month" placeholder="month"></div>
			<div><input type="week" placeholder="week"></div>
			<div><input type="datetime" placeholder="datetime"></div>
			<div><input type="datetime-local" placeholder="datetime-local"></div>
			
			<div><input type="radio"></div>
			<div><input type="checkbox"></div>
			
			<div><select><option>Option 01</option><option>Option 02</option></select></div>
			<div><textarea cols="30" rows="5"></textarea></div>
			
			<div><input type="image" src="http://placehold.it/90x24" alt="Image (input)"></div>
			<div><input type="reset" value="Reset (input)"></div>

			<div><input type="button" value="Button (input)"></div>
			<div><input type="submit" value="Submit (input)"></div>
			<div><button type="reset">Reset (button)</button></div>
			<div><button type="button">Button (button)</button></div>
			<div><button type="submit">Submit (button)</button></div>
		</fieldset>
	</form>