   <div class="container">

<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <h1>Base CSS</h1>
  <p class="lead">On top of the scaffolding, basic HTML elements are styled and enhanced with extensible classes to provide a fresh, consistent look and feel.</p>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li><a href="#typography">Typography</a></li>
      <li><a href="#code">Code</a></li>
      <li><a href="#tables">Tables</a></li>
      <li><a href="#forms">Forms</a></li>
      <li><a href="#buttons">Buttons</a></li>
      <li><a href="#icons">Icons by Glyphicons</a></li>
    </ul>
  </div>
</header>


<!-- Typography
================================================== -->
<section id="typography">
  <div class="page-header">
    <h1>Typography <small>Headings, paragraphs, lists, and other inline type elements</small></h1>
  </div>

  <h2>Headings &amp; body copy</h2>

  <!-- Headings & Paragraph Copy -->
  <div class="row">
    <div class="span4">
      <h3>Typographic scale</h3>
      <p>The entire typographic grid is based on two Less variables in our variables.less file: <code>@baseFontSize</code> and <code>@baseLineHeight</code>. The first is the base font-size used throughout and the second is the base line-height.</p>
      <p>We use those variables, and some math, to create the margins, paddings, and line-heights of all our type and more.</p>
    </div>
    <div class="span4">
      <h3>Example body text</h3>
      <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      <p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec sed odio dui.</p>
    </div>
    <div class="span4">
      <div class="well">
        <h1>h1. Heading 1</h1>
        <h2>h2. Heading 2</h2>
        <h3>h3. Heading 3</h3>
        <h4>h4. Heading 4</h4>
        <h5>h5. Heading 5</h5>
        <h6>h6. Heading 6</h6>
      </div>
    </div>
  </div>

  <!-- Misc Elements -->
  <h2>Emphasis, address, and abbreviation</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Element</th>
        <th>Usage</th>
        <th>Optional</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <code>&lt;strong&gt;</code>
        </td>
        <td>
          For emphasizing a snippet of text with <strong>important</strong>
        </td>
        <td>
          <span class="muted">None</span>
        </td>
      </tr>
      <tr>
        <td>
          <code>&lt;em&gt;</code>
        </td>
        <td>
          For emphasizing a snippet of text with <em>stress</em>
        </td>
        <td>
          <span class="muted">None</span>
        </td>
      </tr>
      <tr>
        <td>
          <code>&lt;abbr&gt;</code>
        </td>
        <td>
          Wraps abbreviations and acronyms to show the expanded version on hover
        </td>
        <td>
          Include optional <code>title</code> for expanded text
        </td>
      </tr>
      <tr>
        <td>
          <code>&lt;address&gt;</code>
        </td>
        <td>
          For contact information for its nearest ancestor or the entire body of work
        </td>
        <td>
          Preserve formatting by ending all lines with <code>&lt;br&gt;</code>
        </td>
      </tr>
    </tbody>
  </table>

  <div class="row">
    <div class="span4">
      <h3>Using emphasis</h3>
      <p><a href="#">Fusce dapibus</a>, <strong>tellus ac cursus commodo</strong>, <em>tortor mauris condimentum nibh</em>, ut fermentum massa justo sit amet risus. Maecenas faucibus mollis interdum. Nulla vitae elit libero, a pharetra augue.</p>
      <p><strong>Note:</strong> Feel free to use <code>&lt;b&gt;</code> and <code>&lt;i&gt;</code> in HTML5, but their usage has changed a bit. <code>&lt;b&gt;</code> is meant to highlight words or phrases without conveying additional importance while <code>&lt;i&gt;</code> is mostly for voice, technical terms, etc.</p>
    </div>
    <div class="span4">
      <h3>Example addresses</h3>
      <p>Here are two examples of how the <code>&lt;address&gt;</code> tag can be used:</p>
      <address>
        <strong>Twitter, Inc.</strong><br>
        795 Folsom Ave, Suite 600<br>
        San Francisco, CA 94107<br>
        <abbr title="Phone">P:</abbr> (123) 456-7890
      </address>
      <address>
        <strong>Full Name</strong><br>
        <a href="mailto:#">first.last@gmail.com</a>
      </address>
    </div>
    <div class="span4">
      <h3>Example abbreviations</h3>
      <p>Abbreviations are styled with uppercase text and a light dotted bottom border. They also have a help cursor on hover so users have extra indication something will be shown on hover.</p>
      <p><abbr title="HyperText Markup Language">HTML</abbr> is the best thing since sliced bread.</p>
      <p>An abbreviation of the word attribute is <abbr title="attribute">attr</abbr>.</p>
    </div>
  </div>


  <!-- Blockquotes -->
  <h2>Blockquotes</h2>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Element</th>
        <th>Usage</th>
        <th>Optional</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <code>&lt;blockquote&gt;</code>
        </td>
        <td>
          Block-level element for quoting content from another source
        </td>
        <td>
          <p>Add <code>cite</code> attribute for source URL</p>
          Use <code>.pull-left</code> and <code>.pull-right</code> classes for floated options
        </td>
      </tr>
      <tr>
        <td>
          <code>&lt;small&gt;</code>
        </td>
        <td>
          Optional element for adding a user-facing citation, typically an author with title of work
        </td>
        <td>
          Place the <code>&lt;cite&gt;</code> around the title or name of source
        </td>
      </tr>
    </tbody>
  </table>
  <div class="row">
    <div class="span4">
      <p>To include a blockquote, wrap <code>&lt;blockquote&gt;</code> around any <abbr title="HyperText Markup Language">HTML</abbr> as the quote. For straight quotes we recommend a <code>&lt;p&gt;</code>.</p>
      <p>Include an optional <code>&lt;small&gt;</code> element to cite your source and you'll get an em dash <code>&amp;mdash;</code> before it for styling purposes.</p>
    </div>
    <div class="span8">
<pre class="prettyprint linenums">
&lt;blockquote&gt;
  &lt;p&gt;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis.&lt;/p&gt;
  &lt;small&gt;Someone famous&lt;/small&gt;
&lt;/blockquote&gt;
</pre>
    </div>
  </div><!--/row-->

  <h3>Example blockquotes</h3>
  <div class="row">
    <div class="span6">
      <p>Default blockquotes are styled as such:</p>
      <blockquote>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis.</p>
        <small>Someone famous in <cite title="">Body of work</cite></small>
      </blockquote>
    </div>
    <div class="span6">
      <p>To float your blockquote to the right, add <code>class="pull-right"</code>:</p>
      <blockquote class="pull-right">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis.</p>
        <small>Someone famous in <cite title="">Body of work</cite></small>
      </blockquote>
    </div>
  </div>


  <!-- Lists -->
  <h2>Lists</h2>
  <div class="row">
    <div class="span3">
      <h4>Unordered</h4>
      <p><code>&lt;ul&gt;</code></p>
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
    <div class="span3">
      <h4>Unstyled</h4>
      <p><code>&lt;ul class="unstyled"&gt;</code></p>
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
    <div class="span3">
      <h4>Ordered</h4>
      <p><code>&lt;ol&gt;</code></p>
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
    <div class="span3">
      <h4>Description</h4>
      <p><code>&lt;dl&gt;</code></p>
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
</section>



<!-- Code
================================================== -->
<section id="code">
  <div class="page-header">
    <h1>Code <small>Inline and block code snippets</small></h1>
  </div>
  <div class="row">
    <div class="span4">
      <h2>Inline</h2>
      <p>Wrap inline snippets of code with <code>&lt;code&gt;</code>.</p>
<pre class="prettyprint linenums">
For example, &lt;code&gt;section&lt;/code&gt; should be wrapped as inline.
</pre>
    </div><!--/span-->
    <div class="span4">
      <h2>Basic block</h2>
      <p>Use <code>&lt;pre&gt;</code> for multiple lines of code. Be sure to turn any carets into their unicode characters for proper rendering.</p>
<pre>
&lt;p&gt;Sample text here...&lt;/p&gt;
</pre>
<pre class="prettyprint linenums" style="margin-bottom: 9px;">
&lt;pre&gt;
  &amp;lt;p&amp;gt;Sample text here...&amp;lt;/p&amp;gt;
&lt;/pre&gt;
</pre>
      <p><strong>Note:</strong> Be sure to keep code within <code>&lt;pre&gt;</code> tags as close to the left as possible; it will render all tabs.</p>
    </div><!--/span-->
    <div class="span4">
      <h2>Google Prettify</h2>
      <p>Take the same <code>&lt;pre&gt;</code> element and add two optional classes for enhanced rendering.</p>
<pre class="prettyprint linenums" style="margin-bottom: 9px;">
&lt;p&gt;Sample text here...&lt;/p&gt;
</pre>
<pre class="prettyprint linenums" style="margin-bottom: 9px;">
&lt;pre class="prettyprint
     linenums"&gt;
  &amp;lt;p&amp;gt;Sample text here...&amp;lt;/p&amp;gt;
&lt;/pre&gt;
</pre>
      <p><a href="http://code.google.com/p/google-code-prettify/">Download google-code-prettify</a> and view the readme for <a href="http://google-code-prettify.googlecode.com/svn/trunk/README.html">how to use</a>.</p>
    </div><!--/span-->
  </div><!--/row-->
</section>



<!-- Tables
================================================== -->
<section id="tables">
  <div class="page-header">
    <h1>Tables <small>For, you guessed it, tabular data</small></h1>
  </div>

  <h2>Table markup</h2>
  <div class="row">
    <div class="span8">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Tag</th>
            <th>Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <code>&lt;table&gt;</code>
            </td>
            <td>
              Wrapping element for displaying data in a tabular format
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;thead&gt;</code>
            </td>
            <td>
              Container element for table header rows (<code>&lt;tr&gt;</code>) to label table columns
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;tbody&gt;</code>
            </td>
            <td>
              Container element for table rows (<code>&lt;tr&gt;</code>) in the body of the table
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;tr&gt;</code>
            </td>
            <td>
              Container element for a set of table cells (<code>&lt;td&gt;</code> or <code>&lt;th&gt;</code>) that appears on a single row
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;td&gt;</code>
            </td>
            <td>
              Default table cell
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;th&gt;</code>
            </td>
            <td>
              Special table cell for column (or row, depending on scope and placement) labels<br>
              Must be used within a <code>&lt;thead&gt;</code>
            </td>
          </tr>
          <tr>
            <td>
              <code>&lt;caption&gt;</code>
            </td>
            <td>
              Description or summary of what the table holds, especially useful for screen readers
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="span4">
<pre class="prettyprint linenums">
&lt;table&gt;
  &lt;thead&gt;
    &lt;tr&gt;
      &lt;th&gt;…&lt;/th&gt;
      &lt;th&gt;…&lt;/th&gt;
    &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
    &lt;tr&gt;
      &lt;td&gt;…&lt;/td&gt;
      &lt;td&gt;…&lt;/td&gt;
    &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
