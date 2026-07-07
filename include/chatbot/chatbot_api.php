<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "../../config.php";


if(isset($_POST['message'])){


$message = strtolower(trim($_POST['message']));

$response="Sorry, I couldn't understand your query. Please ask about properties, buying, selling, EMI, loans or locations.";



/*
====================================
 GREETING
====================================
*/

if(
preg_match('/\b(hi|hello|hey|hii|good morning|good evening)\b/',$message)
){

$response="
👋 Hello! Welcome to Real Estate Assistant.

I can help you with:

🏠 Property Search
🏢 Flats & Apartments
🏡 Villas & Bungalows
💰 EMI & Loans
📍 Locations
🌎 International Properties
";

}



/*
====================================
 LIVE PROPERTY SEARCH
====================================
*/

else if(
preg_match('/\b(show|find|search|available|list|properties)\b/',$message)
&&
preg_match('/\b(flat|apartment|villa|bungalow|house|property|home|bhk)\b/',$message)

){

$location="";


if(strpos($message,"nashik")!==false){
$location="Nashik";
}

else if(strpos($message,"pune")!==false){
$location="Pune";
}

else if(strpos($message,"mumbai")!==false){
$location="Mumbai";
}

else if(strpos($message,"delhi")!==false){
$location="Delhi";
}



if($location!=""){


$query="
SELECT *
FROM property
WHERE city LIKE '%$location%'
LIMIT 5
";


$result=mysqli_query($con,$query);



if($result && mysqli_num_rows($result)>0)
{


$properties=[];


while($row=mysqli_fetch_assoc($result))
{

$properties[]=$row;

}


echo json_encode([

"type"=>"property",

"data"=>$properties

]);


exit;


}

else
{

$response="
Sorry 😔 No properties found in $location.

Try another location.
";

}



}

else
{

$response="
📍 Please tell me your location.

Example:
• Flats in Pune
• Villa in Nashik
• Apartment in Mumbai
";

}


}



/*
====================================
 BHK / APARTMENT
====================================
*/


else if(

preg_match('/\b(1 bhk|2 bhk|3 bhk|4 bhk|bhk|flat|apartment)\b/',$message)

)
{


$response="
🏢 We have different apartment options:

✔ 1 BHK Flats
✔ 2 BHK Apartments
✔ 3 BHK Premium Apartments
✔ Family Homes

Please tell me:
📍 Location
💰 Budget

I will help you find suitable properties.
";

}




/*
====================================
 VILLA
====================================
*/


else if(

preg_match('/\b(villa|bungalow|luxury home|farm house)\b/',$message)

)
{


$response="
🏡 Luxury Villas & Bungalows available.

Features:
✔ Spacious rooms
✔ Premium locations
✔ Modern amenities
✔ Parking facilities

Tell me your preferred city.
";

}




/*
====================================
 BUY PROPERTY
====================================
*/


else if(

preg_match('/\b(buy|purchase|own|looking for home|need home|want home)\b/',$message)

)
{


$response="
🏠 I can help you buy your dream property.

Please provide:

📍 Location
💰 Budget
🏢 Property Type
🏠 BHK Requirement

Example:
'I need 2 BHK flat in Pune'
";

}




/*
====================================
 SELL PROPERTY
====================================
*/


else if(

preg_match('/\b(sell|selling|owner|list my property)\b/',$message)

)
{


$response="
📢 You can sell your property through our platform.

Provide:

✔ Property images
✔ Location
✔ Price
✔ Description

Our buyers can contact you.
";

}




/*
====================================
 EMI / LOAN
====================================
*/


else if(

preg_match('/\b(emi|loan|interest|finance|monthly payment|installment)\b/',$message)

)
{


$response="
💰 EMI Calculator Assistance

Please enter:

Loan Amount:
Interest Rate:
Duration:

I will help you calculate monthly EMI.
";

}




/*
====================================
 LOCATION
====================================
*/


else if(

preg_match('/\b(location|city|area|where)\b/',$message)

)
{


$response="
📍 We have properties available in:

🇮🇳 India:
• Nashik
• Pune
• Mumbai
• Delhi

🌎 International:
• Dubai
• USA
• Other premium locations
";

}




/*
====================================
 INTERNATIONAL
====================================
*/


else if(

preg_match('/\b(international|dubai|usa|foreign|abroad)\b/',$message)

)
{


$response="
🌎 International Property Services

We help users explore premium properties outside India.

Popular locations:
✔ Dubai
✔ USA
✔ Other global cities
";

}




/*
====================================
 BUDGET
====================================
*/


else if(

preg_match('/\b(budget|lakh|crore|million|price|cost)\b/',$message)

)
{


$response="
💵 Tell me:

1. Your budget
2. Preferred city
3. Property type

I will suggest suitable options.
";

}




echo $response;


}

?>