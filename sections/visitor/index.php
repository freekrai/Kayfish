<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Page name <small>Supporting text or tagline</small></h1>
		</div>
		<div class="row">
			<div class="span16">
				<h2>Main content</h2>
				<table class="zebra-striped" id="sortTable">
				<thead>
				<tr>
					<th class="header">#</th>
					<th class="yellow header">First Name</th>
					<th class="blue header headerSortDown">Last Name</th>
					<th class="green header">Language</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<td>3</td>
					<td>Stu</td>
					<td>Dent</td>
					<td>Code</td>
				</tr>
				<tr>
					<td>1</td>
					<td>Your</td>
					<td>One</td>
					<td>English</td>
				</tr>
				<tr>
					<td>2</td>
					<td>Joe</td>
					<td>Sixpack</td>
					<td>English</td>
				</tr>
				</tbody>
				</table>
				<h2>Form Fields</h2>				
				<form>
				<fieldset>
					<legend>Example form legend</legend>
					<div class="clearfix">
						<label for="xlInput">X-Large input</label>
						<div class="input">
							<input class="xlarge required" id="xlInput" name="xlInput" size="30" type="text">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="normalSelect">Select</label>
						<div class="input">
							<select name="normalSelect" id="normalSelect">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="mediumSelect">Select</label>
						<div class="input">
							<select class="medium" name="mediumSelect" id="mediumSelect">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div><!-- /clearfix -->
  					<div class="clearfix">
						<label for="multiSelect">Multiple select</label>
						<div class="input">
							<select class="medium" multiple="multiple" name="multiSelect" id="multiSelect">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label>Uneditable input</label>
						<div class="input">
							<span class="uneditable-input">Some value here</span>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="disabledInput">Disabled input</label>
						<div class="input">
							<input class="xlarge disabled" id="disabledInput" name="disabledInput" size="30" type="text" placeholder="Disabled input here… carry on." disabled="">
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="disabledInput">Disabled textarea</label>
						<div class="input">
							<textarea class="xxlarge" name="textarea" id="textarea" rows="3" disabled=""></textarea>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix error">
						<label for="xlInput2">X-Large input</label>
						<div class="input">
							<input class="xlarge error" id="xlInput2" name="xlInput2" size="30" type="text">
							<span class="help-inline">Small snippet of help text</span>
						</div>
					</div><!-- /clearfix -->
				</fieldset>
				<fieldset>
					<legend>Example form legend</legend>
					<div class="clearfix">
						<label for="prependedInput">Prepended text</label>
						<div class="input">
							<div class="input-prepend">
								<span class="add-on">@</span>
								<input class="medium" id="prependedInput" name="prependedInput" size="16" type="text">
							</div>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="prependedInput2">Prepended checkbox</label>
						<div class="input">
							<div class="input-prepend">
								<label class="add-on"><input type="checkbox" name="" id="" value=""></label>
								<input class="mini" id="prependedInput2" name="prependedInput2" size="16" type="text">
							</div>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="appendedInput">Appended checkbox</label>
						<div class="input">
							<div class="input-append">
								<input class="mini" id="appendedInput" name="appendedInput" size="16" type="text">
								<label class="add-on active"><input type="checkbox" name="" id="" value="" checked="checked"></label>
							</div>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="fileInput">File input</label>
						<div class="input">
							<input class="input-file" id="fileInput" name="fileInput" type="file">
						</div>
					</div><!-- /clearfix -->
				</fieldset>
				<fieldset>
					<legend>Example form legend</legend>
					<div class="clearfix">
						<label id="optionsCheckboxes">List of options</label>
						<div class="input">
							<ul class="inputs-list">
							<li>
								<label>
									<input type="checkbox" name="optionsCheckboxes" value="option1">
									<span>Option one is this and that—be sure to include why it’s great</span>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="optionsCheckboxes" value="option2">
									<span>Option two can also be checked and included in form results</span>
								</label>
							</li>
							<li>
								<label>
									<input type="checkbox" name="optionsCheckboxes" value="option2">
									<span>Option three can—yes, you guessed it—also be checked and included in form results</span>
								</label>
							</li>
							<li>
								<label class="disabled">
									<input type="checkbox" name="optionsCheckboxes" value="option2" disabled="">
									<span>Option four cannot be checked as it is disabled.</span>
								</label>
							</li>
							</ul>
							<span class="help-block">
								<strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.
							</span>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label>Date range</label>
						<div class="input">
							<div class="inline-inputs">
								<input class="small" type="text" value="May 1, 2011">
								<input class="mini" type="text" value="12:00am">
								to
								<input class="small" type="text" value="May 8, 2011">
								<input class="mini" type="text" value="11:59pm">
								<span class="help-inline">All times are shown as Pacific Standard Time (GMT -08:00).</span>
							</div>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label for="textarea">Textarea</label>
						<div class="input">
							<textarea class="xxlarge" id="textarea2" name="textarea2" rows="3"></textarea>
							<span class="help-block">
								Block of help text to describe the field above if need be.
							</span>
						</div>
					</div><!-- /clearfix -->
					<div class="clearfix">
						<label id="optionsRadio">List of options</label>
						<div class="input">
							<ul class="inputs-list">
							<li>
								<label>
									<input type="radio" checked="" name="optionsRadios" value="option1">
									<span>Option one is this and that—be sure to include why it’s great</span>
								</label>
							</li>
							<li>
								<label>
									<input type="radio" name="optionsRadios" value="option2">
									<span>Option two can is something else and selecting it will deselect options 1</span>
								</label>
							</li>
							</ul>
						</div>
					</div><!-- /clearfix -->
					<div class="actions">
						<input type="submit" class="btn primary" value="Save changes">&nbsp;<button type="reset" class="btn">Cancel</button>
					</div>
				</fieldset>
			  	</form>
				<h2>Typography</h2>


  <div class="row">
    <div class="span4">
      <h2>Headings &amp; copy</h2>
      <p>A standard typographic hierarchy for structuring your webpages.</p>
      <p>The entire typographic grid is based on two Less variables in our preboot.less file: <code>@basefont</code> and <code>@baseline</code>. The first is the base font-size used throughout and the second is the base line-height.</p>
      <p>We use those variables, and some math, to create the margins, paddings, and line-heights of all our type and more.</p>
    </div>
    <div class="span4">
      <h1>h1. Heading 1</h1>
      <h2>h2. Heading 2</h2>
      <h3>h3. Heading 3</h3>
      <h4>h4. Heading 4</h4>
      <h5>h5. Heading 5</h5>
      <h6>h6. Heading 6</h6>
    </div>
    <div class="span12">
      <h3>Example paragraph</h3>
      <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      <h1>Example heading <small>Has sub-heading…</small></h1>
    </div>
  </div>

  <!-- Misc Elements -->
  <div class="row">
    <div class="span4">
      <h2>Misc. elements</h2>
      <p>Using emphasis, addresses, &amp; abbreviations</p>
      <p>
        <code>&lt;strong&gt;</code>
        <code>&lt;em&gt;</code>
        <code>&lt;address&gt;</code>
        <code>&lt;abbr&gt;</code>
      </p>
    </div>
    <div class="span12">
      <h3>When to use</h3>
      <p>Emphasis tags (<code>&lt;strong&gt;</code> and <code>&lt;em&gt;</code>) should be used to indicate additional importance or emphasis of a word or phrase relative to its surrounding copy. Use <code>&lt;strong&gt;</code> for importance and <code>&lt;em&gt;</code> for <em>stress</em> emphasis.</p>
      <h3>Emphasis in a paragraph</h3>
      <p><a href="#">Fusce dapibus</a>, <strong>tellus ac cursus commodo</strong>, <em>tortor mauris condimentum nibh</em>, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Nulla vitae elit libero, a pharetra augue.</p>
      <p><strong>Note:</strong> It's still okay to use <code>&lt;b&gt;</code> and <code>&lt;i&gt;</code> tags in HTML5 and they don't have to be styled bold and italic, respectively (although if there is a more semantic element, use it). <code>&lt;b&gt;</code> is meant to highlight words or phrases without conveying additional importance, while <code>&lt;i&gt;</code> is mostly for voice, technical terms, etc.</p>
      <h3>Addresses</h3>
      <p>The <code>&lt;address&gt;</code> element is used for contact information for its nearest ancestor, or the entire body of work. Here are two examples of how it could be used:</p>

      <div class="row">
        <div class="span4">
          <address>
            <strong>Twitter, Inc.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            <abbr title="Phone">P:</abbr> (123) 456-7890
          </address>
        </div>
        <div class="span4">
          <address>
            <strong>Full Name</strong><br>
            <a mailto="">first.last@gmail.com</a>
          </address>
        </div>
      </div>

      <p><strong>Note:</strong> Each line in an <code>&lt;address&gt;</code> must end with a line-break (<code>&lt;br /&gt;</code>) or be wrapped in a block-level tag (e.g., <code>&lt;p&gt;</code>) to properly structure the content.</p>
      <h3>Abbreviations</h3>
      <p>For abbreviations and acronyms, use the <code>&lt;abbr&gt;</code> tag (<code>&lt;acronym&gt;</code> is deprecated in <abbr title="HyperText Markup Langugage 5">HTML5</abbr>). Put the shorthand form within the tag and set a title for the complete name.</p>
    </div>
  </div><!-- /row -->

  <!-- Blockquotes -->
  <div class="row">
    <div class="span4">
      <h2>Blockquotes</h2>
      <p>
        <code>&lt;blockquote&gt;</code>
        <code>&lt;p&gt;</code>
        <code>&lt;small&gt;</code>
      </p>
    </div>
    <div class="span12">
      <h3>How to quote</h3>
      <p>To include a blockquote, wrap <code>&lt;blockquote&gt;</code> around <code>&lt;p&gt;</code> and <code>&lt;small&gt;</code> tags. Use the <code>&lt;small&gt;</code> element to cite your source and you'll get an em dash <code>&amp;mdash;</code> before it.</p>
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</p>
        <small>Dr. Julius Hibbert</small>
      </blockquote>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;blockquote&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;p&gt;</span><span class="pln">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</span><span class="tag">&lt;/p&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;small&gt;</span><span class="pln">Dr. Julius Hibbert</span><span class="tag">&lt;/small&gt;</span></li><li class="L3"><span class="tag">&lt;/blockquote&gt;</span></li></ol></pre>
    </div>
  </div><!-- /row -->

  <h2>Lists</h2>
  <div class="row">
    <div class="span6">
      <h4>Unordered <code>&lt;ul&gt;</code></h4>
      <ul>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Consectetur adipiscing elit</li>
        <li>Integer molestie lorem at massa</li>
        <li>Facilisis in pretium nisl aliquet</li>
        <li>Nulla volutpat aliquam velit
          <ul>
            <li>Phasellus iaculis neque</li>
            <li>Purus sodales ultricies</li>
            <li>Vestibulum laoreet porttitor sem</li>
            <li>Ac tristique libero volutpat at</li>
          </ul>
        </li>
        <li>Faucibus porta lacus fringilla vel</li>
        <li>Aenean sit amet erat nunc</li>
        <li>Eget porttitor lorem</li>
      </ul>
    </div>
    <div class="span6">
      <h4>Unstyled <code>&lt;ul.unstyled&gt;</code></h4>
      <ul class="unstyled">
        <li>Lorem ipsum dolor sit amet</li>
        <li>Consectetur adipiscing elit</li>
        <li>Integer molestie lorem at massa</li>
        <li>Facilisis in pretium nisl aliquet</li>
        <li>Nulla volutpat aliquam velit
          <ul>
            <li>Phasellus iaculis neque</li>
            <li>Purus sodales ultricies</li>
            <li>Vestibulum laoreet porttitor sem</li>
            <li>Ac tristique libero volutpat at</li>
          </ul>
        </li>
        <li>Faucibus porta lacus fringilla vel</li>
        <li>Aenean sit amet erat nunc</li>
        <li>Eget porttitor lorem</li>
      </ul>
    </div>
  </div>
  <div class="row">
    <div class="span6">
      <h4>Ordered <code>&lt;ol&gt;</code></h4>
      <ol>
        <li>Lorem ipsum dolor sit amet</li>
        <li>Consectetur adipiscing elit</li>
        <li>Integer molestie lorem at massa</li>
        <li>Facilisis in pretium nisl aliquet</li>
        <li>Nulla volutpat aliquam velit</li>
        <li>Faucibus porta lacus fringilla vel</li>
        <li>Aenean sit amet erat nunc</li>
        <li>Eget porttitor lorem</li>
      </ol>
    </div>
    <div class="span6">
      <h4>Description <code>dl</code></h4>
      <dl>
        <dt>Description lists</dt>
        <dd>A description list is perfect for defining terms.</dd>
        <dt>Euismod</dt>
        <dd>Vestibulum id ligula porta felis euismod semper eget lacinia odio sem nec elit.</dd>
        <dd>Donec id elit non mi porta gravida at eget metus.</dd>
        <dt>Malesuada porta</dt>
        <dd>Etiam porta sem malesuada magna mollis euismod.</dd>
      </dl>
    </div>
  </div><!-- /row -->


  <!-- Code -->
  <div class="row">
    <div class="span4">
      <h2>Code</h2>
      <p>
        <code>&lt;code&gt;</code>
        <code>&lt;pre&gt;</code>
      </p>
      <p>Pimp your code in style with two simple tags. For even more awesomeness through javascript, drop in Google's code prettify library and you're set.</p>
    </div>
    <div class="span12">
      <h3>Presenting code</h3>
      <p>Code, blocks of or just snippets inline, can be displayed with style just by wrapping in the right tag. For blocks of code spanning multiple lines, use the <code>&lt;pre&gt;</code> element. For inline code, use the <code>&lt;code&gt;</code> element.</p>
      <table class="zebra-striped">
        <thead>
          <tr>
            <th style="width: 190px;">Element</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>&lt;code&gt;</code></td>
            <td>In a line of text like this, your wrapped code will look like this <code>&gt;html&lt;</code> element.</td>
          </tr>
          <tr>
            <td><code>&lt;pre&gt;</code></td>
            <td>