</pre>
    </div>
  </div>

  <h2>Table options</h2>
  <table class="table table-bordered table-striped">
  <thead>
      <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Default</td>
        <td class="muted">None</td>
        <td>No styles, just columns and rows</td>
      </tr>
      <tr>
        <td>Basic</td>
        <td>
          <code>.table</code>
        </td>
        <td>Only horizontal lines between rows</td>
      </tr>
      <tr>
        <td>Bordered</td>
        <td>
          <code>.table-bordered</code>
        </td>
        <td>Rounds corners and adds outter border</td>
      </tr>
      <tr>
        <td>Zebra-stripe</td>
        <td>
          <code>.table-striped</code>
        </td>
        <td>Adds light gray background color to odd rows (1, 3, 5, etc)</td>
      </tr>
      <tr>
        <td>Condensed</td>
        <td>
          <code>.table-condensed</code>
        </td>
        <td>Cuts vertical padding in half, from 8px to 4px, within all <code>td</code> and <code>th</code> elements</td>
      </tr>
    </tbody>
  </table>


  <h2>Example tables</h2>

  <h3>1. Default table styles</h3>
  <div class="row">
    <div class="span4">
      <p>Tables are automatically styled with only a few borders to ensure readability and maintain structure. With 2.0, the <code>.table</code> class is required.</p>
<pre class="prettyprint linenums">
&lt;table class="table"&gt;
  …
&lt;/table&gt;</pre>
    </div>
    <div class="span8">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Language</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Javascript</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Stu</td>
            <td>Dent</td>
            <td>HTML</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <h3>2. Striped table</h3>
  <div class="row">
    <div class="span4">
      <p>Get a little fancy with your tables by adding zebra-striping&mdash;just add the <code>.table-striped</code> class.</p>
      <p class="muted"><strong>Note:</strong> Striped tables use the <code>:nth-child</code> CSS selector and is not available in IE7-IE8.</p>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-striped"&gt;
  …
&lt;/table&gt;</pre>
    </div>
    <div class="span8">
      <table class="table table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Language</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Javascript</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Stu</td>
            <td>Dent</td>
            <td>HTML</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <h3>3. Bordered table</h3>
  <div class="row">
    <div class="span4">
      <p>Add borders around the entire table and rounded corners for aesthetic purposes.</p>
<pre class="prettyprint linenums">
&lt;table class="table table-bordered"&gt;
  …
&lt;/table&gt;</pre>
    </div>
    <div class="span8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Language</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td colspan="2">Mark Otto</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td rowspan="2">Javascript</td>
          </tr>
          </tr>
            <td>3</td>
            <td>Stu</td>
            <td>Dent</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Brosef</td>
            <td>Stalin</td>
            <td>HTML</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>


  <h3>4. Condensed table</h3>
  <div class="row">
    <div class="span4">
      <p>Make your tables more compact by adding the <code>.table-condensed</code> class to cut table cell padding in half (from 8px to 4px).</p>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-condensed"&gt;
  …
&lt;/table&gt;</pre>
    </div>
    <div class="span8">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Language</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Javascript</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Stu</td>
            <td>Dent</td>
            <td>HTML</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>



  <h3>5. Combine them all!</h3>
  <div class="row">
    <div class="span4">
      <p>Feel free to combine any of the table classes to achieve different looks by utilizing any of the available classes.</p>
<pre class="prettyprint linenums" style="margin-bottom: 18px;">
&lt;table class="table table-striped table-bordered table-condensed"&gt;
  ...
&lt;/table&gt;</pre>
    </div>
    <div class="span8">
      <table class="table table-striped table-bordered table-condensed">
        <thead>
          <tr>
            <th>#</th>
            <th class="yellow">First Name</th>
            <th class="blue">Last Name</th>
            <th class="green">Language</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Mark</td>
            <td>Otto</td>
            <td>CSS</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>Javascript</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Stu</td>
            <td>Dent</td>
            <td>HTML</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Brosef</td>
            <td>Stalin</td>
            <td>HTML</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</section>



<!-- Forms
================================================== -->
<section id="forms">
  <div class="page-header">
    <h1>Forms</h1>
  </div>
  <div class="row">
    <div class="span4">
      <h2>Flexible HTML and CSS</h2>
      <p>The best part about forms in Bootstrap is that all your inputs and controls look great no matter how you build them in your markup. No superfluous HTML is required, but we provide the patterns for those who require it.</p>
      <p>More complicated layouts come with succinct and scalable classes for easy styling and event binding, so you're covered at every step.</p>
    </div>
    <div class="span4">
      <h2>Four layouts included</h2>
      <p>Bootstrap comes with support for four types of form layouts:</p>
      <ul>
        <li>Vertical (default)</li>
        <li>Search</li>
        <li>Inline</li>
        <li>Horizontal</li>
      </ul>
      <p>Different types of form layouts require some changes to markup, but the controls themselves remain and behave the same.</p>
    </div>
    <div class="span4">
      <h2>Control states and more</h2>
      <p>Bootstrap's forms include styles for all the base form controls like input, textarea, and select you'd expect. But it also comes with a number of custom components like appended and prepended inputs and support for lists of checkboxes.</p>
      <p>States like error, warning, and success are included for each type of form control. Also included are styles for disabled controls.</p>
    </div>
  </div>

  <h2>Four types of forms</h2>
  <p>Bootstrap provides simple markup and styles for four styles of common web forms.</p>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Name</th>
        <th>Class</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Vertical (default)</th>
        <td><code>.form-vertical</code> <span class="muted">(not required)</span></td>
        <td>Stacked, left-aligned labels over controls</td>
      </tr>
      <tr>
        <th>Inline</th>
        <td><code>.form-inline</code></td>
        <td>Left-aligned label and inline-block controls for compact style</td>
      </tr>
      <tr>
        <th>Search</th>
        <td><code>.form-search</code></td>
        <td>Extra-rounded text input for a typical search aesthetic</td>
      </tr>
      <tr>
        <th>Horizontal</th>
        <td><code>.form-horizontal</code></td>
        <td>Float left, right-aligned labels on same line as controls</td>
      </tr>
    </tbody>
  </table>


  <h2>Example forms <small>using just form controls, no extra markup</small></h2>
  <h3>Basic form</h3>
  <div class="row">
    <div class="span3">
      <p>With v2.0, we have lighter and smarter defaults for form styles. No extra markup, just form controls.</p>
    </div>
    <div class="span9">
      <form class="well">
        <label>Label name</label>
        <input type="text" class="span3" placeholder="Type something…"> <span class="help-inline">Associated help text!</span>
        <label class="checkbox">
          <input type="checkbox"> Check me out
        </label>
        <button type="submit" class="btn">Submit</button>
      </form>
    </div>
  </div> <!-- /row -->
  <h3>Search form</h3>
  <div class="row">
    <div class="span3">
      <p>Reflecting default WebKit styles, just add <code>.form-search</code> for extra rounded search fields.</p>
    </div>
    <div class="span9">
      <form class="well form-search">
        <input type="text" class="input-medium search-query">
        <button type="submit" class="btn">Search</button>
      </form>
    </div>
  </div> <!-- /row -->
  <h3>Inline form</h3>
  <div class="row">
    <div class="span3">
      <p>Inputs are block level to start. For <code>.form-inline</code> and <code>.form-horizontal</code>, we use inline-block.</p>
    </div>
    <div class="span9">
      <form class="well form-search">
        <input type="text" class="input-small" placeholder="Email">
        <input type="password" class="input-small" placeholder="Password">
        <button type="submit" class="btn">Go</button>
      </form>
    </div>
  </div><!-- /row -->

  <br>

  <h2>Horizontal forms</h2>
  <div class="row">
    <div class="span8">
      <form class="form-horizontal">
        <fieldset>
          <legend>Controls Bootstrap supports</legend>
          <div class="control-group">
            <label class="control-label" for="input01">Text input</label>
            <div class="controls">
              <input type="text" class="input-xlarge required" id="input01">
              <p class="help-block">In addition to freeform text, any HTML5 text-based input appears like so.</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox">Checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox" value="option1">
                Option one is this and that&mdash;be sure to include why it's great
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="select01">Select list</label>
            <div class="controls">
              <select id="select01">
                <option>something</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="multiSelect">Multicon-select</label>
            <div class="controls">
              <select multiple="multiple" id="multiSelect">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="fileInput">File input</label>
            <div class="controls">
              <input class="input-file" id="fileInput" type="file">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="textarea">Textarea</label>
            <div class="controls">
              <textarea class="input-xlarge" id="textarea" rows="3"></textarea>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="span4">
      <h3>What's included</h3>
      <p>Shown on the left are all the default form controls we support. Here's the bulleted list:</p>
      <ul>
        <li>text inputs (text, password, email, etc)</li>
        <li>checkbox</li>
        <li>radio</li>
        <li>select</li>
        <li>multiple select</li>
        <li>file input</li>
        <li>textarea</li>
      </ul>
      <hr>
      <h3>New defaults with v2.0</h3>
      <p>Up to v1.4, Bootstrap's default form styles used the horizontal layout. With Bootstrap 2, we removed that constraint to have smarter, more scalable defaults for any form.</p>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="span8">
      <form class="form-horizontal">
        <fieldset>
          <legend>Form control states</legend>
          <div class="control-group">
            <label class="control-label" for="focusedInput">Focused input</label>
            <div class="controls">
              <input class="input-xlarge focused" id="focusedInput" type="text" value="This is focused…">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Uneditable input</label>
            <div class="controls">
              <span class="input-xlarge uneditable-input">Some value here</span>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="disabledInput">Disabled input</label>
            <div class="controls">
              <input class="input-xlarge disabled" id="disabledInput" type="text" placeholder="Disabled input here…" disabled>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckbox2">Disabled checkbox</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" id="optionsCheckbox2" value="option1" disabled>
                This is a disabled checkbox
              </label>
            </div>
          </div>
          <div class="control-group warning">
            <label class="control-label" for="inputError">Input with warning</label>
            <div class="controls">
              <input type="text" id="inputError">
              <span class="help-inline">Something may have gone wrong</span>
            </div>
          </div>
          <div class="control-group error">
            <label class="control-label" for="inputError">Input with error</label>
            <div class="controls">
              <input type="text" id="inputError">
              <span class="help-inline">Please correct the error</span>
            </div>
          </div>
          <div class="control-group success">
            <label class="control-label" for="inputError">Input with success</label>
            <div class="controls">
              <input type="text" id="inputError">
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="control-group success">
            <label class="control-label" for="selectError">Select with success</label>
            <div class="controls">
              <select id="selectError">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <span class="help-inline">Woohoo!</span>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="span4">
      <h3>Redesigned browser states</h3>
      <p>Bootstrap features styles for browser-supported focused and <code>disabled</code> states. We remove the default Webkit <code>outline</code> and apply a <code>box-shadow</code> in it's place for <code>:focus</code>.</p>
      <hr>
      <h3>Form validation</h3>
      <p>It also includes validation styles for errors, warnings, and success. To use, add the error class to the surrounding <code>.control-group</code>.</p>
