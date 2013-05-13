<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>The TellUs Toolkit - Green Home Watch - Submitted Review of Heating</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="The TellUs Toolkit - Green Home Watch">
<meta name="author" content="Richard Kingston">
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/bootstrap-responsive.css" rel="stylesheet">
<link href="css/bootswatch.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/tool-tips.css" />
<link rel="stylesheet" type="text/css" href="../ghw/code/detailview/styles.css" />
<link rel="stylesheet" type="text/css" href="../ghw/code/rating/jquery.rating.css" />
<!--script type="text/javascript" src="../ghw/code/jquery.js"></script -->
<script type="text/javascript" src="../ghw/code/jquery.metadata.js"></script>
<script type="text/javascript" src="../ghw/code/jquery.rating.js"></script>
<!-- Checks spelling in input forms using spellify -->
<link rel="stylesheet" href="/spellify/images/spellify.css" type="text/css" media="screen" />
<!--[if IE]>
	<link href="/spellify/images/ie.css" rel="stylesheet" type="text/css" media=screen>
<![endif]-->
<!--[if IE 6]>
	<link href="/spellify/images/ie6.css" rel="stylesheet" type="text/css" media=screen>
<![endif]-->
<link rel="stylesheet" type="text/css" href="code/detailview/styles.css" />
<link rel="stylesheet" type="text/css" href="code/rating/jquery.rating.css" />
<script type="text/javascript" src="code/jquery.js"></script>
<script type="text/javascript" src="code/jquery.metadata.js"></script>
<script type="text/javascript" src="code/jquery.rating.js"></script>
<!-- This code converts the UK postcode to a lat lng for storing in the database so Google Maps can plot the responses on the map -->
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=places" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=AIzaSyCx_oL3VqqIkd8Tl6KJbpMQ74P2h58GWfA" type="text/javascript"></script>
<!--script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script-->
<!--script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=AIzaSyCx_oL3VqqIkd8Tl6KJbpMQ74P2h58GWfA" type="text/javascript"></script>
<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=AIzaSyCx_oL3VqqIkd8Tl6KJbpMQ74P2h58GWfA" type="text/javascript"></script>
<script src="http://www.google.com/uds/solutions/localsearch/gmlocalsearch.js" type="text/javascript"></script -->
<?php
require("/home/mfhssrpk/ghw_heat_db_info.php");

// Connect to server and select database.
$connect = mysql_connect(localhost, $username, $password);
if (!$connect)
  {
  die('Could not connect: ' . mysql_error());
  }
//mysql_select_db("$db_name")or die("cannot select DB");
mysql_select_db('greendeal', $connect);

$postcode = $_POST['postcode'];
// post code to look up in this case status however can easily be retrieved from a database or a form post
$postcode = urlencode($_POST['postcode']);

// the request URL you'll send to google to get back your XML feed
$request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=".$postcode."&sensor=true";

$xml = simplexml_load_file($request_url) or die("url not loading");// XML request
    $status = $xml->status;// GET the request status as google's api can return several responses
    if ($status=="OK") {
        //request returned completed time to get lat / lang for storage
        $lat = $xml->result->geometry->location->lat;
        $lng = $xml->result->geometry->location->lng;
    }
    if ($status=="ZERO_RESULTS") {
        //indicates that the geocode was successful but returned no results. This may occur if the geocode was passed a non-existent address or a latlng in a remote location.
    }
    if ($status=="OVER_QUERY_LIMIT") {
        //indicates that you are over your quota of geocode requests against the google api
    }
    if ($status=="REQUEST_DENIED") {
        //indicates that your request was denied, generally because of lack of a sensor parameter.
    }
    if ($status=="INVALID_REQUEST") {
        //generally indicates that the query (address or latlng) is missing.
    }

// Rreview
$reviewChoice = $_POST['reviewChoice'];
$username = htmlspecialchars(strip_tags(utf8_encode($_POST['username'])));
// $lat & $lng are captured above for writing to xml file so the records can be mapped in GMaps
$postcode = htmlspecialchars(strip_tags(utf8_encode($_POST['postcode'])));
$date = date('Y-m-d H:i:s');
$reviewType = $_POST['reviewType'];
$OtherType = htmlspecialchars(strip_tags(utf8_encode($_POST['OtherType'])));

