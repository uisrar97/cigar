<section class="breadcrumnb">
<div class="container">
<ol itemscope="" itemtype="http://schema.org/BreadcrumbList" class="clearfix">
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><a href="index.html" itemprop="item"><span itemprop="name">Home</span></a></li>
<li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem"><span itemprop="name">Gift Registry</span></li>
</ol>
</div>
</section>

<section class="giftregistryHome page_header">
<div class="container">
<h1 class="page_heading">Gift Registry</h1>

<div class="category-header" id="giftregistryHomeHeader">Search for your friend's Gift Registry or create your own.</div>

</div>
</section>


<section id="giftregistryHome" class="giftregistryHome-page-content page-content">
<div class="container">
<div class="row">
<div class="content-area col-lg-12">
<form action="http://cigar-venue-preview-com.3dcartstores.com/giftregistry_home.asp" name="frmForm" id="frmForm" method="post">
<input type="hidden" name="action" id="action" value="">
<input type="hidden" name="intCustId" id="intCustId" value="">


<div class="row">
<div class="registryInfo col-lg-12">
<div class="header clearfix">
 <h4 class="page_heading">My Gift Registry</h4>
</div>
</div>
<div class="home-create-registry col-lg-12"><b>Would you like to create your own Gift Registry?</b><br> Please click on the create my gift registry button.</div>
<div class="create-registry-button col-lg-12">
<button type="button" class="btn btn-primary" onclick="window.location='giftregistry_edit.html';">Create My Gift Registry</button>
</div>
</div>


<div class="row">
<div class="registryInfo col-lg-12">
<div class="header clearfix">
<h4 class="page_heading">Search a Friend's Registry</h4>
</div>
</div>
<div class="giftRegistrySearch col-lg-6">
<div class="row">
<div class="giftregField col-md-12">
<div class="Registry_Name">
<label for="txtRegName"><i class="icon-gift-1"></i> Registry Name</label>
<input type="text" id="txtRegName" name="txtRegName" value="" tabindex="1" class="form-control txtBoxStyle">
</div>
</div>
</div>
<div class="row">
<div class="giftregField col-sm-6">
<div class="txtRegFirstName">
<label for="txtRegFirstName"><i class="icon-user"></i> First Name</label>
<input type="text" id="txtRegFirstName" name="txtRegFirstName" value="" tabindex="5" class="txtBoxStyle form-control">
</div>
</div>
<div class="giftregField col-sm-6">
<div class="txtRegLastName">
<label for="txtRegLastName"><i class="icon-user"></i> Last Name</label>
<input type="text" id="txtRegLastName" name="txtRegLastName" value="" tabindex="6" class="txtBoxStyle form-control">
</div>
</div>
<div class="clearfix"></div>
</div>
<div class="row">
<div class="giftregField col-sm-12">
<div class="Registry_Date">
<label for="drpRegDate"><i class="icon-calendar-check-o"></i> Event</label>
<div class="row smallrow">
<div class="smallcol col-sm-4">
<select name="drpRegMonth" id="drpRegMonth" tabindex="2" class="txtBoxStyle form-control">
<option value="">Month</option>

<option value="1" [selected]="">January</option>
<option value="2" [selected]="">February</option>
<option value="3" [selected]="">March</option>
<option value="4" [selected]="">April</option>
<option value="5" [selected]="">May</option>
<option value="6" [selected]="">June</option>
<option value="7" [selected]="">July</option>
<option value="8" [selected]="">August</option>
<option value="9" [selected]="">September</option>
<option value="10" [selected]="">October</option>
<option value="11" [selected]="">November</option>
<option value="12" [selected]="">December</option>

</select>
</div>
<div class="smallcol col-sm-4">
<select name="drpRegDay" id="drpRegDay" tabindex="3" class="txtBoxStyle form-control">
<option value="">Day</option>

<option value="1" [selected]="">1</option>
<option value="2" [selected]="">2</option>
<option value="3" [selected]="">3</option>
<option value="4" [selected]="">4</option>
<option value="5" [selected]="">5</option>
<option value="6" [selected]="">6</option>
<option value="7" [selected]="">7</option>
<option value="8" [selected]="">8</option>
<option value="9" [selected]="">9</option>
<option value="10" [selected]="">10</option>
<option value="11" [selected]="">11</option>
<option value="12" [selected]="">12</option>
<option value="13" [selected]="">13</option>
<option value="14" [selected]="">14</option>
<option value="15" [selected]="">15</option>
<option value="16" [selected]="">16</option>
<option value="17" [selected]="">17</option>
<option value="18" [selected]="">18</option>
<option value="19" [selected]="">19</option>
<option value="20" [selected]="">20</option>
<option value="21" [selected]="">21</option>
<option value="22" [selected]="">22</option>
<option value="23" [selected]="">23</option>
<option value="24" [selected]="">24</option>
<option value="25" [selected]="">25</option>
<option value="26" [selected]="">26</option>
<option value="27" [selected]="">27</option>
<option value="28" [selected]="">28</option>
<option value="29" [selected]="">29</option>
<option value="30" [selected]="">30</option>
<option value="31" [selected]="">31</option>

</select>
</div>
<div class="smallcol col-sm-4">
<select name="drpRegYear" id="drpRegYear" tabindex="4" class="txtBoxStyle form-control">
<option value="">Year</option>
 
<option value="2019" [selected]="">2019</option>
<option value="2020" [selected]="">2020</option>
<option value="2021" [selected]="">2021</option>
<option value="2022" [selected]="">2022</option>
<option value="2023" [selected]="">2023</option>

</select>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="home-search-button col-sm-12">
<button type="button" name="cmdViewList" onclick="javascript:searchRegistry();" class="btn btn-primary">Search Registry</button>
</div>
</div>
</div>
</div>


</form>
<div class="clearfix"></div>

</div>
</div>
</div>
</section>