<pre class="prettyprint linenums">
&lt;fieldset
  class="control-group error"&gt;
  …
&lt;/fieldset&gt;
</pre>
    </div>
  </div>

  <br>

  <div class="row">
    <div class="span8">
      <form class="form-horizontal">
        <fieldset>
          <legend>Extending form controls</legend>
          <div class="control-group">
            <label class="control-label">Form sizes</label>
            <div class="controls docs-input-sizes">
              <input class="span1" type="text" placeholder=".span1">
              <input class="span2" type="text" placeholder=".span2">
              <input class="span3" type="text" placeholder=".span3">
              <select class="span1">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <select class="span2">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <select class="span3">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <p class="help-block">Use the same <code>.span*</code> classes from the grid system for input sizes.</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="prependedInput">Prepended text</label>
            <div class="controls">
              <div class="input-prepend">
                <span class="add-on">@</span>
                <input class="span2" id="prependedInput" size="16" type="text">
              </div>
              <p class="help-block">Here's some help text</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="appendedInput">Appended text</label>
            <div class="controls">
              <div class="input-append">
                <input class="span2" id="appendedInput" size="16" type="text">
                <span class="add-on">.00</span>
              </div>
              <p class="help-block">Here's more help text</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="inlineCheckboxes">Inline checkboxes</label>
            <div class="controls">
              <label class="checkbox inline">
                <input type="checkbox" id="inlineCheckbox1" value="option1"> 1
              </label>
              <label class="checkbox inline">
                <input type="checkbox" id="inlineCheckbox2" value="option2"> 2
              </label>
              <label class="checkbox inline">
                <input type="checkbox" id="inlineCheckbox3" value="option3"> 3
              </label>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="optionsCheckboxList">Checkboxes</label>
            <div class="controls">
              <label class="checkbox">
                <input type="checkbox" name="optionsCheckboxList1" value="option1">
                Option one is this and that&mdash;be sure to include why it's great
              </label>
              <label class="checkbox">
                <input type="checkbox" name="optionsCheckboxList2" value="option2">
                Option two can also be checked and included in form results
              </label>
              <label class="checkbox">
                <input type="checkbox" name="optionsCheckboxList3" value="option3">
                Option three can&mdash;yes, you guessed it&mdash;also be checked and included in form results
              </label>
              <p class="help-block"><strong>Note:</strong> Labels surround all the options for much larger click areas and a more usable form.</p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label">Radio buttons</label>
            <div class="controls">
              <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Option one is this and that&mdash;be sure to include why it's great
              </label>
              <label class="radio">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                Option two can is something else and selecting it will deselect option one
              </label>
            </div>
          </div>
          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Save changes</button>
            <button type="reset" class="btn">Cancel</button>
          </div>
        </fieldset>
      </form>
    </div>
    <div class="span4">
      <h3>Prepend &amp; append inputs</h3>
      <p>Input groups&mdash;with appended or prepended text&mdash;provide an easy way to give more context for your inputs. Great examples include the @ sign for Twitter usernames or $ for finances.</p>
      <hr>
      <h3>Checkboxes and radios</h3>
      <p>Up to v1.4, Bootstrap required extra markup around checkboxes and radios to stack them. Now, it's a simple matter of repeating the <code>&lt;label class="checkbox"&gt;</code> that wraps the <code>&lt;input type="checkbox"&gt;</code>.</p>
      <p>Inline checkboxes and radios are also supported. Just add <code>.inline</code> to any <code>.checkbox</code> or <code>.radio</code> and you're done.</p>
      <hr>
      <h4>Inline forms and append/prepend</h4>
      <p>To use prepend or append inputs in an inline form, be sure to place the <code>.add-on</code> and <code>input</code> on the same line, without spaces.</p>
      <hr>
      <h4>Form help text</h4>
      <p>To add help text for your form inputs, include inline help text with <code>&lt;span class="help-inline"&gt;</code> or a help text block with <code>&lt;p class="help-block"&gt;</code> after the input element.</p>
    </div>
  </div><!-- /row -->
</section>

<article class="row" id="basics">
    <div class="span4">
        <h3>Special Select Box:</h3>
        <p>Select2 can take a regular select box like this:</p>
        <p><select style="width:300px"><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select></p>
        <p>and turns it into:</p>
        <p>
            <select id="e1" class="select2" style="width:300px"><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select><br/>
        </p>
        <p>with support for quick option filtering via a search box</p>
    </div>
    <div class="span8">
        <h3>Example Code</h3>
<pre class="prettyprint linenums" id="code_e1">
&lt;head&gt;
    &lt;script&gt;
        $(document).ready(function() { $(&quot;.select2&quot;).select2(); });
    &lt;/script&gt;
&lt;/head&gt;
&lt;body&gt;
    &lt;select id=&quot;e1&quot;&gt;
        &lt;option value=&quot;AL&quot;&gt;Alabama&lt;/option&gt;
        ...
        &lt;option value=&quot;WY&quot;&gt;Wyoming&lt;/option&gt;
    &lt;/select&gt;
&lt;/body&gt;
</pre>
	<p>See <a href="http://ivaynberg.github.com/select2/">Here</a> for more that you can do with this box</p>
    </div>
</article>


<!-- Buttons
================================================== -->
<section id="buttons">
  <div class="page-header">
    <h1>Buttons</h1>
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Button</th>
        <th>Class</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a class="btn" href="#">Default</a></td>
        <td><code>.btn</code></td>
        <td>Standard gray button with gradient</td>
      </tr>
      <tr>
        <td><a class="btn btn-primary" href="#">Primary</a></td>
        <td><code>.btn-primary</code></td>
        <td>Provides extra visual weight and identifies the primary action in a set of buttons</td>
      </tr>
      <tr>
        <td><a class="btn btn-info" href="#">Info</a></td>
        <td><code>.btn-info</code></td>
        <td>Used as an alternate to the default styles</td>
      </tr>
      <tr>
        <td><a class="btn btn-success" href="#">Success</a></td>
        <td><code>.btn-success</code></td>
        <td>Indicates a successful or positive action</td>
      </tr>
      <tr>
        <td><a class="btn btn-warning" href="#">Warning</a></td>
        <td><code>.btn-warning</code></td>
        <td>Indicates caution should be taken with this action</td>
      </tr>
      <tr>
        <td><a class="btn btn-danger" href="#">Danger</a></td>
        <td><code>.btn-danger</code></td>
        <td>Indicates a dangerous or potentially negative action</td>
      </tr>
    </tbody>
  </table>

  <div class="row">
    <div class="span4">
      <h3>Buttons for actions</h3>
      <p>As a convention, buttons should only be used for actions while hyperlinks are to be used for objects. For instance, "Download" should be a button while "recent activity" should be a link.</p>
    </div>
    <div class="span4">
      <h3>For anchors and forms</h3>
      <p>Button styles can be applied to anything with the <code>.btn</code> applied. However, typically you'll want to apply these to only <code>&lt;a&gt;</code> and <code>&lt;button&gt;</code> elements.</p>
    </div>
    <div class="span4">
      <p><strong>Note:</strong> All buttons must include the <code>.btn</code> class. Button styles should be applied to <code>&lt;button&gt;</code> and <code>&lt;a&gt;</code> elements for consistency.</p>
    </div>
  </div>

  <div class="row">
    <div class="span4">
      <h3>Multiple sizes</h3>
      <p>Fancy larger or smaller buttons? Have at it!</p>
      <p>
        <a href="#" class="btn btn-large btn-primary">Primary action</a>
        <a href="#" class="btn btn-large">Action</a>
      </p>
      <p>
        <a href="#" class="btn btn-small btn-primary">Primary action</a>
        <a href="#" class="btn btn-small">Action</a>
      </p>
    </div>
    <div class="span4">
      <h3>Disabled state</h3>
      <p>For disabled buttons, use <code>.btn-disabled</code> for links and <code>:disabled</code> for <code>&lt;button&gt;</code> elements.</p>
      <p>
        <a href="#" class="btn btn-large btn-primary disabled">Primary action</a>
        <a href="#" class="btn btn-large disabled">Action</a>
      </p>
      <p>
        <button class="btn btn-large btn-primary disabled" disabled="disabled">Primary action</button>
        <button class="btn btn-large" disabled>Action</button>
      </p>
    </div>
    <div class="span4">
      <h3>Cross browser compatibility</h3>
      <p>In IE9, we drop the gradient on all buttons in favor of rounded corners as IE9 doesn't crop background gradients to the corners.</p>
      <p>Related, IE9 jankifies disabled <code>button</code> elements, rendering text gray with a nasty text-shadow&mdash;unfortunately we can't fix this.</p>
    </div>
  </div>

  <br>