// Product Information
$ProductMakeAndModel = htmlspecialchars(strip_tags(utf8_encode($_POST['ProductMakeAndModel'])));
$ProductYearPurchasedFitted = htmlspecialchars(strip_tags(utf8_encode($_POST['ProductYearPurchasedFitted'])));
$ProductIsRecommended = $_POST['ProductIsRecommended'];
$ProductRecommendationExplanation = htmlspecialchars(strip_tags(utf8_encode($_POST['ProductRecommendationExplanation'])));
$ProductRating = $_POST['ProductRating'];
$ProductEmphasis = htmlspecialchars(strip_tags(utf8_encode($_POST['ProductEmphasis'])));

// Installation / Service information
$InstalledById = $_POST['InstalledById'];
$CompanyName = htmlspecialchars(strip_tags(utf8_encode($_POST['CompanyName'])));
$CompanyIsMCSCertified = $_POST['CompanyIsMCSCertified'];
$CompanyMCS = htmlspecialchars(strip_tags(utf8_encode($_POST['CompanyMCS'])));
$CompanyIsRecommended = $_POST['CompanyIsRecommended'];
$CompanyRecommendationExplanation = htmlspecialchars(strip_tags(utf8_encode($_POST['CompanyRecommendationExplanation'])));
$CompanyRating = $_POST['CompanyRating'];

// Costs and impact
$Cost = htmlspecialchars(strip_tags(utf8_encode($_POST['Cost'])));
$CostDoNotKnow = $_POST['CostDoNotKnow'];
//$Grant = $_POST['Grant'];
$GrantType = htmlspecialchars(strip_tags(utf8_encode($_POST['GrantType'])));
$ReviewImpact = htmlspecialchars(strip_tags(utf8_encode($_POST['ReviewImpact'])));
$ReviewCostEfficiencyAssessmentId = $_POST['ReviewCostEfficiencyAssessmentId'];

// Property information
$HouseholdPropertyTypeId = $_POST['HouseholdPropertyTypeId'];
$HouseholdPropertyAge = $_POST['HouseholdPropertyAge'];
$HouseholdConstructionType = $_POST['HouseholdConstructionType'];
$HouseholdHasDoubleGlazing = $_POST['HouseholdHasDoubleGlazing'];
$HouseholdHasLoftInsulation = $_POST['HouseholdHasLoftInsulation'];
$HouseholdHasWallInsulation = $_POST['HouseholdHasWallInsulation'];
$HouseholdBedrooms = htmlspecialchars(strip_tags(utf8_encode($_POST['HouseholdBedrooms'])));
$HouseholdTenureTypeId = $_POST['HouseholdTenureTypeId'];
$HouseholdMembersNumber = htmlspecialchars(strip_tags(utf8_encode($_POST['HouseholdMembersNumber'])));

// More information
$MoreExperienceHeatingMoreInfo = htmlspecialchars(strip_tags(utf8_encode($_POST['MoreExperienceHeatingMoreInfo'])));

