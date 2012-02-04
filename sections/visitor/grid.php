<div class="container">

      <!-- Masthead
      ================================================== -->
      <header class="jumbotron subhead" id="overview">
        <h1>Scaffolding</h1>
        <p class="lead">Bootstrap is built on a responsive 12-column grid. We've also included fixed- and fluid-width layouts based on that system.</p>
        <div class="subnav">
          <ul class="nav nav-pills">
            <li><a href="#grid-system">Grid system</a></li>
            <li><a href="#layouts">Layouts</a></li>
            <li><a href="#responsive">Responsive design</a></li>
          </ul>
        </div>
      </header>



<!-- Grid system
================================================== -->
<section id="grid-system">
  <div class="page-header">
    <h1>Grid system <small>12 columns with a responsive twist</small></h1>
  </div>

  <h2>Default 940px grid</h2>
  <div class="row show-grid">
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
    <div class="span1">1</div>
  </div>
  <div class="row show-grid">
    <div class="span4">4</div>
    <div class="span4">4</div>
    <div class="span4">4</div>
  </div>
  <div class="row show-grid">
    <div class="span4">4</div>
    <div class="span8">8</div>
  </div>
  <div class="row show-grid">
    <div class="span6">6</div>
    <div class="span6">6</div>
  </div>
  <div class="row show-grid">
    <div class="span12">12</div>
  </div>
  <div class="row">
    <div class="span4">
      <p>The default grid system provided as part of Bootstrap is a <strong>940px-wide, 12-column grid</strong>.</p>
      <p>It also has four responsive variations for various devices and resolutions: phone, tablet portrait, table landscape and small desktops, and large widescreen desktops.</p>
    </div>
    <div class="span4">
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span4"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span8"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
    </div>
    <div class="span4">
      <p>As shown here, a basic layout can be created with two "columns," each spanning a number of the 12 foundational columns we defined as part of our grid system.</p>
    </div>
  </div><!-- /row -->

  <br>

  <h2>Offsetting columns</h2>
  <div class="row show-grid">
    <div class="span4">4</div>
    <div class="span4 offset4">4 offset 4</div>
  </div><!-- /row -->
  <div class="row show-grid">
    <div class="span3 offset3">3 offset 3</div>
    <div class="span3 offset3">3 offset 3</div>
  </div><!-- /row -->
  <div class="row show-grid">
    <div class="span8 offset4">8 offset 4</div>
  </div><!-- /row -->
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span4"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L2"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span4 offset4"</span><span class="tag">&gt;</span><span class="pln">...</span><span class="tag">&lt;/div&gt;</span></li><li class="L3"><span class="tag">&lt;/div&gt;</span></li></ol></pre>

  <br>

  <h2>Nesting columns</h2>
  <div class="row">
    <div class="span6">
      <p>With the static (non-fluid) grid system in Bootstrap, nesting is easy. To nest your content, just add a new <code>.row</code> and set of <code>.span*</code> columns within an existing <code>.span*</code> column.</p>
      <h4>Example</h4>
      <div class="row show-grid">
        <div class="span6">
          Level 1 of column
          <div class="row show-grid">
            <div class="span3">
              Level 2
            </div>
            <div class="span3">
              Level 2
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="span6">
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span12"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    Level 1 of column</span></li><li class="L3"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row"</span><span class="tag">&gt;</span></li><li class="L4"><span class="pln">      </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span6"</span><span class="tag">&gt;</span><span class="pln">Level 2</span><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="pln">      </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span6"</span><span class="tag">&gt;</span><span class="pln">Level 2</span><span class="tag">&lt;/div&gt;</span></li><li class="L6"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L7"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L8"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
    </div>
  </div>
</section>



<!-- Layouts (Default and fluid)
================================================== -->
<section id="layouts">
  <div class="page-header">
    <h1>Layouts <small>Basic templates to create webpages</small></h1>
  </div>

  <div class="row">
    <div class="span6">
      <h2>Fixed layout</h2>
      <p>The default and simple 940px-wide, centered layout for just about any website or page provided by a single <code>&lt;div class="container"&gt;</code>.</p>
      <div class="minicon-layout">
        <div class="minicon-layout-body"></div>
      </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;body&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"container"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    ...</span></li><li class="L3"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L4"><span class="tag">&lt;/body&gt;</span></li></ol></pre>
    </div><!-- /col -->
    <div class="span6">
      <h2>Fluid layout</h2>
      <p><code>&lt;div class="container-fluid"&gt;</code> gives flexible page structure, min- and max-widths, and a left-hand sidebar. It's great for apps and docs.</p>
      <div class="minicon-layout fluid">
        <div class="minicon-layout-sidebar"></div>
        <div class="minicon-layout-body"></div>
      </div>
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"container-fluid"</span><span class="tag">&gt;</span></li><li class="L1"><span class="pln">  </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"row-fluid"</span><span class="tag">&gt;</span></li><li class="L2"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span2"</span><span class="tag">&gt;</span></li><li class="L3"><span class="pln">      </span><span class="com">&lt;!--Sidebar content--&gt;</span></li><li class="L4"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L5"><span class="pln">    </span><span class="tag">&lt;div</span><span class="pln"> </span><span class="atn">class</span><span class="pun">=</span><span class="atv">"span10"</span><span class="tag">&gt;</span></li><li class="L6"><span class="pln">      </span><span class="com">&lt;!--Body content--&gt;</span></li><li class="L7"><span class="pln">    </span><span class="tag">&lt;/div&gt;</span></li><li class="L8"><span class="pln">  </span><span class="tag">&lt;/div&gt;</span></li><li class="L9"><span class="tag">&lt;/div&gt;</span></li></ol></pre>
    </div><!-- /col -->
  </div><!-- /row -->