</section>



<!-- Icons
================================================== -->
<section id="icons">
  <div class="page-header">
    <h1>Icons <small>Graciously provided by <a href="http://glyphicons.com" target="_blank">Glyphicons</a></small></h1>
  </div>
  <div class="row">
    <div class="span3">
      <div class="the-icons">
        <i class="icon-glass"></i>
        <i class="icon-music"></i>
        <i class="icon-search"></i>
        <i class="icon-envelope"></i>
        <i class="icon-heart"></i>
        <i class="icon-star"></i>
        <i class="icon-star-empty"></i>
        <i class="icon-user"></i>
        <i class="icon-film"></i>
        <i class="icon-th-large"></i>
        <i class="icon-th"></i>
        <i class="icon-th-list"></i>
        <i class="icon-ok"></i>
        <i class="icon-remove"></i>
        <i class="icon-zoom-in"></i>
        <i class="icon-zoom-out"></i>
        <i class="icon-off"></i>
        <i class="icon-signal"></i>
        <i class="icon-cog"></i>
        <i class="icon-trash"></i>

        <i class="icon-home"></i>
        <i class="icon-file"></i>
        <i class="icon-time"></i>
        <i class="icon-road"></i>
        <i class="icon-download-alt"></i>
        <i class="icon-download"></i>
        <i class="icon-upload"></i>
        <i class="icon-inbox"></i>
        <i class="icon-play-circle"></i>
        <i class="icon-repeat"></i>
      </div>
    </div>
    <div class="span3">
      <div class="the-icons">
        <i class="icon-refresh"></i>
        <i class="icon-list-alt"></i>
        <i class="icon-lock"></i>
        <i class="icon-flag"></i>
        <i class="icon-headphones"></i>
        <i class="icon-volume-off"></i>
        <i class="icon-volume-down"></i>
        <i class="icon-volume-up"></i>
        <i class="icon-qrcode"></i>
        <i class="icon-barcode"></i>

        <i class="icon-tag"></i>
        <i class="icon-tags"></i>
        <i class="icon-book"></i>
        <i class="icon-bookmark"></i>
        <i class="icon-print"></i>
        <i class="icon-camera"></i>
        <i class="icon-font"></i>
        <i class="icon-bold"></i>
        <i class="icon-italic"></i>
        <i class="icon-text-height"></i>
        <i class="icon-text-width"></i>
        <i class="icon-align-left"></i>
        <i class="icon-align-center"></i>
        <i class="icon-align-right"></i>
        <i class="icon-align-justify"></i>
        <i class="icon-list"></i>
        <i class="icon-indent-left"></i>
        <i class="icon-indent-right"></i>
        <i class="icon-facetime-video"></i>
        <i class="icon-picture"></i>
      </div>
    </div>
    <div class="span3">
      <div class="the-icons">
        <i class="icon-pencil"></i>
        <i class="icon-map-marker"></i>
        <i class="icon-adjust"></i>
        <i class="icon-tint"></i>
        <i class="icon-edit"></i>
        <i class="icon-share"></i>
        <i class="icon-check"></i>
        <i class="icon-move"></i>
        <i class="icon-step-backward"></i>
        <i class="icon-fast-backward"></i>
        <i class="icon-backward"></i>
        <i class="icon-play"></i>
        <i class="icon-pause"></i>
        <i class="icon-stop"></i>
        <i class="icon-forward"></i>
        <i class="icon-fast-forward"></i>
        <i class="icon-step-forward"></i>
        <i class="icon-eject"></i>
        <i class="icon-chevron-left"></i>
        <i class="icon-chevron-right"></i>

        <i class="icon-plus-sign"></i>
        <i class="icon-minus-sign"></i>
        <i class="icon-remove-sign"></i>
        <i class="icon-ok-sign"></i>
        <i class="icon-question-sign"></i>
        <i class="icon-info-sign"></i>
        <i class="icon-screenshot"></i>
        <i class="icon-remove-circle"></i>
        <i class="icon-ok-circle"></i>
        <i class="icon-ban-circle"></i>
      </div>
    </div>
    <div class="span3">
      <div class="the-icons">
        <i class="icon-arrow-left"></i>
        <i class="icon-arrow-right"></i>
        <i class="icon-arrow-up"></i>
        <i class="icon-arrow-down"></i>
        <i class="icon-share-alt"></i>
        <i class="icon-resize-full"></i>
        <i class="icon-resize-small"></i>
        <i class="icon-plus"></i>
        <i class="icon-minus"></i>
        <i class="icon-asterisk"></i>

        <i class="icon-exclamation-sign"></i>
        <i class="icon-gift"></i>
        <i class="icon-leaf"></i>
        <i class="icon-fire"></i>
        <i class="icon-eye-open"></i>
        <i class="icon-eye-close"></i>
        <i class="icon-warning-sign"></i>
        <i class="icon-plane"></i>
        <i class="icon-calendar"></i>
        <i class="icon-random"></i>
        <i class="icon-comment"></i>
        <i class="icon-magnet"></i>
        <i class="icon-chevron-up"></i>
        <i class="icon-chevron-down"></i>
        <i class="icon-retweet"></i>
        <i class="icon-shopping-cart"></i>
        <i class="icon-folder-close"></i>
        <i class="icon-folder-open"></i>
        <i class="icon-resize-vertical"></i>
        <i class="icon-resize-horizontal"></i>
      </div>
    </div>
  </div>
  <div class="alert alert-info">
    <strong>Heads up!</strong> Icon classes are echoed via CSS <code>:after</code>. In the docs, we show a light red background color on hover to hightlight the icon's size.
  </div>

  <br>

  <div class="row">
    <div class="span4">
      <h3>Built as a sprite</h3>
      <p>Instead of making every icon an extra request, we've compiled them into a sprite&mdash;a bunch of images in one file that uses CSS to position the images with <code>background-position</code>. This is the same method we use on Twitter.com and it has worked well for us.</p>
      <p>All icons classes are prefixed with <code>.icon-</code> for proper namespacing and scoping, much like our other components. This will help avoid conflicts with other tools.</p>
      <p><a href="http://glyphicons.com" target="_blank">Glyphicons</a> has granted us use of the Halflings set in our open-source toolkit so long as we provide a link and credit here in the docs. Please consider doing the same in your projects.</p>
    </div>
    <div class="span4">
      <h3>How to use</h3>
      <p>With v2.0.0, we have opted to use an <code>&lt;i&gt;</code> tag for all our icons, but they have no case class&mdash;only a shared prefix. To use, place the following code just about anywhere:</p>
<pre class="prettyprint linenums">
&lt;i class="icon-search"&gt;&lt;/i&gt;
</pre>
      <p>There are also styles available for inverted (white) icons, made ready with one extra class:</p>
<pre class="prettyprint linenums">
&lt;i class="icon-search icon-white"&gt;&lt;/i&gt;
</pre>
      <p>There are 120 classes to choose from for your icons. Just add an <code>&lt;i&gt;</code> tag with the right classes and you're set. You can find the full list in <strong>sprites.less</strong> or right here in this document.</p>
    </div>
    <div class="span4">
      <h3>Use cases</h3>
      <p>Icons are great, but where would one use them? Here are a few ideas:</p>
      <ul>
        <li>As visuals for your sidebar navigation</li>
        <li>For a purely icon-driven navigation</li>
        <li>For buttons to help convey the meaning of an action</li>
        <li>With links to share context on a user's destination</li>
      </ul>
      <p>Essentially, anywhere you can put an <code>&lt;i&gt;</code> tag, you can put an icon.</p>
    </div>
  </div>

  <h3>Examples</h3>
  <p>Use them in buttons, button groups for a toolbar, navigation, or prepended form inputs.</p>
  <div class="row">
    <div class="span4">
      <div class="btn-toolbar" style="margin-bottom: 9px">
        <div class="btn-group">
          <a class="btn" href="#"><i class="icon-align-left"></i></a>
          <a class="btn" href="#"><i class="icon-align-center"></i></a>
          <a class="btn" href="#"><i class="icon-align-right"></i></a>
          <a class="btn" href="#"><i class="icon-align-justify"></i></a>
        </div>
        <div class="btn-group">
          <a class="btn btn-primary" href="#"><i class="icon white user"></i> User</a>
          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#"><i class="icon-pencil"></i> Edit</a></li>
            <li><a href="#"><i class="icon-trash"></i> Delete</a></li>
            <li><a href="#"><i class="icon-ban-circle"></i> Ban</a></li>
            <li class="divider"></li>
            <li><a href="#"><i class="i"></i> Make admin</a></li>
          </ul>
        </div>
      </div>
      <p>
        <a class="btn" href="#"><i class="icon-refresh"></i> Refresh</a>
        <a class="btn btn-success" href="#"><i class="icon-shopping-cart icon-white"></i> Checkout</a>
        <a class="btn btn-danger" href="#"><i class="icon-trash icon-white"></i> Delete</a>
      </p>
      <p>
        <a class="btn btn-large" href="#"><i class="icon-comment"></i> Comment</a>
        <a class="btn btn-small" href="#"><i class="icon-cog"></i> Settings</a>
        <a class="btn btn-small btn-info" href="#"><i class="icon-info-sign icon-white"></i> More Info</a>
      </p>
    </div>
    <div class="span4">
      <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="active"><a href="#"><i class="icon-home icon-white"></i> Home</a></li>
          <li><a href="#"><i class="icon-book"></i> Library</a></li>
          <li><a href="#"><i class="icon-pencil"></i> Applications</a></li>
          <li><a href="#"><i class="i"></i> Misc</a></li>
        </ul>
      </div> <!-- /well -->
    </div>
    <div class="span4">
      <form>
        <div class="control-group">
          <label class="control-label" for="prependedInput">Email address</label>
          <div class="controls">
            <div class="input-prepend">
              <span class="add-on"><i class="icon-envelope"></i></span>
              <input class="span2" id="iconInput" type="text">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>


