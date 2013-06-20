<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>TNEA &middot; Explorer</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Tamil Nadu Engineering Admission Helper Website">
		<meta name="author" content="Amith Kumar M K">
		<script src="assets/js/jquery-1.10.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	<!-- <script src="assets/js/jquery-ui.js"></script> -->
		<style type="text/css">
		</style>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			 (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			 m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
			  ga('create', 'UA-41668681-1', 'tneaexplorer.in');
			  ga('send', 'pageview');
		</script>
		<script type="text/javascript">
		var data1;
		$(document).ready(function(){
			$("#myCommunity,#second_myCommunity").typeahead({
				"source": ['OC', 'MBC', 'SC', 'SCA', 'ST','BC','BCM'],
				//match any item
				matcher: function(item) {
					if (this.query == '*') {
						return true;
					} else {
						return item.indexOf(this.query.trim().toUpperCase()) >= 0;
					}
				},
				//avoid highlightning of "*"
				highlighter: function(item) {
					return "<div>" + item + "</div>"
				}
			});	
			$("#search,#second_search").click(function() {
				$("#loader").removeClass("hide")
				var mymark_id;
				var mycommunity_id;
				if(this.id == "search"){
					mymark_id="myMark";
					mycommunity_id = "myCommunity";
					$('#home_middle_content').fadeOut(0);
				}
				else{
					$('#clg_middle_content').fadeOut(0);
					$('#dynamic_content').empty();
					mymark_id="second_myMark";
					mycommunity_id = "second_myCommunity";
				}
				//$("#home_middle_content").hide('slow', function(){ $("#home_middle_content").remove(); });
				
				
				//$('#clg_middle_content').show();
				
				$.get("serverpage.php", { mark: $("#"+mymark_id).val(), community: $("#"+mycommunity_id).val() },
					function(data) {
						data1=data;
						for(var i=0;i<data['clg_details'].length;i++){
							if($('#dynamic_content').children().length == 0){
								$('#dynamic_content').append("<div class='masthead' id="+data['clg_details'][i]['district_name']+" ><h4>"+data['clg_details'][i]['district_name']+"</h4></div>");
								$("#"+data['clg_details'][i]['district_name']).append("<table class='table table-hover'><tr><th>Code</th><th>Name</th><th>Department</th><th>Minimum Marks</th></tr><tr><td>"+data['clg_details'][i]['college_code']+"</td><td>"+data['clg_details'][i]['college_name']+"</td><td>"+data['clg_details'][i]['department_name']+"</td><td>"+data['clg_details'][i]['mark']+"</td></tr></table>");
								continue;
							}
							for(var j=0;j<$('#dynamic_content').children().length;j++){
								if($("h4",$('#dynamic_content').children()[j]).text() == data['clg_details'][i]['district_name']){
									$("#"+data['clg_details'][i]['district_name']+" table").append("<tr><td>"+data['clg_details'][i]['college_code']+"</td><td>"+data['clg_details'][i]['college_name']+"</td><td>"+data['clg_details'][i]['department_name']+"</td><td>"+data['clg_details'][i]['mark']+"</td></tr>");
								}
								else{
									$('#dynamic_content').append("<div class='masthead' id="+data['clg_details'][i]['district_name']+" ><h4>"+data['clg_details'][i]['district_name']+"</h4></div>");
									//$("#"+data['clg_details'][i]['district_name']+" table").append("<tr><td>"+data['clg_details'][i]['college_code']+"</td><td>"+data['clg_details'][i]['college_name']+"</td><td>"+data['clg_details'][i]['department_name']+"</td><td>"+data['clg_details'][i]['mark']+"</td></tr>");
									$("#"+data['clg_details'][i]['district_name']).append("<table class='table table-hover'><tr><th>Code</th><th>Name</th><th>Department</th><th>Minimum Marks</th></tr><tr><td>"+data['clg_details'][i]['college_code']+"</td><td>"+data['clg_details'][i]['college_name']+"</td><td>"+data['clg_details'][i]['department_name']+"</td><td>"+data['clg_details'][i]['mark']+"</td></tr></table>");
								}
							}
						}
					}, "json"
				);
				//$('#clg_middle_content').fadeOut(600);
				$("#loader").addClass("hide")
				$('#clg_middle_content').fadeIn(900);
			});
			
		});
		</script>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
		<![endif]-->
		
		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

		<!-- Bootstrap -->
		<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen">
		<link href="assets/css/bootstrap-responsive.min.css" rel="stylesheet">
		<!-- <link href="assets/css/jquery-ui.css" rel="stylesheet"> -->
		<link href="assets/css/custom.css" rel="stylesheet">
		<link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	</head>
	<body>	
		<div class="container">
			<div class="masthead" style="postition:fixed">
				<h1 class="muted">TNEA &middot; Explorer</h1>
				<hr />
			</div>
			
			<div id="home_middle_content" class="jumbotron">
				<h2>Wanna know what your seniors got..?</h2>
				<p class="lead">Enter your cut off mark and community and find what colleges can take you towards your destiny</p>
				<br/><br/>
				<input type="text" name="cutoffmark" class="input-large" id="myMark" placeholder="cut off mark" />
				<input type="text" name="cast" class="input-large" data-provide="typeahead" id="myCommunity" placeholder="community" autocomplete="off" />
				<input type="button" value="Dot it" class="btn btn-primary btn-large" id="search" />
			</div>	  
			<div id="clg_middle_content"  style="display:none">
				<input type="text" name="cutoffmark" class="input" id="second_myMark" placeholder="cut off mark" />
				<input type="text" name="cast" class="input" data-provide="typeahead" id="second_myCommunity" placeholder="community" autocomplete="off" />
				<input type="button" value="Dot it" class="btn btn-primary " style="margin-bottom: 13px;"id="second_search" />
				<div id="dynamic_content"></div>
			</div>
			<img src="assets/images/spinner.gif" class="hide offset5" width="50px" height="20px" id="loader">
			<hr />
			<footer  class="footer">
				<div id="footer" class="container">
					<ul class="unstyled inline">
						<!--<li>
							<a href="https://www.facebook.com/mkamithkumar" target="_blank"><p class="icon-facebook icon-2x"></p></a>
						</li>
						<li>
							<a href="https://www.twitter.com/Im_Amith"  target="_blank"><p class="icon-twitter icon-2x"></p></a>
						</li>-->
						<li>
							<iframe class ="github-btn" src="http://ghbtns.com/github-btn.html?user=mkamithkumar&repo=tnea_explorer&type=watch&count=true"
							allowtransparency="true" frameborder="0" scrolling="0" width="80px" height="20px"></iframe>
						</li>
						<li>
							<iframe class ="github-btn" src="http://ghbtns.com/github-btn.html?user=mkamithkumar&repo=tnea_explorer&type=fork&count=true"
							allowtransparency="true" frameborder="0" scrolling="0" width="80px" height="20px"></iframe>
						</li>
					</ul>
					<p>&copy; All the informations are genuine based on 2012 councelling stats provided by anna university.This website is not meant for any commercial purpose, this website is purely intended to provide service for students</p>
				</div>
			</footer>
		</div> <!-- /container --> 	
	</body>
</html>