</section>




<!-- Responsive design
================================================== -->
<section id="responsive">
  <div class="page-header">
    <h1>Responsive design <small>Media queries for various devices and resolutions</small></h1>
  </div>
  <!-- Supported devices -->
  <div class="row">
    <div class="span12">
      <h2>Supported devices</h2>
      <p>Bootstrap supports a handful of media queries to help make your projects more appropriate on different devices and screen resolutions. Here's what's included:</p>
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Label</th>
            <th>Layout width</th>
            <th>Column width</th>
            <th>Gutter width</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Smartphones</td>
            <td>480px and below</td>
            <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
          </tr>
          <tr>
            <td>Portrait tablets</td>
            <td>480px to 768px</td>
            <td class="muted" colspan="2">Fluid columns, no fixed widths</td>
          </tr>
          <tr>
            <td>Landscape tablets</td>
            <td>768px to 980px</td>
            <td>44px</td>
            <td>20px</td>
          </tr>
          <tr>
            <td>Default</td>
            <td>980px and up</td>
            <td>60px</td>
            <td>20px</td>
          </tr>
          <tr>
            <td>Large display</td>
            <td>1210px and up</td>
            <td>70px</td>
            <td>30px</td>
          </tr>
        </tbody>
      </table>

      <h3>What they do</h3>
      <p>Media queries allow for custom CSS based on a number of conditions—ratios, widths, display type, etc—but usually focuses around <code>min-width</code> and <code>max-width</code>.</p>
      <ul>
        <li>Modify the width of column in our grid</li>
        <li>Stack elements instead of float wherever necessary</li>
        <li>Resize headings and text to be more appropriate for devices</li>
      </ul>
    </div>
  </div>

  <br>

  <!-- Media query code -->
  <h2>Using the media queries</h2>
  <div class="row">
    <div class="span5">
      <p>Bootstrap doesn't automatically include these media queries, but understanding and adding them is very easy and requires minimal setup. You have a few options for including the responsive features of Bootstrap:</p>
      <ol>
        <li>Use the compiled responsive version, bootstrap-responsive.css</li>
        <li>Add @import "responsive.less" and recompile Bootstrap</li>
        <li>Modify and recompile responsive.less as a separate</li>
      </ol>
      <p><strong>Why not just include it?</strong> Truth be told, not everything needs to be responsive. Instead of encouraging developers to remove this feature, we figure it best to enable it.</p>
    </div>
    <div class="span7">
<pre class="prettyprint linenums"><ol class="linenums"><li class="L0"><span class="pln">  </span><span class="com">// Landscape phones and down</span></li><li class="L1"><span class="pln">  </span><span class="lit">@media</span><span class="pln"> </span><span class="pun">(</span><span class="pln">max</span><span class="pun">-</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">480px</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span><span class="pln"> </span><span class="pun">...</span><span class="pln"> </span><span class="pun">}</span></li><li class="L2"><span class="pln">&nbsp;</span></li><li class="L3"><span class="pln">  </span><span class="com">// Landscape phone to portrait tablet</span></li><li class="L4"><span class="pln">  </span><span class="lit">@media</span><span class="pln"> </span><span class="pun">(</span><span class="pln">max</span><span class="pun">-</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">768px</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span><span class="pln"> </span><span class="pun">...</span><span class="pln"> </span><span class="pun">}</span></li><li class="L5"><span class="pln">&nbsp;</span></li><li class="L6"><span class="pln">  </span><span class="com">// Portrait tablet to landscape and desktop</span></li><li class="L7"><span class="pln">  </span><span class="lit">@media</span><span class="pln"> </span><span class="pun">(</span><span class="pln">min</span><span class="pun">-</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">768px</span><span class="pun">)</span><span class="pln"> </span><span class="kwd">and</span><span class="pln"> </span><span class="pun">(</span><span class="pln">max</span><span class="pun">-</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">980px</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span><span class="pln"> </span><span class="pun">...</span><span class="pln"> </span><span class="pun">}</span></li><li class="L8"><span class="pln">&nbsp;</span></li><li class="L9"><span class="pln">  </span><span class="com">// Large desktop</span></li><li class="L0"><span class="pln">  </span><span class="lit">@media</span><span class="pln"> </span><span class="pun">(</span><span class="pln">min</span><span class="pun">-</span><span class="pln">width</span><span class="pun">:</span><span class="pln"> </span><span class="lit">1200px</span><span class="pun">)</span><span class="pln"> </span><span class="pun">{</span><span class="pln"> </span><span class="pun">..</span><span class="pln"> </span><span class="pun">}</span></li></ol></pre>
    </div>
  </div>
</section>
    </div>