<!-- Masthead
================================================== -->
<header class="jumbotron subhead" id="overview">
  <h1>Components</h1>
  <p class="lead">Dozens of reusable components are built into Bootstrap to provide navigation, alerts, popovers, and much more.</p>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Buttons <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#buttonGroups">Button groups</a></li>
          <li><a href="#buttonDropdowns">Button dropdowns</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Navigation <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#navs">Nav, tabs, pills</a></li>
          <li><a href="#navbar">Navbar</a></li>
          <li><a href="#breadcrumbs">Breadcrumbs</a></li>
          <li><a href="#pagination">Pagination</a></li>
        </ul>
      </li>
      <li><a href="#labels">Labels</a></li>
      <li><a href="#thumbnails">Thumbnails</a></li>
      <li><a href="#alerts">Alerts</a></li>
      <li><a href="#progress">Progress bars</a></li>
      <li><a href="#misc">Miscellaneous</a></li>
    </ul>
  </div>
</header>



<!-- Button Groups
================================================== -->
<section id="buttonGroups">
  <div class="page-header">
    <h1>Button groups <small>Join buttons for more toolbar-like functionality</small></h1>
  </div>
  <div class="row">
    <div class="span4">
      <h3>Button groups</h3>
      <p>Use button groups to join multiple buttons together as one composite component. Build them with a series of <code>&lt;a&gt;</code> or <code>&lt;button&gt;</code> elements.</p>
      <p>You can also combine sets of <code>&lt;div class="btn-group"&gt;</code> into a <code>&lt;div class="btn-toolbar"&gt;</code> for more complex projects.</p>
      <div class="btn-toolbar" style="margin-top: 18px;">
        <div class="btn-group">
          <a class="btn" href="#">Left</a>
          <a class="btn" href="#">Middle</a>
          <a class="btn" href="#">Right</a>
        </div>
      </div>
      <div class="btn-toolbar">
        <div class="btn-group">
          <a class="btn" href="#">1</a>
          <a class="btn" href="#">2</a>
          <a class="btn" href="#">3</a>
          <a class="btn" href="#">4</a>
        </div>
        <div class="btn-group">
          <a class="btn" href="#">5</a>
          <a class="btn" href="#">6</a>
          <a class="btn" href="#">7</a>
        </div>
        <div class="btn-group">
          <a class="btn" href="#">8</a>
        </div>
      </div>
    </div>
    <div class="span4">
      <h3>Example markup</h3>
      <p>Here's how the HTML looks for a standard button group built with anchor tag buttons:</p>
<pre class="prettyprint linenums">
&lt;div class="btn-group"&gt;
  &lt;a class="btn" href="#"&gt;1&lt;/a&gt;
  &lt;a class="btn" href="#"&gt;2&lt;/a&gt;
  &lt;a class="btn" href="#"&gt;3&lt;/a&gt;
&lt;/div&gt;
</pre>
      <p>And with a toolbar for multiple groups:</p>
<pre class="prettyprint linenums">
&lt;div class="btn-toolbar"&gt;
  &lt;div class="btn-group"&gt;
    ...
  &lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Checkbox and radio flavors</h3>
      <p>Button groups can also function as radios, where only one button may be active, or checkboxes, where any number of buttons may be active. View <a href="./javascript.html#buttons">the Javascript docs</a> for that.</p>
      <p><a class="btn js-btn" href="./javascript.html#buttons">Get the javascript &raquo;</a></p>
      <hr>
      <h4 class="muted">Heads up</h4>
      <p class="muted">CSS for button groups is in a separate file, button-groups.less.</p>
    </div>
  </div>
</section>



<!-- Split button dropdowns
================================================== -->
<section id="buttonDropdowns">
  <div class="page-header">
    <h1>Buttons dropdowns <small>Contextual dropdown menus built on button groups</small></h1>
  </div>

  <div class="row">
    <div class="span4">
      <h3>Button dropdowns</h3>
      <p>Use any button to trigger a dropdown menu by placing it within a <code>.btn-group</code> and providing the proper menu markup.</p>
      <div class="btn-toolbar" style="margin-top: 18px;">
        <div class="btn-group">
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">Action <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#">Danger <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div>
      <div class="btn-toolbar">
        <div class="btn-group">
          <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#">Success <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#">Info <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div>
    </div>
    <div class="span8">
      <h3>Example markup</h3>
      <p>Similar to a button group, our markup uses regular button markup, but with a handful of additions to refine the style and support Bootstrap's dropdown jQuery plugin.</p>
<pre class="prettyprint linenums">
&lt;div class="btn-group"&gt;
  &lt;a class="btn dropdown-toggle" data-toggle="dropdown" href="#"&gt;
    Action
    &lt;span class="caret"&gt;&lt;/span&gt;
  &lt;/a&gt;
  &lt;ul class="dropdown-menu"&gt;
    &lt;!-- dropdown menu links --&gt;
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
    </div>
  </div>

  <div class="row">
    <div class="span4">
      <h3>Split button dropdowns</h3>
      <p>Building on the button group styles and markup, we can easily create a split button. Split buttons feature a standard action on the left and a dropdown toggle on the right with contextual links.</p>
      <div class="btn-toolbar" style="margin-top: 18px;">
        <div class="btn-group">
          <a class="btn" href="#">Action</a>
          <a class="btn dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-primary" href="#">Action</a>
          <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-danger" href="#">Danger</a>
          <a class="btn btn-danger dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div>
      <div class="btn-toolbar">
        <div class="btn-group">
          <a class="btn btn-success" href="#">Success</a>
          <a class="btn btn-success dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
        <div class="btn-group">
          <a class="btn btn-info" href="#">Info</a>
          <a class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </div><!-- /btn-group -->
      </div>
    </div>
    <div class="span8">
      <h3>Example markup</h3>
      <p>We expand on the normal button dropdowns to provide a second button action that operates as a separate dropdown trigger.</p>
<pre class="prettyprint linenums">
&lt;div class="btn-group"&gt;
  &lt;a class="btn" href="#"&gt;Action&lt;/a&gt;
  &lt;a class="btn dropdown-toggle" data-toggle="dropdown" href="#"&gt;
    &lt;span class="caret"&gt;&lt;/span&gt;
  &lt;/a&gt;
  &lt;ul class="dropdown-menu"&gt;
    &lt;!-- dropdown menu links --&gt;
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
    </div>
  </div>
</section>



<!-- Nav, Tabs, & Pills
================================================== -->
<section id="navs">
  <div class="page-header">
    <h1>Nav, tabs, and pills <small>Highly customizable list-style navigation</small></h1>
  </div>

  <h2>Lightweight defaults <small>Same markup, different classes</small></h2>
  <div class="row">
    <div class="span4">
      <h3>Powerful base class</h3>
      <p>All nav components here&mdash;tabs, pills, and lists&mdash;<strong>share the same base markup and styles</strong> through the <code>.nav</code> class.</p>
      <h3>Why tabs and pills</h3>
      <p>Tabs and pills in Bootstrap are built on a <code>&lt;ul&gt;</code> with the same core HTML, a list of links. Swap between tabs or pills with only a class.</p>
      <p>Both options are great for sub-sections of content or navigating between pages of related content.</p>
    </div>
    <div class="span4">
      <h3>Basic tabs</h3>
      <p>Take a regular <code>&lt;ul&gt;</code> of links and add <code>.nav-tabs</code>:</p>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs"&gt;
  &lt;li class="active"&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
  &lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;...&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;...&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Basic pills</h3>
      <p>Take that same HTML, but use <code>.nav-pills</code> instead:</p>
      <ul class="nav nav-pills">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-pills"&gt;
  &lt;li class="active"&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
  &lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;...&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;...&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
  </div>

  <h2>Stackable <small>Make tabs or pills vertical</small></h2>
  <div class="row">
    <div class="span4">
      <h3>How to stack 'em</h3>
      <p>As tabs and pills are horizontal by default, just add a second class, <code>.nav-stacked</code>, to make them appear vertically stacked.</p>
    </div>
    <div class="span4">
      <h3>Stacked tabs</h3>
      <ul class="nav nav-tabs nav-stacked">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs nav-stacked"&gt;
  ...
&lt;/ul&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Stacked pills</h3>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-pills nav-stacked"&gt;
  ...
&lt;/ul&gt;
</pre>
    </div>
  </div>

  <h2>Dropdowns <small>For advanced nav components</small></h2>
  <div class="row">
    <div class="span4">
      <h3>Rich menus made easy</h3>
      <p>Dropdown menus in Bootstrap tabs and pills are super easy and require only a little extra HTML and a lightweight jQuery plugin.</p>
      <p>Head over to the Javascript page to read the docs on <a href="./javascript.html#tabs">initializing dropdowns</a> in Bootstrap.</p>
    </div>
    <div class="span4">
      <h3>Tabs with dropdowns</h3>
      <ul class="nav nav-tabs">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-tabs"&gt;
  &lt;li class="dropdown"&gt;
    &lt;a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#"&gt;
        Dropdown
        &lt;b class="caret"&gt;&lt;/b&gt;
      &lt;/a&gt;
    &lt;ul class="dropdown-menu"&gt;
      &lt;!-- links --&gt;
    &lt;/ul&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Pills with dropdowns</h3>
      <ul class="nav nav-pills">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="nav nav-pills"&gt;
  &lt;li class="dropdown"&gt;
    &lt;a class="dropdown-toggle"
       data-toggle="dropdown"
       href="#"&gt;
        Dropdown
        &lt;b class="caret"&gt;&lt;/b&gt;
      &lt;/a&gt;
    &lt;ul class="dropdown-menu"&gt;
      &lt;!-- links --&gt;
    &lt;/ul&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
  </div>

  <h2>Nav lists <small>Build simple stacked navs, great for sidebars</small></h2>
  <div class="row">
    <div class="span4">
      <h3>Application-style navigation</h3>
      <p>Nav lists provide a simple and easy way to build groups of nav links with optional headers. They're best used in sidebars like the Finder in OS X.</p>
      <p>Structurally, they're built on the same core nav styles as tabs and pills, so usage and customization are straightforward.</p>
      <h4>With icons</h4>
      <p>Nav lists are also easy to equip with icons. Add the proper <code>&lt;i&gt;</code> tag with class and you're set.</p>
    </div>
    <div class="span4">
      <h3>Example nav list</h3>
      <p>Take a list of links and add <code>class="nav nav-list"</code>:</p>
      <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="nav-header">List header</li>
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Library</a></li>
          <li><a href="#">Applications</a></li>
          <li class="nav-header">Another list header</li>
          <li><a href="#">Profile</a></li>
          <li><a href="#">Settings</a></li>
          <li><a href="#">Help</a></li>
        </ul>
      </div> <!-- /well -->