// Insert data into mysql
$sql="INSERT INTO heat (ID, lat, lng, reviewChoice, username, postcode, date, reviewType, OtherType, ProductMakeAndModel, ProductYearPurchasedFitted, ProductIsRecommended, ProductRecommendationExplanation, ProductRating, ProductEmphasis, InstalledById, CompanyName, CompanyIsMCSCertified, CompanyMCS, CompanyIsRecommended, CompanyRecommendationExplanation, CompanyRating, Cost, CostDoNotKnow, GrantType, ReviewImpact, ReviewCostEfficiencyAssessmentId, HouseholdPropertyTypeId, HouseholdPropertyAge, HouseholdConstructionType, HouseholdHasDoubleGlazing, HouseholdHasLoftInsulation, HouseholdHasWallInsulation, HouseholdBedrooms, HouseholdTenureTypeId, HouseholdMembersNumber, MoreExperienceHeatingMoreInfo) VALUES (ID, '$lat', '$lng', '$reviewChoice', '$username', '$postcode', '$date', '$reviewType', '$OtherType', '$ProductMakeAndModel', '$ProductYearPurchasedFitted', '$ProductIsRecommended', '$ProductRecommendationExplanation', '$ProductRating', '$ProductEmphasis', '$InstalledById', '$CompanyName', '$CompanyIsMCSCertified', '$CompanyMCS', '$CompanyIsRecommended', '$CompanyRecommendationExplanation', '$CompanyRating', '$Cost', '$CostDoNotKnow', '$GrantType', '$ReviewImpact', '$ReviewCostEfficiencyAssessmentId', '$HouseholdPropertyTypeId', '$HouseholdPropertyAge', '$HouseholdConstructionType', '$HouseholdHasDoubleGlazing', '$HouseholdHasLoftInsulation', '$HouseholdHasWallInsulation', '$HouseholdBedrooms', '$HouseholdTenureTypeId', '$HouseholdMembersNumber', '$MoreExperienceHeatingMoreInfo')";

$result=mysql_query($sql);

// if successfully insert data into database, displays message "Successful".
// uncomment these lines to de-bug database writing.
/** if($result){
	echo "Database successful";
}

else {
	die('Error: ' . mysql_error());
} */

