<?php
require("/home/mfhssrpk/ghw_heat_db_info.php");

function parseToXML($htmlStr) { 
	$xmlStr=str_replace('<','&lt;',$htmlStr); 
	$xmlStr=str_replace('>','&gt;',$xmlStr); 
	$xmlStr=str_replace('"','&quot;',$xmlStr); 
	$xmlStr=str_replace("'",'&#39;',$xmlStr); 
	$xmlStr=str_replace("&",'&amp;',$xmlStr); 
	return $xmlStr; 
} 

// Opens a connection to a MySQL server
$connection=mysql_connect (localhost, $username, $password);
if (!$connection) {
	die('Not connected : ' . mysql_error());
}

// Set the active MySQL database
$db_selected = mysql_select_db('greendeal', $connection);
if (!$db_selected) {
	die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the heat table
$query = "SELECT * FROM heat WHERE 1";
$result = mysql_query($query);
if (!$result) {
	die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysql_fetch_assoc($result)){
  // ADD TO XML DOCUMENT NODE
  echo '<marker ';
  echo 'id="' . parseToXML($row['id']) . '" ';
  echo 'postcode="' . parseToXML($row['postcode']) . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo 'reviewChoice="' . $row['reviewChoice'] . '" ';
  echo 'username="' . $row['username'] . '" ';
  echo 'date="' . $row['date'] . '" ';
  echo 'reviewType="' . $row['reviewType'] . '" ';
  echo 'OtherType="' . $row['OtherType'] . '" ';
  echo 'ProductMakeAndModel="' . $row['ProductMakeAndModel'] . '" ';
  echo 'ProductYearPurchasedFitted="' . $row['ProductYearPurchasedFitted'] . '" ';
  echo 'ProductIsRecommended="' . $row['ProductIsRecommended'] . '" ';
  echo 'ProductRecommendationExplanation="' . $row['ProductRecommendationExplanation'] . '" ';
  echo 'ProductRating="' . $row['ProductRating'] . '" ';
  echo 'ProductEmphasis="' . $row['ProductEmphasis'] . '" ';
  echo 'InstalledById="' . $row['InstalledById'] . '" ';
  echo 'CompanyName="' . $row['CompanyName'] . '" ';
  echo 'CompanyIsMCSCertified="' . $row['CompanyIsMCSCertified'] . '" ';
  echo 'CompanyMCS="' . $row['CompanyMCS'] . '" ';
  echo 'CompanyIsRecommended="' . $row['CompanyIsRecommended'] . '" ';
  echo 'CompanyRecommendationExplanation="' . $row['CompanyRecommendationExplanation'] . '" ';
  echo 'CompanyRating="' . $row['CompanyRating'] . '" ';
  echo 'Cost="' . $row['Cost'] . '" ';
  echo 'CostDoNotKnow="' . $row['CostDoNotKnow'] . '" ';
  //echo 'Grant="' . $row['Grant'] . '" ';
  echo 'GrantType="' . $row['GrantType'] . '" ';
  echo 'ReviewImpact="' . $row['ReviewImpact'] . '" ';
  echo 'ReviewCostEfficiencyAssessmentId="' . $row['ReviewCostEfficiencyAssessmentId'] . '" ';
  echo 'HouseholdPropertyTypeId="' . $row['HouseholdPropertyTypeId'] . '" ';
  echo 'HouseholdPropertyAge="' . $row['HouseholdPropertyAge'] . '" ';
  echo 'HouseholdConstructionType="' . $row['HouseholdConstructionType'] . '" ';
  echo 'HouseholdHasDoubleGlazing="' . $row['HouseholdHasDoubleGlazing'] . '" ';
  echo 'HouseholdHasLoftInsulation="' . $row['HouseholdHasLoftInsulation'] . '" ';
  echo 'HouseholdHasWallInsulation="' . $row['HouseholdHasWallInsulation'] . '" ';
  echo 'HouseholdBedrooms="' . $row['HouseholdBedrooms'] . '" ';
  echo 'HouseholdTenureTypeId="' . $row['HouseholdTenureTypeId'] . '" ';
  echo 'HouseholdMembersNumber="' . $row['HouseholdMembersNumber'] . '" ';
  echo 'MoreExperienceHeatingMoreInfo="' . $row['MoreExperienceHeatingMoreInfo'] . '" ';
  echo '/>';
}
// End XML file
echo '</markers>';
?>