<pre class="prettyprint linenums">
&lt;ul class="nav nav-list"&gt;
  &lt;li class="nav-header"&gt;
    List header
  &lt;/li&gt;
  &lt;li class="active"&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt;
  &lt;/li&gt;
  &lt;li&gt;
    &lt;a href="#"&gt;Library&lt;/a&gt;
  &lt;/li&gt;
  ...
&lt;/ul&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Example with icons</h3>
      <p>Same example, but with <code>&lt;i&gt;</code> tags for icons.</p>
      <div class="well" style="padding: 8px 0;">
        <ul class="nav nav-list">
          <li class="nav-header">List header</li>
          <li class="active"><a href="#"><i class="icon-white icon-home"></i> Home</a></li>
          <li><a href="#"><i class="icon-book"></i> Library</a></li>
          <li><a href="#"><i class="icon-pencil"></i> Applications</a></li>
          <li class="nav-header">Another list header</li>
          <li><a href="#"><i class="icon-user"></i> Profile</a></li>
          <li><a href="#"><i class="icon-cog"></i> Settings</a></li>
          <li><a href="#"><i class="icon-flag"></i> Help</a></li>
        </ul>
      </div> <!-- /well -->
<pre class="prettyprint linenums">
&lt;ul class="nav nav-list"&gt;
  ...
  &lt;li&gt;
    &lt;a href="#"&gt;
      &lt;i class="icon-book"&gt;&lt;/i&gt;
      Library
    &lt;/a&gt;
  &lt;/li&gt;
  ...
&lt;/ul&gt;
</pre>
    </div>
  </div>


  <h2>Tabbable nav <small>Bring tabs to life via javascript</small></h2>
  <div class="row">
    <div class="span4">
      <h3>What's included</h3>
      <p>Bring your tabs to life with a simple plugin to toggle between content via tabs. Bootstrap integrates tabbable tabs in four styles: top (default), right, bottom, and left.</p>
      <p>Changing between them is easy and only requires changing very little markup.</p>
    </div>
    <div class="span4">
      <h3>Tabbable example</h3>
      <p>To make tabs tabbable, wrap the <code>.nav-tabs</code> in another div with class <code>.tabbable</code>.</p>
      <div class="tabbable" style="margin-bottom: 9px;">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#1" data-toggle="tab">Section 1</a></li>
          <li><a href="#2" data-toggle="tab">Section 2</a></li>
          <li><a href="#3" data-toggle="tab">Section 3</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="1">
            <p>I'm in Section 1.</p>
          </div>
          <div class="tab-pane" id="2">
            <p>Howdy, I'm in Section 2.</p>
          </div>
          <div class="tab-pane" id="3">
            <p>What up girl, this is Section 3.</p>
          </div>
        </div>
      </div> <!-- /tabbable -->
    </div>
    <div class="span4">
      <h3>Custom jQuery plugin</h3>
      <p>All tabbable tabs are powered by our lightweight jQuery plugin. Read more about how to bring tabbable tabs to life on the javascript docs page.</p>
      <p><a class="btn" href="./javascript.html#tabs">Get the javascript &rarr;</a></p>
    </div>
  </div>

  <h3>Straightforward markup</h3>
  <p>Using tabbable tabs requires a wrapping div, a set of tabs, and a set of tabbable panes of content.</p>
<pre class="prettyprint linenums">
&lt;div class="tabbable"&gt;
  &lt;ul class="nav nav-tabs"&gt;
    &lt;li class="active"&gt;&lt;a href="#1" data-toggle="tab"&gt;Section 1&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#2" data-toggle="tab"&gt;Section 2&lt;/a&gt;&lt;/li&gt;
  &lt;/ul&gt;
  &lt;div class="tab-content"&gt;
    &lt;div class="tab-pane active" id="1"&gt;
      &lt;p&gt;I'm in Section 1.&lt;/p&gt;
    &lt;/div&gt;
    &lt;div class="tab-pane" id="2"&gt;
      &lt;p&gt;Howdy, I'm in Section 2.&lt;/p&gt;
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>

  <h3>Tabbable in any direction</h3>
  <div class="row">
    <div class="span4">
      <h4>Tabs on the bottom</h4>
      <p>Flip the order of the HTML and add a class to put tabs on the bottom.</p>
      <div class="tabbable tabs-below">
        <div class="tab-content">
          <div class="tab-pane active" id="A">
            <p>I'm in Section A.</p>
          </div>
          <div class="tab-pane" id="B">
            <p>Howdy, I'm in Section B.</p>
          </div>
          <div class="tab-pane" id="C">
            <p>What up girl, this is Section C.</p>
          </div>
        </div>
        <ul class="nav nav-tabs">
          <li class="active"><a href="#A" data-toggle="tab">Section 1</a></li>
          <li><a href="#B" data-toggle="tab">Section 2</a></li>
          <li><a href="#C" data-toggle="tab">Section 3</a></li>
        </ul>
      </div> <!-- /tabbable -->
<pre class="prettyprint linenums" style="margin-top: 11px;">
&lt;div class="tabbable tabs-below"&gt;
  &lt;div class="tab-content"&gt;
    ...
  &lt;/div&gt;
  &lt;ul class="nav nav-tabs"&gt;
    ...
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h4>Tabs on the left</h4>
      <p>Swap the class to put tabs on the left.</p>
      <div class="tabbable tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#lA" data-toggle="tab">Section 1</a></li>
          <li><a href="#lB" data-toggle="tab">Section 2</a></li>
          <li><a href="#lC" data-toggle="tab">Section 3</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="lA">
            <p>I'm in Section A.</p>
          </div>
          <div class="tab-pane" id="lB">
            <p>Howdy, I'm in Section B.</p>
          </div>
          <div class="tab-pane" id="lC">
            <p>What up girl, this is Section C.</p>
          </div>
        </div>
      </div> <!-- /tabbable -->
<pre class="prettyprint linenums">
&lt;div class="tabbable tabs-left"&gt;
  &lt;ul class="nav nav-tabs"&gt;
    ...
  &lt;/ul&gt;
  &lt;div class="tab-content"&gt;
    ...
  &lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h4>Tabs on the right</h4>
      <p>Swap the class to put tabs on the right.</p>
      <div class="tabbable tabs-right">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#rA" data-toggle="tab">Section 1</a></li>
          <li><a href="#rB" data-toggle="tab">Section 2</a></li>
          <li><a href="#rC" data-toggle="tab">Section 3</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="rA">
            <p>I'm in Section A.</p>
          </div>
          <div class="tab-pane" id="rB">
            <p>Howdy, I'm in Section B.</p>
          </div>
          <div class="tab-pane" id="rC">
            <p>What up girl, this is Section C.</p>
          </div>
        </div>
      </div> <!-- /tabbable -->
<pre class="prettyprint linenums">
&lt;div class="tabbable tabs-right"&gt;
  &lt;ul class="nav nav-tabs"&gt;
    ...
  &lt;/ul&gt;
  &lt;div class="tab-content"&gt;
    ...
  &lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
  </div>

</section>



<!-- Navbar
================================================== -->
<section id="navbar">
  <div class="page-header">
    <h1>Navbar</h1>
  </div>
  <h2>Static navbar example</h2>
  <p>An example of a static (not fixed to the top) navbar with project name, navigation, and search form.</p>
  <div class="navbar">
    <div class="navbar-inner">
      <div class="container" style="width: auto;">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Project name</a>
        <div class="nav-collapse">
          <ul class="nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li><a href="#">Link</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
          <form class="navbar-search pull-left" action="">
            <input type="text" class="search-query span2" placeholder="Search">
          </form>
          <ul class="nav pull-right">
            <li><a href="#">Link</a></li>
            <li class="divider-vertical"></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->

  <div class="row">
    <div class="span8">
      <h3>Navbar scaffolding</h3>
      <p>The navbar requires only a few divs to structure it well for static or fixed display.</p>
<pre class="prettyprint linenums">
&lt;div class="navbar"&gt;
  &lt;div class="navbar-inner"&gt;
    &lt;div class="container"&gt;
      ...
    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>
      <p>To make the navbar fixed to the top of the viewport, add <code>.navbar-fixed-top</code> to the outermost div, <code>.navbar</code>. In your CSS, you will also need to account for the overlap it causes by adding <code>padding-top: 40px;</code> to your <code>&lt;body&gt;</code>.</p>
<pre class="prettyprint linenums">
&lt;div class="navbar navbar-fixed-top"&gt;
  ...
&lt;/div&gt;
</pre>
      <h3>Brand name</h3>
      <p>A simple link to show your brand or project name only requires an anchor tag.</p>
<pre class="prettyprint linenums">
&lt;a class="brand" href="#"&gt;
  Project name
&lt;/a&gt;
</pre>
      <h3>Search form</h3>
      <p>Search forms receive custom styles in the navbar with the <code>.navbar-search</code> class. Include <code>.pull-left</code> or <code>.pull-right</code> on the <code>form</code> to align it.</p>
<pre class="prettyprint linenums">
&lt;form class="navbar-search pull-left"&gt;
  &lt;input type="text" class="search-query" placeholder="Search"&gt;
&lt;/form&gt;
</pre>
      <h3>Optional responsive variation</h3>
      <p>Depending on the amount of content in your topbar, you might want to implement the responsive options. To do so, wrap your nav content in a containing div, <code>.nav-collapse.collapse</code>, and add the navbar toggle button, <code>.btn-navbar</code>.</p>
