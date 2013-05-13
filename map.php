<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>The TellUs Toolkit - Green Home Watch - Mapped Responses</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="The TellUs Toolkit - Green Home Watch">
<meta name="author" content="Richard Kingston">
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootswatch.css" rel="stylesheet">
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<script src="../ghw/code/gmMap.js" type="text/javascript"></script>
<!-- Allow box zooming -->
<script src="../ghw/code/keydragzoom_packed.js" type="text/javascript"></script>
<script src="../js/jquery-1.3.2.min.js" type="text/javascript"></script>
</head>
<body onLoad="load()" class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
<!-- Navbar
    ================================================== -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="http://www.tellus-toolkit.com/">Tell<span class="us">Us</span> Toolkit</a>
      <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav pull-right" id="main-menu-left">
          <li><a href="index.html">Green Home Watch</a></li>
          <li><a href="about.html">About</a></li>
          <li><a href="heat.php">Review Heating</a></li>
          <li><a href="insulation.php">Review Insulation</a></li>
          <li><a href="map.php">Map</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="span7">
      <blockquote class="well">
        <legend>What have others said...</legend>
        <!-- Map content -->
        <div id="map_canvas" style="width:100%; height:630px; overflow:auto; border: 1px solid #C9E0ED;">
          <div id="map" style="width:100%; height:100%"></div>
        </div>
      </blockquote>
    </div>
    <!-- end of map div -->
    <!-- Map legend -->
    <div class="span4">
      <blockquote class="well">
        <legend>Search for a place...</legend>
        <div>
          <input class="input-medium search-query" id="searchTextField" type="text" placeholder="by place name or postcode">
          <h4>or choose from your local authority:</h4>
          <div class="controls">
            <select class="span3" id="placeSelect" onChange="zoomLAMap()">
              <option value="53.45129, -2.23104">choose a place</option>
              <option value="53.57841, -2.46554">Bolton</option>
              <option value="53.58763, -2.31112">Bury</option>
              <option value="53.45129, -2.23104">Manchester</option>
              <option value="53.55164, -2.04918">Oldham</option>
              <option value="53.61634, -2.15636">Rochdale</option>
              <option value="53.48929, -2.36871">Salford</option>
              <option value="53.3937, -2.12666">Stockport</option>
              <option value="53.47722, -2.06131">Tameside</option>
              <option value="53.41876, -2.35392">Trafford</option>
              <option value="53.52392, -2.58817">Wigan</option>
            </select>
          </div>
        </div>
        <!--ul class="operations">
          <li><a href="">By type of heating</a></li>
          <li><a href="">By type of insulation</a></li>
          <li><a href="">By area</a></li>
          <li><a href="">By company</a></li>
        </ul-->
        <table>
          <tr>
            <td><img src="../ghw/green_heat.png" /></td>
            <td><strong>Heating Review</strong></td>
          </tr>
          <tr>
            <td><img src="../ghw/insulation.png" /></td>
            <td><strong>Insulation Review</strong></td>
          </tr>
          <tr>
            <td style="padding-top:5px;"><img src="../images/dragzoom_btn.png" align="absmiddle" /></td>
            <td><strong>Zoom to a box</strong></td>
          </tr>
        </table>
        <h4>You can search this map to see what others have said about their heating and insulation.</h4>
        <h4>Use the map tools to move around and zoom in/out or use the search option to search by place name or postcode.</h4>
        <h4>By clicking on any of the icons on the map a reviewers comments appear.</h4>
        <!--/div-->
        <!-- end of legend -->
      </blockquote>
    </div>
  </div>
  <!-- content -->
  <div class="break"></div>
  <footer id="footer">
    <p class="pull-right"><small><a href="#top">Back to top</a> &nbsp; &nbsp;</small></p>
    <div class="links"><small>&nbsp; &nbsp; Contact us: <a href="mailto:info@tellus-toolkit.com">info@<span class="tell">tell</span><span class="us">us</span> <span class="tell">toolkit</span>.com</a>| &nbsp; &nbsp;  Copyright &copy; 2012 - 2013, TellUs Toolkit Ltd. All Rights Reserved.</small></div>
  </footer>
</div>
<!-- footer -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery_002.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootswatch.js"></script>
</body>
</html>
