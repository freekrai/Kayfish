<div class="container">
	<div class="content">
		<div class="page-header">
			<h1>Sortable Lists</h1>
		</div>
		<div class="row">
			<div class="span12">

<div id="fancy-list">
	<input class="search" />
	<span class="sort btn btn-primary" data-sort="name">Sort by name</span>
	<span class="sort btn btn-primary" data-sort="city">Sort by city</span>
	<ul class="list">
		<li>
			<h3 class="name">Jonny</h3>
			<p class="city">Stockholm</p>
		</li>
		<li>
           <h3 class="name">Jonas</h3>
           <p class="city">Berlin</p>
       </li>
		<li>
           <h3 class="name">aJonas</h3>
           <p class="city">bBerlin</p>
       </li>
		<li>
           <h3 class="name">bJonas</h3>
           <p class="city">dBerlin</p>
       </li>
    </ul>
</div>
				<script>
					$(document).ready(function() {
						var hackerList = new List('fancy-list', {valueNames: ['name', 'city']});
						});
					function movieFormatResult(movie) {
						  var markup = "<table class='movie-result'><tr>";
						  if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
								markup += "<td class='movie-image'><img src='" + movie.posters.thumbnail + "'/></td>";
						  }
						  markup += "<td class='movie-info'><div class='movie-title'>" + movie.title + "</div>";
						  if (movie.critics_consensus !== undefined) {
								markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
						  }
						  else if (movie.synopsis !== undefined) {
								markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
						  }
						  markup += "</td></tr></table>"
						  return markup;
					 }
				
					 function movieFormatSelection(movie) {
						  return movie.title;
					 }
				</script>
			</div>
		</div>
	</div>
</div