<pre class="prettyprint linenums">
&lt;div class="navbar"&gt;
  &lt;div class="navbar-inner"&gt;
    &lt;div class="container"&gt;
      
      &lt;!-- .btn-navbar is used as the toggle for collapsed navbar content --&gt;
      &lt;a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
        &lt;span class="icon-bar"&gt;&lt;/span&gt;
      &lt;/a&gt;
      
      &lt;!-- Be sure to leave the brand out there if you want it shown --&gt;
      &lt;a class="brand" href="#"&gt;Project name&lt;/a&gt;

      &lt;!-- Everything you want hidden at 940px or less, place within here --&gt;
      &lt;div class="nav-collapse"&gt;
        &lt;!-- .nav, .navbar-search, .navbar-form, etc --&gt;
      &lt;/div&gt;

    &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
</pre>
      <div class="alert alert-info">
        <strong>Heads up!</strong> The responsive navbar requires the <a href="./javascript.html#collapse">collapse plugin</a>.
      </div>

    </div><!-- /.span -->
    <div class="span4">
      <h3>Nav links</h3>
      <p>Nav items are simple to add via unordered lists.</p>
<pre class="prettyprint linenums">
&lt;ul class="nav"&gt;
  &lt;li class="active"&gt;
    &lt;a href="#">Home&lt;/a&gt;
  &lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;Link&lt;/a&gt;&lt;/li&gt;
  &lt;li&gt;&lt;a href="#"&gt;Link&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
</pre>
      <h3>Adding dropdowns</h3>
      <p>Adding dropdowns to the nav is super simple, but does require the use of <a href="./javascript.html#dropdown">our javascript plugin</a>.</p>
<pre class="prettyprint linenums">
&lt;ul class="nav"&gt;
  &lt;li class="dropdown"&gt;
    &lt;a href="#"
          class="dropdown-toggle"
          data-toggle="dropdown">
          Account
          &lt;b class="caret"&gt;&lt;/b&gt;
    &lt;/a&gt;
    &lt;ul class="dropdown-menu"&gt;
      ...
    &lt;/ul&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
      <p><a class="btn" href="./javascript.html#dropdown">Get the javascript &rarr;</a></p>
    </div><!-- /.span -->
  </div><!-- /.row -->

</section>



<!-- Breadcrumbs
================================================== -->
<section id="breadcrumbs">
  <div class="page-header">
    <h1>Breadcrumbs <small></small></h1>
  </div>

  <div class="row">
    <div class="span6">
      <h3>Why use them</h3>
      <p>Breadcrumb navigation is used as a way to show users where they are within an app or a site, but not for primary navigation. Keep their use sparse and succinct to be most effective.</p>

      <h3>Examples</h3>
      <p>A single example shown as it might be displayed across multiple pages.</p>
      <ul class="breadcrumb">
        <li class="active">Home</li>
      </ul>
      <ul class="breadcrumb">
        <li><a href="#">Home</a> <span class="divider">/</span></li>
        <li class="active">Library</li>
      </ul>
      <ul class="breadcrumb">
        <li><a href="#">Home</a> <span class="divider">/</span></li>
        <li><a href="#">Library</a> <span class="divider">/</span></li>
        <li class="active">Data</li>
      </ul>
    </div>
    <div class="span6">
      <h3>Markup</h3>
      <p>HTML is your standard unordered list with links.</p>
<pre class="prettyprint linenums">
&lt;ul class="breadcrumb"&gt;
  &lt;li&gt;
    &lt;a href="#"&gt;Home&lt;/a&gt; &lt;span class="divider"&gt;/&lt;/span&gt;
  &lt;/li&gt;
  &lt;li&gt;
    &lt;a href="#"&gt;Library&lt;/a&gt; &lt;span class="divider"&gt;/&lt;/span&gt;
  &lt;/li&gt;
  &lt;li class="active"&gt;
    &lt;a href="#"&gt;Data&lt;/a&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
  </div>

</section>



<!-- Pagination
================================================== -->
<section id="pagination">
  <div class="page-header">
    <h1>Pagination <small>Two options for paging through content</small></h1>
  </div>

  <h2>Multicon-page pagination</h2>
  <div class="row">
    <div class="span4">
      <h3>When to use</h3>
      <p>Ultra simplistic and minimally styled pagination inspired by Rdio, great for apps and search results. The large block is hard to miss, easily scalable, and provides large click areas.</p>
      <h3>Stateful page links</h3>
      <p>Links are customizable and work in a number of circumstances with the right class. <code>.disabled</code> for unclickable links and <code>.active</code> for current page.</p>
      <h3>Flexible alignment</h3>
      <p>Add either of two optional classes to change the alignment of pagination links: <code>.pagination-centered</code> and <code>.pagination-right</code>.</p>
    </div>
    <div class="span4">
      <h3>Examples</h3>
      <p>The default pagination component is flexible and works in a number of variations.</p>
      <div class="pagination">
        <ul>
          <li class="disabled"><a href="#">&laquo;</a></li>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
      <div class="pagination">
        <ul>
          <li><a href="#">&laquo;</a></li>
          <li><a href="#">10</a></li>
          <li class="active"><a href="#">11</a></li>
          <li><a href="#">12</a></li>
          <li><a href="#">&raquo;</a></li>
        </ul>
      </div>
      <div class="pagination">
        <ul>
          <li><a href="#">&larr;</a></li>
          <li class="active"><a href="#">10</a></li>
          <li class="disabled"><a href="#">...</a></li>
          <li><a href="#">20</a></li>
          <li><a href="#">&rarr;</a></li>
        </ul>
      </div>
      <div class="pagination pagination-centered">
        <ul>
          <li class="active"><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
        </ul>
      </div>
    </div>
    <div class="span4">
      <h3>Markup</h3>
      <p>Wrapped in a <code>&lt;div&gt;</code>, pagination is just a <code>&lt;ul&gt;</code>.</p>
<pre class="prettyprint linenums">
&lt;div class="pagination"&gt;
  &lt;ul&gt;
    &lt;li&gt;&lt;a href="#"&gt;Prev&lt;/a&gt;&lt;/li>
    &lt;li class="active"&gt;
      &lt;a href="#"&gt;1&lt;/a&gt;
    &lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;2&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;3&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;4&lt;/a&gt;&lt;/li&gt;
    &lt;li&gt;&lt;a href="#"&gt;Next&lt;/a&gt;&lt;/li>
  &lt;/ul&gt;
&lt;/div&gt;
</pre>
    </div>
  </div><!-- /row -->

  <h2>Pager <small>For quick previous and next links</small></h2>
  <div class="row">
    <div class="span4">
      <h3>About pager</h3>
      <p>The pager component is a set of links for simple pagination implemenations with light markup and even lighter styles. It's great for simple sites like blogs or magazines.</p>
    </div>
    <div class="span4">
      <h3>Default example</h3>
      <p>By default, the pager centers links.</p>
      <ul class="pager">
        <li><a href="#">Previous</a></li>
        <li><a href="#">Next</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="pager"&gt;
  &lt;li&gt;
    &lt;a href="#"&gt;Previous&lt;/a&gt;
  &lt;/li&gt;
  &lt;li&gt;
    &lt;a href="#"&gt;Next&lt;/a&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Aligned links</h3>
      <p>Alternatively, you can align each link to the sides:</p>
      <ul class="pager">
        <li class="previous"><a href="#">&larr; Older</a></li>
        <li class="next"><a href="#">Newer &rarr;</a></li>
      </ul>
<pre class="prettyprint linenums">
&lt;ul class="pager"&gt;
  &lt;li class="previous"&gt;
    &lt;a href="#"&gt;&amp;larr; Older&lt;/a&gt;
  &lt;/li&gt;
  &lt;li class="next"&gt;
    &lt;a href="#"&gt;Newer &amp;rarr;&lt;/a&gt;
  &lt;/li&gt;
&lt;/ul&gt;
</pre>
    </div>
  </div><!-- /row -->
</section>



<!-- Labels
================================================== -->
<section id="labels">
  <div class="page-header">
    <h1>Inline labels <small>Label and annotate text</small></h1>
  </div>
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Labels</th>
        <th>Markup</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <span class="label">Default</span>
        </td>
        <td>
          <code>&lt;span class="label"&gt;Default&lt;/span&gt;</code>
        </td>
      </tr>
      <tr>
        <td>
          <span class="label label-success">Success</span>
        </td>
        <td>
          <code>&lt;span class="label label-success"&gt;New&lt;/span&gt;</code>
        </td>
      </tr>
      <tr>
        <td>
          <span class="label label-warning">Warning</span>
        </td>
        <td>
          <code>&lt;span class="label label-warning"&gt;Warning&lt;/span&gt;</code>
        </td>
      </tr>
      <tr>
        <td>
          <span class="label label-important">Important</span>
        </td>
        <td>
          <code>&lt;span class="label label-important"&gt;Important&lt;/span&gt;</code>
        </td>
      </tr>
      <tr>
        <td>
          <span class="label label-info">Info</span>
        </td>
        <td>
          <code>&lt;span class="label label-info"&gt;Info&lt;/span&gt;</code>
        </td>
      </tr>
    </tbody>
  </table>
</section>