// close connection
mysql_close();
?>
</head>
<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
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
  <legend>Thank you for submiting your <em><?php print "$reviewChoice";?></em> review! Here's what you said...</legend>
  <table class="table table-bordered table-striped table-hover">
    <th colspan="2"><b><i>Your <?php print "$reviewChoice";?> Review</i></b></th>
    <tr class="odd">
      <th>Username</th>
      <td><?php print "$username";?></td>
    </tr>
    <tr class="even">
      <th>Postcode</th>
      <td><?php print "$postcode"; ?></td>
    </tr>
    <tr class="odd">
      <th>Submission Date</th>
      <td><?php print "$date";?></td>
    </tr>
    <tr class="even">
      <th><?php print "$reviewChoice";?> Type</th>
      <td><input type="hidden" id="heatingTypeDropDown" value="<?php print "$reviewType"; ?>" />
        <?php print "$reviewType"; ?></td>
    </tr>
    <tr class="odd">
      <th>Other <?php print "$reviewChoice";?> Type</th>
      <td><?php print "$OtherType";?></td>
    </tr>
    <th colspan="2"><b><i>Product Information</i></b></th>
    <tr class="odd">
      <th>Product Make And Model</th>
      <td><?php print "$ProductMakeAndModel";?></td>
    </tr>
    <tr class="even">
      <th>Year Purchased Fitted</th>
      <td><?php print "$ProductYearPurchasedFitted";?></td>
    </tr>
    <tr class="odd">
      <th>Is this product recommended to others ?</th>
      <td><?php print "$ProductIsRecommended";?></td>
    </tr>
    <tr class="even">
      <th>Recommendation Explanation</th>
      <td><?php print "$ProductRecommendationExplanation";?></td>
    </tr>
    <tr class="odd">
      <th>Rating</th>
      <td><?php print "$ProductRating"; ?> out of 5</td>
    </tr>
    <tr class="even">
      <th>More product info depending on reviewer 's experience</th>
      <td><?php print "$ProductEmphasis";?></td>
    </tr>
    <th colspan="2"><b><i>Installation / Service information</i></b></th>
    <tr class="odd">
      <th>Installed By</th>
      <td><?php print "$InstalledById";?></td>
    </tr>
    <tr class="even">
      <th>Company Name</th>
      <td><?php print "$CompanyName";?></td>
    </tr>
    <tr class="odd">
      <th>Is MCS Certified?</th>
      <td><?php print "$CompanyIsMCSCertified";?></td>
    </tr>
    <tr class="even">
      <th>MCS Certificate No.</th>
      <td><?php print "$CompanyMCS";?></td>
    </tr>
    <tr class="odd">
      <th>Is Company Recommended?</th>
      <td><?php print "$CompanyIsRecommended";?></td>
    </tr>
    <tr class="even">
      <th>Why is it Recommended?</th>
      <td><?php print "$CompanyRecommendationExplanation";?></td>
    </tr>
    <tr class="odd">
      <th>Rating</th>
      <td><?php print "$CompanyRating";?> out of 5</td>
    </tr>
    <th colspan="2"><b><i>Costs and Impact</i></b></th>
    <tr class="odd">
      <th>Total Cost of Installation and Equipment in &pound;s</th>
      <td>&pound;<?php print "$Cost";?> <?php print "$CostDoNotKnow";?></td>
    </tr>
    <!--tr class="even">
          <th>Did you access a grant or a government incentive?</th>
          <td><?php print "$Grant";?></td>
        </tr-->
    <tr class="even">
      <th>Grant details</th>
      <td><?php print "$GrantType";?></td>
    </tr>
    <tr class="odd">
      <th>Impact in Quality of Life</th>
      <td><?php print "$ReviewImpact";?></td>
    </tr>
    <tr class="even">
      <th>Did it help to save Energy?</th>
      <td><?php print "$ReviewCostEfficiencyAssessmentId";?></td>
    </tr>
    <th colspan="2"><b><i>Property information<i></b></i>
    <tr class="odd">
      <th>Property Type</th>
      <td><?php print "$HouseholdPropertyTypeId";?></td>
    </tr>
    <tr class="even">
      <th>Property Age</th>
      <td><?php print "$HouseholdPropertyAge";?></td>
    </tr>
    <tr class="odd">
      <th>Construction Type</th>
      <td><?php print "$HouseholdConstructionType";?></td>
    </tr>
    <tr class="even">
      <th>Has Double Glazing</th>
      <td><?php print "$HouseholdHasDoubleGlazing";?></td>
    </tr>
    <tr class="odd">
      <th>Has Loft Insulation</th>
      <td><?php print "$HouseholdHasLoftInsulation";?></td>
    </tr>
    <tr class="even">
      <th>Has Wall Insulation</th>
      <td><?php print "$HouseholdHasWallInsulation";?></td>
    </tr>
    <tr class="odd">
      <th>Number of Bedrooms</th>
      <td><?php print "$HouseholdBedrooms";?></td>
    </tr>
    <tr class="even">
      <th>Type of Tenure</th>
      <td><?php print "$HouseholdTenureTypeId";?></td>
    </tr>
    <tr class="odd">
      <th>Number of Members</th>
      <td><?php print "$HouseholdMembersNumber";?></td>
    </tr>
    <th colspan="2"><b><i>More Information</i></b></th>
    <tr class="odd">
      <th>Tips and Other Information</th>
      <td><?php print "$MoreExperienceHeatingMoreInfo";?></td>
    </tr>
    <th colspan="2"><b><i>User Feedback</i></b></th>
    <tr class="odd">
      <th>If you fill in this questionnaire you will be entered in to a raffle for a £50 high street shopping voucher.<br />
        This will take place after this survey has closed on 31<sup>st</sup> May 2013. You will be notified by email.</th>
      <td><input type="button" class="button" value="User Feedback / Evaluation" onClick="location.href='http://www.surveymonkey.com/s/DFGNHXF'" />
      </td>
    </tr>
  </table>
</div>
</div>
<!-- content -->
<div class="break"></div>
<footer id="footer">
  <p class="pull-right"><small><a href="#top">Back to top</a> &nbsp; &nbsp;</small></p>
  <div class="links"><small>&nbsp; &nbsp; Contact us: <a href="mailto:info@tellus-toolkit.com">info@<span class="tell">tell</span><span class="us">us</span> <span class="tell">toolkit</span>.com</a>| &nbsp; &nbsp;  Copyright &copy; 2012 - 2013, TellUs Toolkit Ltd. All Rights Reserved.</small></div>
</footer>
<!-- footer -->
</div>
<!-- page -->
<script type="text/javascript">
/*<![CDATA[*/
jQuery(function($) {
jQuery('#productHeatingRatingStarCount > input').rating({'required':true,'readOnly':true});
});
/*]]>*/
</script>
</body>
</html>