<pre>&lt;div&gt;
  &lt;h1&gt;Heading&lt;/h1&gt;
  &lt;p&gt;Something right here...&lt;/p&gt;
&lt;/div&gt;</pre>
              <p><strong>Note:</strong> Be sure to keep code within <code>pre</code> tags as close to the left as possible; it will render all tabs.</p>
            </td>
          </tr>
          <tr>
            <td><code>&lt;pre class="prettyprint"&gt;</code></td>
            <td>
              <p>Using the google-code-prettify library, you're blocks of code get a slightly different visual style and automatic syntax highlighting.</p>
<pre class="prettyprint"><span class="tag">&lt;div&gt;</span><span class="pln">
  </span><span class="tag">&lt;h1&gt;</span><span class="pln">Heading</span><span class="tag">&lt;/h1&gt;</span><span class="pln">
  </span><span class="tag">&lt;p&gt;</span><span class="pln">Something right here...</span><span class="tag">&lt;/p&gt;</span><span class="pln">
</span><span class="tag">&lt;/div&gt;</span></pre>
              <p><a href="http://code.google.com/p/google-code-prettify/">Download google-code-prettify</a> and view the readme for <a href="http://google-code-prettify.googlecode.com/svn/trunk/README.html">how to use</a>.</p>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!-- /row -->

  <!-- Labels -->
  <div class="row">
    <div class="span4">
      <h2>Inline labels</h2>
      <p>
        <code>&lt;span class="label"&gt;</code>
      </p>
      <p>Call attention to or flag any phrase in your body text.</p>
    </div>
    <div class="span12">
      <h3>Label anything</h3>
      <p>Ever needed one of those fancy <span class="label success">New!</span> or <span class="label important">Important</span> flags when writing code? Well, now you have them. Here's what's included by default:</p>
      <table class="zebra-striped">
        <thead>
          <tr>
            <th style="width: 50%;">Label</th>
            <th>Result</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <code>&lt;span class="label"&gt;Default&lt;/span&gt;</code>
            </td>
            <td>
              <span class="label">Default</span>
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;span class="label success"&gt;New&lt;/span&gt;</code>
            </td>
            <td>
              <span class="label success">New</span>
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;span class="label warning"&gt;Warning&lt;/span&gt;</code>
            </td>
            <td>
              <span class="label warning">Warning</span>
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;span class="label important"&gt;Important&lt;/span&gt;</code>
            </td>
            <td>
              <span class="label important">Important</span>
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;span class="label notice"&gt;Notice&lt;/span&gt;</code>
            </td>
            <td>
              <span class="label notice">Notice</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div><!-- /row -->
			</div>
		</div>
	</div>
</div> <!-- /container -->