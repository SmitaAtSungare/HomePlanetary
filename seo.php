<!--SEO-->
<?php
include 'config.php';
$city = "";
if(isset($_POST['city']))
{  $city = $_POST['city']; }
else if(isset($_GET['city']))
{ $city = $_GET['city']; }
$category = "";
if(isset($_POST['searchid']))
{ $category = $_POST['searchid']; }
else if(isset($_GET['searchid']))
{ $category =$_GET['searchid']; }
$budget = "";
if(isset($_POST['budget']))
{ $budget = $_POST['budget']; }
else if(isset($_GET['budget']))
{ $budget = $_GET['budget']; }
$property_type = "";
if(isset($_POST['property_type']))
{ $property_type = $_POST['property_type']; }
else if(isset($_GET['property_type']))
{ $property_type = $_GET['property_type']; }
$bedroom = "";
if(isset($_POST['bedroom']))
{ $bedroom = $_POST['bedroom']; }
else if(isset($_GET['bedroom']))
{ $bedroom = $_GET['bedroom']; }
if($category !="")
{ $showcategory = " | ".$category; }
else
{ $showcategory =""; }
if($budget !="")
{ $showbudget = " | ".$budget; }
else
{ $showbudget =""; }
if($property_type !="")
{ $showproperty = " | ".$property_type." Property"; }
else
{ $showproperty =""; }
if($bedroom !="")
{ $showbedroom = " | ".$bedroom; }
else
{ $showbedroom ="";  }
$metatitle='';
$metakeyword='';
$metadesp='';
if(isset($_GET['id']) && ! empty($_GET['id']))
	{
		$stud_id = $_GET['id'];
		$qry = 'select * from add_posting where property_id = '.$stud_id;
		$res = $mysqli->query($qry);
		while( $row =  $res->fetch_array()){
			$pname = $row['property_name'];
			$add = $row['address']. ' ' .$row['locality']. ' ' .$row['city'];
			$loc = $row['locality'];
			$bed = $row['bedroom'];
			$ptype = $row['property_type'];
		}
		$metatitle=$pname. ' ' .$bed. ' ' .$ptype. ' apartment  in ' .$add." ";
		$metakeyword='Homeplanetary India’s Real Estate - ' .$pname. ' ' .$bed. ' ' .$ptype. ' apartment  in ' .$add;
		$metadesp=" Get Phone Numbers, Addresses, Services, Latest Reviews , Photos, Map , Ratings and more for ".$metakeyword." Visit Homeplanetary India";
	}
	$file = basename($_SERVER["PHP_SELF"],".php");
	$des = "";
	$keys = "";
	$title = "";
	$titles = array(
                'index' => 'List your Property for free | New Projects in different cities | Home',

                'aboutus' => 'List your Property for free | New Projects in different cities | About Us',

                'contact_us' => 'List your Property for free | New Projects in different cities. | Contact Us',

                'advertisewithus' => 'List your Property for free | New Projects in different cities. | Advertise with Us',

                'privacy_policy' => 'List your Property for free | New Projects in different cities. | Privacy Policy',

                'termsofuse' => 'List your Property for free | New Projects in different cities | Terms and Conditions',

                'sitemap' => 'List your Property for free | New Projects in different cities. | Sitemap',

                'userlogin' => 'List your Property for free | New Projects in different cities. | Login',

                'user_reg' => 'List your Property for free | New Projects in different cities. | Sign up',

                'addpost' => 'List your Property for free | New Projects in different cities | List Your Property',

                'property_listing' => ' New Projects in '.$city.$showcategory.$showbudget.$showbedroom.$showproperty,

                'my_ads' => 'List your Property for free | New Projects in different cities | Ads',

                'edit_my_ads' => 'List your Property for free | New Projects in different cities. | Edit Your Ads',

                'my_ads_replies' => 'List your Property for free | New Projects in different cities. | Ads Reply',

                'update_user_profile' => 'List your Property for free | New Projects in different cities. | Update Your Profile',

                'mainlisting_details' => $metatitle
		);
		
	
	$description = array(
                'index' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free | Advertise with us | Free ads.',

                'aboutus' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'contact_us' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free | For more information visit Homeplanetary.',

                'advertisewithus' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free | For Advertisement visit Homeplanetary',

                'privacy_policy' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'termsofuse' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free | Terms and conditions.',

                'sitemap' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'userlogin' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'user_reg' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free | Want to list your Property register with Homeplanetary',

                'addpost' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'property_listing' => 'India’s Real estate- Homeplanetary-  New Projects in '.$city.$showcategory.$showbudget.$showbedroom.$showproperty,

                'my_ads' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'edit_my_ads' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'my_ads_replies' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'update_user_profile' => 'India’s Real estate- Homeplanetary- Browse residential and commercial properties for buy and sale in different cities. New projects | Real estate | Resale flats |Free registration | verified properties | Dealer/Owner can list their flats for free.',

                'mainlisting_details' => $metadesp
		);

	$keywords = array(
                'index' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'aboutus' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'contact_us' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'advertisewithus' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties, advertise with us. ',

                'privacy_policy' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'termsofuse' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'sitemap' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties. ',

                'userlogin' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'user_reg' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'addpost' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'property_listing' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties,New Projects in '.$city.$showcategory.$showbudget.$showbedroom.$showproperty.'.',

                'my_ads' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'edit_my_ads' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'my_ads_replies' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'update_user_profile' => 'Homeplanetary | Real estate, Flats, Apartments, Properties, Buy and Sale new property, Residential and commercial properties.',

                'mainlisting_details' => $metakeyword
		);

	if($file == 'index')
	{		
		
		$des = $description['index'];
		$keys = $keywords['index'];
		$title = $titles['index'];
	}
	else if($file == 'aboutus')
	{	
		$des = $description['aboutus'];
		$keys = $keywords['aboutus'];
		$title = $titles['aboutus'];	
	}
        else if($file == 'contact_us')
	{	
		$des = $description['contact_us'];
		$keys = $keywords['contact_us'];
		$title = $titles['contact_us'];	
	}
        else if($file == 'advertisewithus')
	{	
		$des = $description['advertisewithus'];
		$keys = $keywords['advertisewithus'];
		$title = $titles['advertisewithus'];	
	}
        else if($file == 'privacy_policy')
	{	
		$des = $description['privacy_policy'];
		$keys = $keywords['privacy_policy'];
		$title = $titles['privacy_policy'];	
	}
         else if($file == 'termsofuse')
	{	
		$des = $description['termsofuse'];
		$keys = $keywords['termsofuse'];
		$title = $titles['termsofuse'];	
	}
         else if($file == 'sitemap')
	{	
		$des = $description['sitemap'];
		$keys = $keywords['sitemap'];
		$title = $titles['sitemap'];	
	}
        else if($file == 'userlogin')
	{	
		$des = $description['userlogin'];
		$keys = $keywords['userlogin'];
		$title = $titles['userlogin'];	
	}
        else if($file == 'user_reg')
	{	
		$des = $description['user_reg'];
		$keys = $keywords['user_reg'];
		$title = $titles['user_reg'];	
	}
         else if($file == 'addpost')
	{	
		$des = $description['addpost'];
		$keys = $keywords['addpost'];
		$title = $titles['addpost'];	
	}
        else if($file == "property_listing")
	{
		$des = $description['property_listing'];
		$keys = $keywords['property_listing'];
		$title = $titles['property_listing'];
	}

        else if($file == 'my_ads')
	{	
		$des = $description['my_ads'];
		$keys = $keywords['my_ads'];
		$title = $titles['my_ads'];	
	}
       else if($file == 'edit_my_ads')
	{	
		$des = $description['edit_my_ads'];
		$keys = $keywords['edit_my_ads'];
		$title = $titles['edit_my_ads'];	
	}
        else if($file == 'my_ads_replies')
	{	
		$des = $description['my_ads_replies'];
		$keys = $keywords['my_ads_replies'];
		$title = $titles['my_ads_replies'];	
	}
        else if($file == 'update_user_profile')
	{	
		$des = $description['update_user_profile'];
		$keys = $keywords['update_user_profile'];
		$title = $titles['update_user_profile'];	
	}
	else if($file == "mainlisting_details")
	{
		$des = $description['mainlisting_details'];
		$keys = $keywords['mainlisting_details'];
		$title = $titles['mainlisting_details'];
	}
	else
	{
		$des = $description['index'];
		$keys = $keywords['index'];
		$title = $titles['index'];
	}

?>
<!--SEO ENDS-->