<!-- Thumbnails
================================================== -->
<section id="thumbnails">
  <div class="page-header">
    <h1>Thumbnails <small>Grids of images, videos, text, and more</small></h1>
  </div>

  <div class="row">
    <div class="span6">
      <h2>Default thumbnails</h2>
      <p>By default, Bootstrap's thumbnails are designed to showcase linked images with minimal required markup.</p>
      <ul class="thumbnails">
        <li class="span3">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
          </a>
        </li>
        <li class="span3">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
          </a>
        </li>
        <li class="span3">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
          </a>
        </li>
        <li class="span3">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
          </a>
        </li>
      </ul>
    </div>
    <div class="span6">
      <h2>Highly customizable</h2>
      <p>With a bit of extra markup, it's possible to add any kind of HTML content like headings, paragraphs, or buttons into thumbnails.</p>
      <ul class="thumbnails">
        <li class="span3">
          <div class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
            <div class="caption">
              <h5>Thumbnail label</h5>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="#" class="btn primary">Action</a> <a href="#" class="btn">Action</a></p>
            </div>
          </div>
        </li>
        <li class="span3">
          <div class="thumbnail">
            <img src="http://placehold.it/260x180" alt="">
            <div class="caption">
              <h5>Thumbnail label</h5>
              <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <p><a href="#" class="btn primary">Action</a> <a href="#" class="btn">Action</a></p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>

  <div class="row">
    <div class="span4">
      <h3>Why use thumbnails</h3>
      <p>Thumbnails (previously <code>.media-grid</code> up until v1.4) are great for grids of photos or videos, image search results, retail products, portfolios, and much more. They can be links or static content.</p>
    </div>
    <div class="span4">
      <h3>Simple, flexible markup</h3>
      <p>Thumbnail markup is simple&mdash;a <code>ul</code> with any number of <code>li</code> elements is all that is required. It's also super flexible, allowing for any type of content with just a bit more markup to wrap your contents.</p>
    </div>
    <div class="span4">
      <h3>Uses grid column sizes</h3>
      <p>Lastly, the thumbnails component uses existing grid system classes&mdash;like <code>.span2</code> or <code>.span3</code>&mdash;for control of thumbnail dimensions.</p>
    </div>
  </div>

  <div class="row">
    <div class="span6">
      <h2>The markup</h2>
      <p>As mentioned previously, the required markup for thumbnails is light and straightforward. Here's a look at the default setup <strong>for linked images</strong>:</p>
<pre class="prettyprint linenums">
&lt;ul class="thumbnails"&gt;
  &lt;li class="span3"&gt;
    &lt;a href="#" class="thumbnail"&gt;
      &lt;img src="http://placehold.it/260x180" alt=""&gt;
    &lt;/a&gt;
  &lt;/li&gt;
  ...
&lt;/ul&gt;
</pre>
      <p>For custom HTML content in thumbnails, the markup changes slightly. To allow block level content anywhere, we swap the <code>&lt;a&gt;</code> for a <code>&lt;div&gt;</code> like so:</p>
<pre class="prettyprint linenums">
&lt;ul class="thumbnails"&gt;
  &lt;li class="span3"&gt;
    &lt;div class="thumbnail"&gt;
      &lt;img src="http://placehold.it/260x180" alt=""&gt;
      &lt;h5&gt;Thumbnail label&lt;/h5&gt;
      &lt;p&gt;Thumbnail caption right here...&lt;/p&gt;
    &lt;/div&gt;
  &lt;/li&gt;
  ...
&lt;/ul&gt;
</pre>
    </div>
    <div class="span6">
      <h2>More examples</h2>
      <p>Explore all your options with the various grid classes available to you. You can also mix and match different sizes.</p>
      <ul class="thumbnails">
        <li class="span4">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/360x268" alt="">
          </a>
        </li>
        <li class="span2">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/160x120" alt="">
          </a>
        </li>
        <li class="span2">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/160x120" alt="">
          </a>
        </li>
        <li class="span2">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/160x120" alt="">
          </a>
        </li>
        <li class="span2">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/160x120" alt="">
          </a>
        </li>
        <li class="span2">
          <a href="#" class="thumbnail">
            <img src="http://placehold.it/160x120" alt="">
          </a>
        </li>
      </ul>
    </div>
  </div>

</section>



<!-- Alerts & Messages
================================================== -->
<section id="alerts">
  <div class="page-header">
    <h1>Alerts <small>Styles for success, warning, and error messages</small></h1>
  </div>

  <h2>Lightweight defaults</h2>
  <div class="row">
    <div class="span4">
      <h3>Rewritten base class</h3>
      <p>With Bootstrap 2, we've simplified the base class: <code>.alert</code> instead of <code>.alert-message</code>. We've also reduced the minimum required markup&mdash;no <code>&lt;p&gt;</code> is required by default, just the outter <code>&lt;div&gt;</code>.</p>
      <h3>Single alert message</h3>
      <p>For a more durable component with less code, we've removed the differentiating look for block alerts, messages that come with more padding and typically more text. The class also has changed to <code>.alert-block</code>.</p>
      <hr>
      <h3>Goes great with javascript</h3>
      <p>Bootstrap comes with a great jQuery plugin that supports alert messages, making dismissing them quick and easy.</p>
      <p><a class="btn js-btn" href="./javascript.html#alerts">Get the plugin &raquo;</a></p>
    </div>
    <div class="span8">
      <h3>Example alerts</h3>
      <p>Wrap your message and an optional close icon in a div with simple class.</p>
      <div class="alert">
        <a class="close">&times;</a>
        <strong>Warning!</strong> Best check yo self, you're not looking too good.
      </div>
<pre class="prettyprint linenums">
&lt;div class="alert"&gt;
  &lt;a class="close"&gt;&times;&lt;/a&gt;
  &lt;strong&gt;Warning!&lt;/strong&gt; Best check yo self, you're not looking too good.
&lt;/div&gt;
</pre>
      <p>Easily extend the standard alert message with two optional classes: <code>.alert-block</code> for more padding and text controls and <code>.alert-heading</code> for a matching heading.</p>
      <div class="alert alert-block">
        <a class="close">&times;</a>
        <h4 class="alert-heading">Warning!</h4>
        <p>Best check yo self, you're not looking too good. Nulla vitae elit libero, a pharetra augue. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
      </div>
<pre class="prettyprint linenums">
&lt;div class="alert alert-block"&gt;
  &lt;a class="close"&gt;&times;&lt;/a&gt;
  &lt;h4 class="alert-heading"&gt;Warning!&lt;/h4&gt;
  Best check yo self, you're not...
&lt;/div&gt;
</pre>
    </div>
  </div>

  <h2>Contextual alternatives <small>Add optional classes to change an alert's connotation</small></h2>
  <div class="row">
    <div class="span4">
      <h3>Error or danger</h3>
      <div class="alert alert-error">
        <a class="close">&times;</a>
        <strong>Oh snap!</strong> Change a few things up and try submitting again.
      </div>
<pre class="prettyprint linenums">
&lt;div class="alert alert-error"&gt;
  ...
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Success</h3>
      <div class="alert alert-success">
        <a class="close">&times;</a>
        <strong>Well done!</strong> You successfully read this important alert message.
      </div>
<pre class="prettyprint linenums">
&lt;div class="alert alert-success"&gt;
  ...
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Information</h3>
      <div class="alert alert-info">
        <a class="close">&times;</a>
        <strong>Heads up!</strong> This alert needs your attention, but it's not super important.
      </div>
<pre class="prettyprint linenums">
&lt;div class="alert alert-info"&gt;
  ...
&lt;/div&gt;
</pre>
    </div>
  </div>

</section>



<!-- Progress bars
================================================== -->
<section id="progress">
  <div class="page-header">
    <h1>Progress bars <small>For loading, redirecting, or action status</small></h1>
  </div>

  <h2>Examples and markup</h2>
  <div class="row">
    <div class="span4">
      <h3>Basic</h3>
      <p>Default progress bar with a vertical gradient.</p>
      <div class="progress">
        <div class="bar" style="width: 60%;"></div>
      </div>
<pre class="prettyprint linenums">
&lt;div class="progress"&gt;
  &lt;div class="bar"
       style="width: 60%;"&gt;&lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Striped</h3>
      <p>Uses a gradient to create a striped effect.</p>
      <div class="progress progress-info progress-striped">
        <div class="bar" style="width: 20%;"></div>
      </div>
<pre class="prettyprint linenums">
&lt;div class="progress progress-info
     progress-striped"&gt;
  &lt;div class="bar"
       style="width: 20%;"&gt;&lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
    <div class="span4">
      <h3>Animated</h3>
      <p>Takes the striped example and animates it.</p>
      <div class="progress progress-danger progress-striped active">
        <div class="bar" style="width: 45%"></div>
      </div>
<pre class="prettyprint linenums">
&lt;div class="progress progress-danger
     progress-striped active"&gt;
  &lt;div class="bar"
       style="width: 40%;"&gt;&lt;/div&gt;
&lt;/div&gt;
</pre>
    </div>
  </div>

  <h2>Options and browser support</h2>
  <div class="row">
    <div class="span4">
      <h3>Additional colors</h3>
      <p>Progress bars utilize some of the same class names as buttons and alerts for similar styling.</p>
      <ul>
        <li><code>.progress-info</code></li>
        <li><code>.progress-success</code></li>
        <li><code>.progress-danger</code></li>
      </ul>
      <p>Alternatively, you can customize the LESS files and roll your own colors and sizes.</p>
    </div>
    <div class="span4">
      <h3>Behavior</h3>
      <p>Progress bars use CSS3 transitions, so if you dynamically adjust the width via javascript, it will smoothly resize.</p>
      <p>If you use the <code>.active</code> class, your <code>.progress-striped</code> progress bars will animate the stripes left to right.</p>
    </div>
    <div class="span4">
      <h3>Browser support</h3>
      <p>Progress bars use CSS3 gradients, transitions, and animations to achieve all their effects. These features are not supported in IE7-8 or older versions of Firefox.</p>
      <p>Opera does not support animations at this time.</p>
    </div>
  </div>

</section>





<!-- Miscellaneous
================================================== -->
<section id="misc">
  <div class="page-header">
    <h1>Miscellaneous <small>Wells, badges, and close icon</small></h1>
  </div>
  <div class="row">
    <div class="span4">
      <h2>Wells</h2>
      <p>Use the well as a simple effect on an element to give it an inset effect.</p>
      <div class="well">
        Look, I'm in a well!
      </div>
<pre class="prettyprint linenums">
&lt;div class="well"&gt;
  ...
&lt;/div&gt;
</pre>
    </div><!--/span-->
    <div class="span4" style="display: none;">
      <h2>Badges</h2>
      <p>Use a badge on an element for an unread count or as a simple indicator.</p>
<pre class="prettyprint linenums">&lt;span class="badge"&gt;3&lt;/div&gt;</pre>
    </div><!--/span-->
    <div class="span4">
      <h2>Close icon</h2>
      <p>Use the generic close icon for dismissing content like modals and alerts.</p>
      <p><a class="close" style="float: none;">&times;</a></p>
<pre class="prettyprint linenums">&lt;a class="close"&gt;&amp;times;&lt;/a&gt;</pre>
    </div><!--/span-->
  </div><!--/row-->
</section>

    </div><!-- /container -->