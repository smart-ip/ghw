<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>The TellUs Toolkit - Green Home Watch</title>
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
  <script language="javascript">
        /*
         * Set the value of the company star rating control.
         *
         */
        function heatingInstalledByValueSet() {
            var dropDownElement = document.getElementById('heatingInstalledByDropDown');
            
            var value = dropDownElement.options[dropDownElement.selectedIndex].value;		
    
            if (value != 0) {
                // Set the star rating for the company using jQuery.
                $('#companyHeatingRatingStarCount > input').rating('select', 0);
            }
        }
    
        /*
         * Toggles divs on/off.
         * Used by the Back, Next buttons.
         */
        function toggleDivs(hideDiv, showDiv) {
            var hideElement = document.getElementById(hideDiv);
            var showElement = document.getElementById(showDiv);
            
            hideElement.style.display = 'none';
            showElement.style.display = 'block';
        }
    
        /*
         * Toggles a Div on/off based on the value selected in a DropDown control.
         *
         */
        function toggleDivBasedOnDropDownValue(divId, dropDownControl, dropDownValue) {
            var divElement = document.getElementById(divId);
            var dropDownElement = document.getElementById(dropDownControl);
    
            var value = dropDownElement.options[dropDownElement.selectedIndex].value;
    
            if (value == dropDownValue) {
                // Show the div.
                divElement.style.display = 'block';
            }
            else {
                // Hide the div.
                divElement.style.display = 'none';
            }
        }
    
        /*
         * Toggles the otherPanel div on/off depending on the value selected in heatingTypeDropDown.
         *
         */
        function toggleOtherPanelDiv() {
            
            var divElement = document.getElementById('otherPanel');
            
            var dropDownElement = document.getElementById('heatingTypeDropDown');
    
            var value = dropDownElement.options[dropDownElement.selectedIndex].value;
    
            if (value == 31) {
                // This is the value (31) corresponding to literal value 'Other'.
                // Show the div.
                divElement.style.display = 'block';
            }
            else {
                // Hide the div.
                divElement.style.display = 'none';
            }
        }
        
        /** function toggleOtherPanelDiv(selectedType){
            if (selectedType == 'other'){
                document.getElementById('heatingTypeDropDown').style.display = 'block';
                divElement.style.display = 'block';
            } else{
                document.getElementById('heatingTypeDropDown').style.display = 'none';
            }
        } */
    
    </script>
  <section id="forms">
  <div class="row">
    <div class="span10 offset1">
      <!-- write the responses to the database -->
      <form class="form-horizontal well" id="review-heating-form" action="heating_submitted.php" method="post">
        <input type="hidden" id="review_type" name="reviewChoice" value="Heating" />
        <legend>Review a <em>heating</em> installation</legend>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div id="review-heating-form_es_" class="errorSummary" style="display:none">
          <p>Please fix the following input errors:</p>
          <ul>
            <li>dummy</li>
          </ul>
        </div>
        <!-- panel0 - Type of heating -->
        <div id="panel0" style="display: block">
          <!-- Product -->
          <hr/>
          <fieldset>
          <legend>About the heating</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_What_type_of_heating_do_you_want_to_review?">What type of heating do you want to review?</label>
            <!-- <input name="ReviewProxy[HeatingHeatingTypeId]" id="ReviewProxy_HeatingHeatingTypeId" type="text" /> -->
            <!--select id="heatingTypeDropDown" onchange="toggleDivBasedOnDropDownValue("otherPanel", "heatingTypeDropDown", "31");" name="ReviewProxy[HeatingHeatingTypeId]"-->
            <div class="controls">
              <select id="heatingTypeDropDown" onChange="toggleDivBasedOnDropDownValue('otherPanel', 'heatingTypeDropDown', 'Other');" name="reviewType">
                <option value="Gas - Condensing Boiler">Gas - Condensing Boiler</option>
                <option value="Gas - Non Condensing Boiler">Gas - Non Condensing Boiler</option>
                <option value="Oil">Oil</option>
                <option value="LPG">LPG</option>
                <option value="Electric">Electric</option>
                <option value="Air Source Heat Pump">Air Source Heat Pump</option>
                <option value="Ground Source Heat Pump">Ground Source Heat Pump</option>
                <option value="Biomass/Multifuel Space Heater (stove)">Biomass/Multifuel Space Heater (stove)</option>
                <option value="Biomass Boiler (attached to a central heating system)">Biomass Boiler (attached to a central heating system)</option>
                <option value="Solar Thermal Panels (for hot water)">Solar Thermal Panels (for hot water)</option>
                <option value="District Heating">District Heating</option>
                <option value="Micro CHP Boiler (combined heat and power)">Micro CHP Boiler (combined heat and power)</option>
                <option value="Other">Other</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HeatingHeatingTypeId_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group" id="otherPanel" style="display: none">
            <label class="control-label" for="ReviewProxy_Other">Other<br />
            [Please type in what]</label>
            <div class="controls">
              <!--input size="80" maxlength="255" name="ReviewProxy[OtherTypeHeatingOther]" id="ReviewProxy_OtherTypeHeatingOther" type="text" /-->
              <input class="input-xlarge" size="80" maxlength="255" name="OtherType" id="OtherType" type="text" />
              <div class="errorMessage" id="ReviewProxy_OtherTypeHeatingOther_em_" style="display:none"></div>
            </div>
          </div>
          <hr/>
          <div class="form-actions">
            <input onClick="toggleDivs('panel0', 'panel1')" name="yt0" type="button" value="Next" class="btn-primary" />
          </div>
          </fieldset>
        </div>
        <!-- panel0 -->
        <!-- panel1 About the product -->
        <div id="panel1" style="display: none">
          <!-- Product -->
          <hr/>
          <fieldset>
          <legend>About the product</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Product_make_and_model">Product make and model<br />
            type in to the box, e.g. Aga Ludlow multifuel stove]</label>
            <!-- input size="80" maxlength="150" name="ReviewProxy[ProductHeatingProductMakeAndModel]" id="ReviewProxy_ProductHeatingProductMakeAndModel" type="text" / -->
            <div class="controls">
              <input class="input-xlarge" size="80" maxlength="150" name="ProductMakeAndModel" id="ProductHeatingProductMakeAndModel" type="text" />
              <div class="errorMessage" id="ReviewProxy_ProductHeatingProductMakeAndModel_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Year_purchased_and_fitted">Year purchased and fitted</label>
            <!-- input name="ReviewProxy[ProductHeatingYearPurchasedFitted]" id="ReviewProxy_ProductHeatingYearPurchasedFitted" type="text" / -->
            <div class="controls">
              <input class="input-xlarge" name="ProductYearPurchasedFitted" id="ProductHeatingYearPurchasedFitted" type="text" />
              <div class="errorMessage" id="ReviewProxy_ProductHeatingYearPurchasedFitted_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Would_you_recommend_this_kind_of_heating_system_to_others?">Would you recommend this kind of heating system to others?</label>
            <div class="controls">
              <!-- <input name="ReviewProxy[ProductHeatingIsRecommended]" id="ReviewProxy_ProductHeatingIsRecommended" type="text" /> -->
              <!-- select name="ReviewProxy[ProductHeatingIsRecommended]" id="ReviewProxy_ProductHeatingIsRecommended" -->
              <select name="ProductIsRecommended" id="ProductHeatingIsRecommended">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_ProductHeatingIsRecommended_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Can_you_tell_us_why?">Can you tell us why?</label>
            <!-- input size="80" maxlength="255" name="ReviewProxy[ProductHeatingRecommendationExplanation]" id="ReviewProxy_ProductHeatingRecommendationExplanation" type="text" / -->
            <div class="controls">
              <input class="input-xlarge" size="80" maxlength="255" name="ProductRecommendationExplanation" id="ProductHeatingRecommendationExplanation" type="text" />
              <div class="errorMessage" id="ReviewProxy_ProductHeatingRecommendationExplanation_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Please_rate_this_product_by_its_overall_quality_-_(*)"><span class="required">*</span> Please rate this product by its overall quality</label>
            <!-- <input name="ReviewProxy[ProductHeatingRating]" id="ReviewProxy_ProductHeatingRating" type="text" /> -->
            <div class="controls"><span id="productHeatingRatingStarCount">
              <input id="productHeatingRatingStarCount_0" value="1" type="radio" name="ProductRating" />
              <input id="productHeatingRatingStarCount_1" value="2" type="radio" name="ProductRating" />
              <input id="productHeatingRatingStarCount_2" value="3" type="radio" name="ProductRating" />
              <input id="productHeatingRatingStarCount_3" value="4" type="radio" name="ProductRating" />
              <input id="productHeatingRatingStarCount_4" value="5" type="radio" name="ProductRating" />
              </span>
              <div class="errorMessage" id="ReviewProxy_ProductHeatingRating_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_In_your_experience,_what_would_you_like_to_emphasize_to_someone_considering_this_product?">In your experience, what would you like to emphasize to someone considering this product?</label>
            <div class="controls">
              <!-- input size="80" maxlength="255" name="ReviewProxy[ProductHeatingEmphasis]" id="ReviewProxy_ProductHeatingEmphasis" type="text" / -->
              <input size="80" maxlength="255" name="ProductEmphasis" id="ProductHeatingEmphasis" type="text" />
              <div class="errorMessage" id="ReviewProxy_ProductHeatingEmphasis_em_" style="display:none"></div>
            </div>
          </div>
          <hr/>
          <div class="row-buttons">
            <input onClick="toggleDivs('panel1', 'panel0')" name="yt1" type="button" value="Back" class="btn-primary" />
            <input onClick="toggleDivs('panel1', 'panel2')" name="yt2" type="button" value="Next" class="btn-primary" />
          </div>
          </fieldset>
        </div>
        <!-- panel1 -->
        <!-- panel2 About the installation/service -->
        <div id="panel2" style="display: none">
          <!-- Installation / Service -->
          <hr/>
          <fieldset>
          <legend>About the installation and service</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Who_installed_your_heating?">Who installed your heating?</label>
            <!-- <input name="ReviewProxy[HeatingInstalledById]" id="ReviewProxy_HeatingInstalledById" type="text" /> -->
            <!-- select id="heatingInstalledByDropDown" onclick="heatingInstalledByValueSet();" onchange="toggleDivBasedOnDropDownValue("companyPanel", "heatingInstalledByDropDown", "0");" name="ReviewProxy[HeatingInstalledById]" -->
            <div class="controls">
              <select id="heatingInstalledByDropDown" onclick="heatingInstalledByValueSet();" onChange="toggleDivBasedOnDropDownValue('companyPanel', 'heatingInstalledByDropDown', 'A company installed it');" name="InstalledById">
                <option value="A company installed it">A company installed it</option>
                <option value="I installed it myself">I installed it myself</option>
                <option value="Do not know">Don&#039;t know</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HeatingInstalledById_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Type_in_name_of_installer/company">Type in name of installer/company</label>
            <!-- input size="80" maxlength="150" name="ReviewProxy[CompanyHeatingCompanyName]" id="ReviewProxy_CompanyHeatingCompanyName" type="text" / -->
            <div class="controls">
              <input size="80" maxlength="150" name="CompanyName" id="CompanyHeatingCompanyName" type="text" />
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingCompanyName_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Where_they_MCS_certified?">Is the company MCS certified?</label>
            <!--input name="ReviewProxy[CompanyHeatingIsMCSCertified]" id="ReviewProxy_CompanyHeatingIsMCSCertified" type="text" /-->
            <!-- select id="isMCSCertifiedDropDown" onchange="toggleDivBasedOnDropDownValue("mcsPanel", "isMCSCertifiedDropDown", "1");" name="ReviewProxy[CompanyHeatingIsMCSCertified]" -->
            <div class="controls">
              <select id="isMCSCertifiedDropDown" onChange="toggleDivBasedOnDropDownValue('mcsPanel', 'isMCSCertifiedDropDown', 'Yes');" name="CompanyIsMCSCertified">
                <option value="Do not know">Don&#039;t know</option>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              &nbsp; &nbsp;
              <p class="help-block"><a class="tooltip" href="http://www.microgenerationcertification.org/" target="_blank">What is MCS?<span class="custom help"><img src="../images/Help.png" alt="Help" height="48" width="48" /><em>What is MCS?</em>Microgeneration Certification Scheme (MCS) is an internationally recognised quality assurance scheme, supported by the Department of Energy and Climate Change. MCS certifies microgeneration technologies used to produce electricity and heat from renewable sources. MCS is also an eligibility requirement for the Government's financial incentives, which include the Feed-in Tariff and the Renewable Heat Incentive.</span></a></p>
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingIsMCSCertified_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_If_yes,_please_provide_MCS_number_of_the_installation">If yes, please provide the MCS number of the installation<br />
            </label>
            <!--input size="9" maxlength="9" name="ReviewProxy[CompanyHeatingMCS]" id="ReviewProxy_CompanyHeatingMCS" type="text" /-->
            <div class="controls"> <b>MCS</b>
              <input size="9" maxlength="9" name="CompanyMCS" id="CompanyHeatingMCS" type="text" />
              <p class="help-block"><small>[type in to the box, 8 digits followed by a letter, eg: 85372246C]</small></p>
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingMCS_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Would_you_recommend_them_to_others?">Would you recommend them to others?</label>
            <!-- <input name="ReviewProxy[CompanyHeatingIsRecommended]" id="ReviewProxy_CompanyHeatingIsRecommended" type="text" /> -->
            <!-- select name="ReviewProxy[CompanyHeatingIsRecommended]" id="ReviewProxy_CompanyHeatingIsRecommended" -->
            <div class="controls">
              <select name="CompanyIsRecommended" id="CompanyHeatingIsRecommended">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingIsRecommended_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Can_you_tell_us_why?">Can you tell us why?</label>
            <!--input size="80" maxlength="255" name="ReviewProxy[CompanyHeatingRecommendationExplanation]" id="ReviewProxy_CompanyHeatingRecommendationExplanation" type="text" /-->
            <div class="controls">
              <input size="80" maxlength="255" name="CompanyRecommendationExplanation" id="CompanyHeatingRecommendationExplanation" type="text" />
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingRecommendationExplanation_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Please_rate_your_overall_experience_with_this_company_-_(*)"><span class="required">*</span> Please rate your overall experience with this company</label>
            <!-- <input name="ReviewProxy[CompanyHeatingRating]" id="ReviewProxy_CompanyHeatingRating" type="text" /> -->
            <div class="controls"><span id="companyHeatingRatingStarCount">
              <input id="companyHeatingRatingStarCount_0" value="1" type="radio" name="CompanyRating" />
              <input id="companyHeatingRatingStarCount_1" value="2" type="radio" name="CompanyRating" />
              <input id="companyHeatingRatingStarCount_2" value="3" type="radio" name="CompanyRating" />
              <input id="companyHeatingRatingStarCount_3" value="4" type="radio" name="CompanyRating" />
              <input id="companyHeatingRatingStarCount_4" value="5" type="radio" name="CompanyRating" />
              </span>
              <div class="errorMessage" id="ReviewProxy_CompanyHeatingRating_em_" style="display:none"></div>
            </div>
          </div>
          <hr/>
          <div class="row-buttons">
            <input onClick="toggleDivs('panel2', 'panel1')" name="yt3" type="button" value="Back" class="btn-primary" />
            <input onClick="toggleDivs('panel2', 'panel3')" name="yt4" type="button" value="Next" class="btn-primary" />
          </div>
          </fieldset>
        </div>
        <!-- panel2 -->
        <!-- panel3 Costs and quality of life -->
        <div id="panel3" style="display: none">
          <!-- Cost -->
          <hr/>
          <fieldset>
          <legend>Costs</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Total_cost_of_installation_and_equipment">Total cost of installation and equipment</label>
            <!-- input name="ReviewProxy[HeatingCost]" id="ReviewProxy_HeatingCost" type="text" /-->
            <div class="controls">
              <input name="Cost" id="HeatingCost" type="text" />
              <p class="help-block"><small>[please type in cost in pounds &pound;, eg: 800]</small></p>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_pay">I don't know / didn't pay for it myself</label>
            <div class="controls">
              <label class="optionsRadio">
              <input id="CostDoNotKnow" value="Do not know" type="radio"  name="CostDoNotKnow" />
              </label>
              <div class="errorMessage" id="ReviewProxy_HeatingCost_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="">Did you access a grant or a government incentive, such as the Green Deal?"</label>
            <!--input id="Yes" value="Yes" type="radio" name="Grant" />
              Yes>
              <input id="No" value="No" type="radio" name="Grant" />
              No <br /-->
            <div class="controls">
              <textarea width="120" maxlength="5000" name="GrantType" id="GrantType"></textarea>
              <p class="help-block"><small>[If yes, please type name of grant here]</small></p>
            </div>
          </div>
          <!-- Impact on quality of life -->
          <br/>
          <legend>Impact on quality of life</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_How,_if_at_all,_has_this_heating_system_impacted_on_you_or_your_family_&#039;s_quality_of_life_or_wellbeing?">How, if at all, has this heating system impacted on you or your family's quality of life or wellbeing?</label>
            <!-- input size="80" maxlength="255" name="ReviewProxy[ReviewImpact]" id="ReviewProxy_ReviewImpact" type="text" /-->
            <div class="controls">
              <input size="80" maxlength="255" name="ReviewImpact" id="ReviewImpact" type="text" />
              <p class="help-block"><small>[such as: being more comfortable, or feeling healthier]</small></p>
              <div class="errorMessage" id="ReviewProxy_ReviewImpact_em_" style="display:none"></div>
            </div>
          </div>
          <!-- Running costs and efficiency -->
          <br/>
          <legend>Running costs and efficieny</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Allowing_for_inflation_in_energy_prices,_do_you_think_the_heating_system_is_saving_energy_and_therefore_money?">Allowing for inflation in energy prices, do you think the heating system is saving energy and therefore money?</label>
            <!-- <input name="ReviewProxy[ReviewCostEfficiencyAssessmentId]" id="ReviewProxy_ReviewCostEfficiencyAssessmentId" type="text" /> -->
            <!--select name="ReviewProxy[ReviewCostEfficiencyAssessmentId]" id="ReviewProxy_ReviewCostEfficiencyAssessmentId"-->
            <div class="controls">
              <select name="ReviewCostEfficiencyAssessmentId" id="ReviewCostEfficiencyAssessmentId">
                <option value="Do not know">Don't know</option>
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_ReviewCostEfficiencyAssessmentId_em_" style="display:none"></div>
            </div>
          </div>
          <hr />
          <div class="row-buttons">
            <input onClick="toggleDivs('panel3', 'panel2')" name="yt5" type="button" value="Back" class="btn-primary" />
            <input onClick="toggleDivs('panel3', 'panel4')" name="yt6" type="button" value="Next" class="btn-primary" />
          </div>
          </fieldset>
        </div>
        <!-- panel3 -->
        <!-- panel4 Household -->
        <div id="panel4" style="display: none">
          <!-- Household -->
          <hr/>
          <fieldset>
          <legend>Please help make this review better by providing some background information</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Type_of_property">Type of property</label>
            <!-- <input name="ReviewProxy[HouseholdPropertyTypeId]" id="ReviewProxy_HouseholdPropertyTypeId" type="text" /> -->
            <!--select name="ReviewProxy[HouseholdPropertyTypeId]" id="ReviewProxy_HouseholdPropertyTypeId"-->
            <div class="controls">
              <select name="HouseholdPropertyTypeId" id="HouseholdPropertyTypeId">
                <option value="Do not know">Don't know</option>
                <option value=" "></option>
                <option value="Detached">Detached</option>
                <option value="Semi Detached">Semi Detached</option>
                <option value="Terraced">Terraced</option>
                <option value="erraced Back to Back">Terraced Back to Back</option>
                <option value="Purpose Built Flat">Purpose Built Flat</option>
                <option value="Converted Flat">Converted Flat</option>
                <option value="Other">Other</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdPropertyTypeId_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Age_of_property">Age of property</label>
            <!-- <input name="ReviewProxy[HouseholdPropertyAgeId]" id="ReviewProxy_HouseholdPropertyAgeId" type="text" /> -->
            <!-- select name="ReviewProxy[HouseholdPropertyAgeId]" id="ReviewProxy_HouseholdPropertyAgeId" -->
            <div class="controls">
              <select name="HouseholdPropertyAge" id="HouseholdPropertyAge">
                <option value="Do not know">Don't know</option>
                <option value=""></option>
                <option value="Pre 1919"> Pre 1919</option>
                <option value="1919-1944">1919-1944</option>
                <option value="1945-1964">1945-1964</option>
                <option value="1965-1980">1965-1980</option>
                <option value="1981-1990">1981-1990</option>
                <option value="Post 1990">Post 1990</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdPropertyAgeId_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Construction_type">Construction type</label>
            <!-- <input name="ReviewProxy[HouseholdConstructionTypeId]" id="ReviewProxy_HouseholdConstructionTypeId" type="text" /> -->
            <!--select name="ReviewProxy[HouseholdConstructionTypeId]" id="ReviewProxy_HouseholdConstructionTypeId"-->
            <div class="controls">
              <select name="HouseholdConstructionType" id="HouseholdConstructionType">
                <option value="Do not know">Don't know</option>
                <option value=""></option>
                <option value="Masonry Cavity">Masonry Cavity</option>
                <option value="Solid Masonry">Solid Masonry</option>
                <option value="Timber Framed">Timber Framed</option>
                <option value="Other">Other</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdConstructionTypeId_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Have_you_got_double_glazing?">Have you got double glazing?</label>
            <!-- <input name="ReviewProxy[HouseholdHasDoubleGlazing]" id="ReviewProxy_HouseholdHasDoubleGlazing" type="text" /> -->
            <!-- select name="ReviewProxy[HouseholdHasDoubleGlazing]" id="ReviewProxy_HouseholdHasDoubleGlazing"-->
            <div class="controls">
              <select name="HouseholdHasDoubleGlazing" id="HouseholdHasDoubleGlazing">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
                <option value="Partial">Partial</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdHasDoubleGlazing_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Have_you_got_loft_insulation?">Have you got loft insulation?</label>
            <!-- <input name="ReviewProxy[HouseholdHasLoftInsulation]" id="ReviewProxy_HouseholdHasLoftInsulation" type="text" /> -->
            <!--select name="ReviewProxy[HouseholdHasLoftInsulation]" id="ReviewProxy_HouseholdHasLoftInsulation"-->
            <div class="controls">
              <select name="HouseholdHasLoftInsulation" id="HouseholdHasLoftInsulation">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdHasLoftInsulation_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Have_you_got_wall_insulation?_(cavity_or_solid)">Have you got wall insulation? (cavity or solid)</label>
            <!-- <input name="ReviewProxy[HouseholdHasWallInsulation]" id="ReviewProxy_HouseholdHasWallInsulation" type="text" /> -->
            <!--select name="ReviewProxy[HouseholdHasWallInsulation]" id="ReviewProxy_HouseholdHasWallInsulation"-->
            <div class="controls">
              <select name="HouseholdHasWallInsulation" id="HouseholdHasWallInsulation">
                <option value="No">No</option>
                <option value="Yes">Yes</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdHasWallInsulation_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Number_of_bedrooms">Number of bedrooms</label>
            <!--input name="ReviewProxy[HouseholdBedrooms]" id="ReviewProxy_HouseholdBedrooms" type="text" /-->
            <div class="controls">
              <input name="HouseholdBedrooms" id="HouseholdBedrooms" type="text" />
              <div class="errorMessage" id="ReviewProxy_HouseholdBedrooms_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Tenure">Tenure</label>
            <!-- <input name="ReviewProxy[HouseholdTenureTypeId]" id="ReviewProxy_HouseholdTenureTypeId" type="text" /> -->
            <!--select name="ReviewProxy[HouseholdTenureTypeId]" id="ReviewProxy_HouseholdTenureTypeId"-->
            <div class="controls">
              <select name="HouseholdTenureTypeId" id="HouseholdTenureTypeId">
                <option value="none"></option>
                <option value="Owner Occupied">Owner Occupied</option>
                <option value="Privately Rented">Privately Rented</option>
                <option value="Socially Rented">Socially Rented</option>
                <option value="Part Ownership">Part Ownership</option>
                <option value="Other">Other</option>
              </select>
              <div class="errorMessage" id="ReviewProxy_HouseholdTenureTypeId_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Number_of_people_in_your_household">Number of people in your household</label>
            <!--input name="ReviewProxy[HouseholdMembersNumber]" id="ReviewProxy_HouseholdMembersNumber" type="text" /-->
            <div class="controls">
              <input name="HouseholdMembersNumber" id="HouseholdMembersNumber" type="text" />
              <div class="errorMessage" id="ReviewProxy_HouseholdMembersNumber_em_" style="display:none"></div>
            </div>
          </div>
          <hr/>
          <div class="row-buttons">
            <input onClick="toggleDivs('panel4', 'panel3')" name="yt7" type="button" value="Back" class="btn-primary" />
            <input onClick="toggleDivs('panel4', 'panel5')" name="yt8" type="button" value="Next" class="btn-primary" />
          </div>
          </fieldset>
        </div>
        <!-- panel4 -->
        <!-- panel5 Location and personal information -->
        <div id="panel5" style="display: none">
          <!-- Postcode -->
          <hr/>
          <legend>Location and personal information </legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Please_give_4_first_digits_of_your_postcode,_this_will_help_to_locate_your_review_-_(*)">Your postcode <span class="required">*</span></label>
            <!--input size="5" maxlength="5" name="ReviewProxy[ReviewPostcode]" id="ReviewProxy_ReviewPostcode" type="text" /-->
            <div class="controls">
              <input size="8" maxlength="8" name="postcode" id="postcode" type="text" />
              <p class="help-block"><small>[Please tell us your postcode so we can locate your review for others to see.]</small></p>
              <div class="errorMessage" id="ReviewProxy_ReviewPostcode_em_" style="display:none"></div>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Please_provide_a_username_in_case_you_want_to_identify_your_review">Please provide a username in case you want to identify your review</label>
            <div class="controls">
              <!--input size="20" maxlength="20" name="ReviewProxy[ReviewUsername]" id="ReviewProxy_ReviewUsername" type="text" /-->
              <input size="20" maxlength="20" name="username" id="username" type="text" />
              <p class="help-block"><small>[The username you provide will be converted to lowercase characters]</small></p>
              <div class="errorMessage" id="ReviewProxy_ReviewUsername_em_" style="display:none"></div>
            </div>
          </div>
          <!-- More information -->
          <legend>Share tips and other information</legend>
          <div class="control-group">
            <label class="control-label" for="ReviewProxy_Have_you_got_any_usefull_resources,_such_as_web_links_or_other_information_sources,_to_share_with_others?">Have you got any usefull resources, such as web links or other information sources, to share with others?</label>
            <!--textarea width="120" maxlength="5000" name="ReviewProxy[MoreExperienceHeatingMoreInfo]" id="ReviewProxy_MoreExperienceHeatingMoreInfo"></textarea-->
            <div class="controls">
              <textarea width="220" maxlength="5000" name="MoreExperienceHeatingMoreInfo" id="MoreExperienceHeatingMoreInfo"></textarea>
              <div class="errorMessage" id="ReviewProxy_MoreExperienceHeatingMoreInfo_em_" style="display:none"></div>
            </div>
          </div>
          <hr/>
          <p class="help-block"><small>Click the submit button to send the information of your heating installation review. Our system will validate the information provided and if errors occur (missing required fields or invalid values), you will be redirected back to the first page of the review. Follow the pages one by one and correct any errors found there marked in red.</small></p>
          <div class="row-buttons">
            <input onClick="toggleDivs('panel5', 'panel4')" name="yt9" type="button" value="Back" class="btn-primary" />
            <input type="submit" name="yt10" value="Submit" class="btn-primary" />
          </div>
        </div>
      </form>
    </div>
    <!-- form -->
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
<!-- Javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery_002.js"></script>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootswatch.js"></script>
<script type="text/javascript">/*<![CDATA[*/
jQuery(function($) {
jQuery('#productHeatingRatingStarCount > input').rating({'required':true});
jQuery('#companyHeatingRatingStarCount > input').rating({'required':true});
//$('#review-heating-form').yiiactiveform({'attributes':[{'id':'ReviewProxy_HeatingHeatingTypeId','inputID':'ReviewProxy_HeatingHeatingTypeId','errorID':'ReviewProxy_HeatingHeatingTypeId_em_','model':'ReviewProxy','name':'HeatingHeatingTypeId','enableAjaxValidation':true},{'id':'ReviewProxy_OtherTypeHeatingOther','inputID':'ReviewProxy_OtherTypeHeatingOther','errorID':'ReviewProxy_OtherTypeHeatingOther_em_','model':'ReviewProxy','name':'OtherTypeHeatingOther','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingProductMakeAndModel','inputID':'ReviewProxy_ProductHeatingProductMakeAndModel','errorID':'ReviewProxy_ProductHeatingProductMakeAndModel_em_','model':'ReviewProxy','name':'ProductHeatingProductMakeAndModel','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingYearPurchasedFitted','inputID':'ReviewProxy_ProductHeatingYearPurchasedFitted','errorID':'ReviewProxy_ProductHeatingYearPurchasedFitted_em_','model':'ReviewProxy','name':'ProductHeatingYearPurchasedFitted','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingIsRecommended','inputID':'ReviewProxy_ProductHeatingIsRecommended','errorID':'ReviewProxy_ProductHeatingIsRecommended_em_','model':'ReviewProxy','name':'ProductHeatingIsRecommended','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingRecommendationExplanation','inputID':'ReviewProxy_ProductHeatingRecommendationExplanation','errorID':'ReviewProxy_ProductHeatingRecommendationExplanation_em_','model':'ReviewProxy','name':'ProductHeatingRecommendationExplanation','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingRating','inputID':'ReviewProxy_ProductHeatingRating','errorID':'ReviewProxy_ProductHeatingRating_em_','model':'ReviewProxy','name':'ProductHeatingRating','enableAjaxValidation':true},{'id':'ReviewProxy_ProductHeatingEmphasis','inputID':'ReviewProxy_ProductHeatingEmphasis','errorID':'ReviewProxy_ProductHeatingEmphasis_em_','model':'ReviewProxy','name':'ProductHeatingEmphasis','enableAjaxValidation':true},{'id':'ReviewProxy_HeatingInstalledById','inputID':'ReviewProxy_HeatingInstalledById','errorID':'ReviewProxy_HeatingInstalledById_em_','model':'ReviewProxy','name':'HeatingInstalledById','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingCompanyName','inputID':'ReviewProxy_CompanyHeatingCompanyName','errorID':'ReviewProxy_CompanyHeatingCompanyName_em_','model':'ReviewProxy','name':'CompanyHeatingCompanyName','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingIsMCSCertified','inputID':'ReviewProxy_CompanyHeatingIsMCSCertified','errorID':'ReviewProxy_CompanyHeatingIsMCSCertified_em_','model':'ReviewProxy','name':'CompanyHeatingIsMCSCertified','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingMCS','inputID':'ReviewProxy_CompanyHeatingMCS','errorID':'ReviewProxy_CompanyHeatingMCS_em_','model':'ReviewProxy','name':'CompanyHeatingMCS','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingIsRecommended','inputID':'ReviewProxy_CompanyHeatingIsRecommended','errorID':'ReviewProxy_CompanyHeatingIsRecommended_em_','model':'ReviewProxy','name':'CompanyHeatingIsRecommended','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingRecommendationExplanation','inputID':'ReviewProxy_CompanyHeatingRecommendationExplanation','errorID':'ReviewProxy_CompanyHeatingRecommendationExplanation_em_','model':'ReviewProxy','name':'CompanyHeatingRecommendationExplanation','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyHeatingRating','inputID':'ReviewProxy_CompanyHeatingRating','errorID':'ReviewProxy_CompanyHeatingRating_em_','model':'ReviewProxy','name':'CompanyHeatingRating','enableAjaxValidation':true},{'id':'ReviewProxy_HeatingCost','inputID':'ReviewProxy_HeatingCost','errorID':'ReviewProxy_HeatingCost_em_','model':'ReviewProxy','name':'HeatingCost','enableAjaxValidation':true},{'id':'ReviewProxy_ReviewImpact','inputID':'ReviewProxy_ReviewImpact','errorID':'ReviewProxy_ReviewImpact_em_','model':'ReviewProxy','name':'ReviewImpact','enableAjaxValidation':true},{'id':'ReviewProxy_ReviewCostEfficiencyAssessmentId','inputID':'ReviewProxy_ReviewCostEfficiencyAssessmentId','errorID':'ReviewProxy_ReviewCostEfficiencyAssessmentId_em_','model':'ReviewProxy','name':'ReviewCostEfficiencyAssessmentId','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdPropertyTypeId','inputID':'ReviewProxy_HouseholdPropertyTypeId','errorID':'ReviewProxy_HouseholdPropertyTypeId_em_','model':'ReviewProxy','name':'HouseholdPropertyTypeId','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdPropertyAgeId','inputID':'ReviewProxy_HouseholdPropertyAgeId','errorID':'ReviewProxy_HouseholdPropertyAgeId_em_','model':'ReviewProxy','name':'HouseholdPropertyAgeId','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdConstructionTypeId','inputID':'ReviewProxy_HouseholdConstructionTypeId','errorID':'ReviewProxy_HouseholdConstructionTypeId_em_','model':'ReviewProxy','name':'HouseholdConstructionTypeId','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdHasDoubleGlazing','inputID':'ReviewProxy_HouseholdHasDoubleGlazing','errorID':'ReviewProxy_HouseholdHasDoubleGlazing_em_','model':'ReviewProxy','name':'HouseholdHasDoubleGlazing','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdHasLoftInsulation','inputID':'ReviewProxy_HouseholdHasLoftInsulation','errorID':'ReviewProxy_HouseholdHasLoftInsulation_em_','model':'ReviewProxy','name':'HouseholdHasLoftInsulation','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdHasWallInsulation','inputID':'ReviewProxy_HouseholdHasWallInsulation','errorID':'ReviewProxy_HouseholdHasWallInsulation_em_','model':'ReviewProxy','name':'HouseholdHasWallInsulation','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdBedrooms','inputID':'ReviewProxy_HouseholdBedrooms','errorID':'ReviewProxy_HouseholdBedrooms_em_','model':'ReviewProxy','name':'HouseholdBedrooms','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdTenureTypeId','inputID':'ReviewProxy_HouseholdTenureTypeId','errorID':'ReviewProxy_HouseholdTenureTypeId_em_','model':'ReviewProxy','name':'HouseholdTenureTypeId','enableAjaxValidation':true},{'id':'ReviewProxy_HouseholdMembersNumber','inputID':'ReviewProxy_HouseholdMembersNumber','errorID':'ReviewProxy_HouseholdMembersNumber_em_','model':'ReviewProxy','name':'HouseholdMembersNumber','enableAjaxValidation':true},{'id':'ReviewProxy_ReviewPostcode','inputID':'ReviewProxy_ReviewPostcode','errorID':'ReviewProxy_ReviewPostcode_em_','model':'ReviewProxy','name':'ReviewPostcode','enableAjaxValidation':true},{'id':'ReviewProxy_ReviewUsername','inputID':'ReviewProxy_ReviewUsername','errorID':'ReviewProxy_ReviewUsername_em_','model':'ReviewProxy','name':'ReviewUsername','enableAjaxValidation':true},{'id':'ReviewProxy_MoreExperienceHeatingMoreInfo','inputID':'ReviewProxy_MoreExperienceHeatingMoreInfo','errorID':'ReviewProxy_MoreExperienceHeatingMoreInfo_em_','model':'ReviewProxy','name':'MoreExperienceHeatingMoreInfo','enableAjaxValidation':true},{'id':'ReviewProxy_OtherTypeInsulationOther','inputID':'ReviewProxy_OtherTypeInsulationOther','errorID':'ReviewProxy_OtherTypeInsulationOther_em_','model':'ReviewProxy','name':'OtherTypeInsulationOther','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationProductMakeAndModel','inputID':'ReviewProxy_ProductInsulationProductMakeAndModel','errorID':'ReviewProxy_ProductInsulationProductMakeAndModel_em_','model':'ReviewProxy','name':'ProductInsulationProductMakeAndModel','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationYearPurchasedFitted','inputID':'ReviewProxy_ProductInsulationYearPurchasedFitted','errorID':'ReviewProxy_ProductInsulationYearPurchasedFitted_em_','model':'ReviewProxy','name':'ProductInsulationYearPurchasedFitted','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationIsRecommended','inputID':'ReviewProxy_ProductInsulationIsRecommended','errorID':'ReviewProxy_ProductInsulationIsRecommended_em_','model':'ReviewProxy','name':'ProductInsulationIsRecommended','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationRecommendationExplanation','inputID':'ReviewProxy_ProductInsulationRecommendationExplanation','errorID':'ReviewProxy_ProductInsulationRecommendationExplanation_em_','model':'ReviewProxy','name':'ProductInsulationRecommendationExplanation','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationRating','inputID':'ReviewProxy_ProductInsulationRating','errorID':'ReviewProxy_ProductInsulationRating_em_','model':'ReviewProxy','name':'ProductInsulationRating','enableAjaxValidation':true},{'id':'ReviewProxy_ProductInsulationEmphasis','inputID':'ReviewProxy_ProductInsulationEmphasis','errorID':'ReviewProxy_ProductInsulationEmphasis_em_','model':'ReviewProxy','name':'ProductInsulationEmphasis','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationCompanyName','inputID':'ReviewProxy_CompanyInsulationCompanyName','errorID':'ReviewProxy_CompanyInsulationCompanyName_em_','model':'ReviewProxy','name':'CompanyInsulationCompanyName','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationIsMCSCertified','inputID':'ReviewProxy_CompanyInsulationIsMCSCertified','errorID':'ReviewProxy_CompanyInsulationIsMCSCertified_em_','model':'ReviewProxy','name':'CompanyInsulationIsMCSCertified','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationMCS','inputID':'ReviewProxy_CompanyInsulationMCS','errorID':'ReviewProxy_CompanyInsulationMCS_em_','model':'ReviewProxy','name':'CompanyInsulationMCS','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationIsRecommended','inputID':'ReviewProxy_CompanyInsulationIsRecommended','errorID':'ReviewProxy_CompanyInsulationIsRecommended_em_','model':'ReviewProxy','name':'CompanyInsulationIsRecommended','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationRecommendationExplanation','inputID':'ReviewProxy_CompanyInsulationRecommendationExplanation','errorID':'ReviewProxy_CompanyInsulationRecommendationExplanation_em_','model':'ReviewProxy','name':'CompanyInsulationRecommendationExplanation','enableAjaxValidation':true},{'id':'ReviewProxy_CompanyInsulationRating','inputID':'ReviewProxy_CompanyInsulationRating','errorID':'ReviewProxy_CompanyInsulationRating_em_','model':'ReviewProxy','name':'CompanyInsulationRating','enableAjaxValidation':true},{'id':'ReviewProxy_MoreExperienceInsulationMoreInfo','inputID':'ReviewProxy_MoreExperienceInsulationMoreInfo','errorID':'ReviewProxy_MoreExperienceInsulationMoreInfo_em_','model':'ReviewProxy','name':'MoreExperienceInsulationMoreInfo','enableAjaxValidation':true},{'id':'ReviewProxy_InsulationInsulationTypeId','inputID':'ReviewProxy_InsulationInsulationTypeId','errorID':'ReviewProxy_InsulationInsulationTypeId_em_','model':'ReviewProxy','name':'InsulationInsulationTypeId','enableAjaxValidation':true},{'id':'ReviewProxy_InsulationInstalledById','inputID':'ReviewProxy_InsulationInstalledById','errorID':'ReviewProxy_InsulationInstalledById_em_','model':'ReviewProxy','name':'InsulationInstalledById','enableAjaxValidation':true},{'id':'ReviewProxy_InsulationCost','inputID':'ReviewProxy_InsulationCost','errorID':'ReviewProxy_InsulationCost_em_','model':'ReviewProxy','name':'InsulationCost','enableAjaxValidation':true}],'summaryID':'review-heating-form_es_'});
});
/*]]>*/
</script>
</body>
</html>
