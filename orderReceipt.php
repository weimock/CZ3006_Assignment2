<html>
<head>
<title> CZ3006 Assignment 2 PHP </title>

<!-- CSS Styling starts here  -->
<style type="text/css">

/* Styling for Top Image Banner in the HTML */
.banner
{
float: left; 
width: 538px; 
padding: 5px; 
} 

/* Styling for Top Image Banner in the HTML */
.bannerStyle::after
{
content: ""; 
clear: both; 
display:table; 
}

/* Styling for Table and Table Cells */      
table, td 
{
border: 1px solid black; 
width: 400px;
margin-top: 10px; 
margin-left: 35px; 
margin-right: 400px; 
font-size: large;
}

/* Styling for Table First Row */
.tableHead
{
text-align:center; 
font-style: normal; 
font-weight: bold; 
font-size: x-large;
color: #e01f1f;
background-color: #4bdae7;

}

/* Styling for Subheadings */
.tableSub
{
text-align:center; 
font-style: normal; 
font-weight: bold; 
color: #e01f1f;
background-color: #4bdae7;

}

/* Styling for displaying data */
.cellData
{
text-align:center; 
}

/* Styling for <div> section where the Table will resides in */
.tableSection 
{
margin-left: 400px;
margin-right: 400px;
background-color: #d2f6f9; 
}

/* Styling for Back Button */
.btnStyle 
{
border-width: medium;
border-color: #00CCFF; 
font-size: small; 
font-size: medium;
}

</style>
</head>

<!-- <div> section where it holds the Top Banner Images -->
<div class ="bannerStyle">
<div class = "banner">
	<img alt="" src="Images/fruits%20banner2.png" />
</div>

<div class = "banner">
	<img alt="" src="Images/fruits%20banner.png" />
</div>
</div>

<body bgcolor="#a5ecf3">

<!-- PHP starts here -->
<?php
	$name =  $_POST["Uname"]; //Getting the value in the textbox named "Uname" in the HTML Document 
	$apple =  $_POST["apple"]; //Getting the value in the textbox named "apple" in the HTML Document 
	$orange =  $_POST["orange"]; //Getting the value in the textbox named "orange" in the HTML Document 
	$banana =  $_POST["banana"]; //Getting the value in the textbox named "banana" in the HTML Document 
	
	$Capple = $apple * 0.69; //Calculating the total cost Apples
	$Corange = $orange * 0.59; //Calculating the total cost Oranges 
	$Cbanana = $banana * 0.39; //Calculating the total cost Bananas 
	$total =  $Capple + $Corange + $Cbanana; //Calculating the total cost of the whole order

	$pay =  $_POST["paymethod"]; //Getting the value in the textbox named "paymethod" in the HTML Document 

	$totalOrder = array(); //Declaring an array to store the total amount ordered for apples, oranges and bananas 

	$dbseparator = ':'; 
	
	$orderfile = fopen("order.txt", "r") or die("Unable to open file!"); //Open order.txt file for reading the total amount in each fruits 
	
		for($i =0; $i<3; $i++){
				$value = fgets($orderfile); // Read the lines from file
				$dblinepos = strpos($value, $dbseparator); //Find the positon of the value
				$value = substr($value, $dblinepos+2); //Get the substring
				$totalOrder[$i] = (int)$value; //Assigning the substring value after changing into intger 
			}

	$totalApples = $totalOrder[0] + $apple; //Setting position 0 of totalOrder Array to display the total amount of Apple ordered 
	$totalOranges = $totalOrder[1] + $orange; //Setting position 1 of totalOrder Array to display the total amount of Orange ordered 
	$totalBananas = $totalOrder[2] + $banana; //Setting position 2 of totalOrder Array to display the total amount of Banana ordered 

	fclose($file); //Close order.txt file

	$orderfile = fopen("order.txt", "w") or die("Unable to open file!"); //Open the order.txt file for updating the total amount in each fruits 
	
	$Tapple = "Total Number of Apple(s): $totalApples \n" ;	//Formatting how the data should be displayed in order.txt file 
	fwrite($orderfile, $Tapple); //Updating the total amount of Apples ordered from all User
	
	$Torange = "Total Number of Orange(s): $totalOranges  \n" ; //Formatting how the data should be displayed in order.txt file 	
	fwrite($orderfile, $Torange); //Updating the total amount of Oranges ordered from all User
	
	$Tbanana = "Total Number of Banana(s): $totalBananas \n" ; //Formatting how the data should be displayed in order.txt file 	
	fwrite($orderfile, $Tbanana); //Updating the total amount of Bananas ordered from all User
	
	fclose($file); //Close order.txt file

?>


<div class ="tableSection">
<p style = "color:#e01f1f; font-size: x-large;"> THANK YOU FOR YOU ORDER! </p>
      <table id="orderRecipetTable" border ="1">
	
	  <!-- Row for Table Header -->
	   <tr>
		<td colspan = "3" class = "tableHead">
  			Order Summary
		</td>
	   </tr>

	  <!-- Row to Display Name -->
           <tr>
                 <td> Name: </td>
                 <td colspan = "2"> <?php print ("$name"); ?> </td>
           </tr>

	   <!-- Row for Styling Purposes -->
              <tr>
                    <td colspan = "3" bgcolor="D2F9FC">&nbsp</td>
              </tr>

	    <!-- Row for subheading -->
              <tr class = "tableSub">
                    <td><b> Fruits Ordered: </b></td>
                    <td><b> Quantities: </b></td>
                    <td><b> Total Amount: </b></td>			
              </tr>

	   <!-- Row to Display Number of Apples Ordered -->
            <tr>
                 <td>Apple(s): <br/> <b>(69&#162; each) </b></td>
                 <td class = "cellData"><?php print ("$apple"); ?></td>
		 <td class = "cellData"> $<?php print ("$Capple"); ?></td>
            </tr>

	   <!-- Row to Display Number of Oranges Ordered -->
            <tr>
                 <td> Orange(s): <br/> <b>(59&#162; each) </b></td>
                 <td class = "cellData"><?php print ("$orange"); ?></td>
		 <td class = "cellData"> $<?php print ("$Corange"); ?></td>
            </tr>

	   <!-- Row to Display Number of Bananas Ordered -->
             <tr>
                 <td> Banana(s): <br/> <b>(39&#162; each) </b></td>
                 <td class = "cellData"><?php print ("$banana"); ?></td>
		 <td class = "cellData"> $<?php print ("$Cbanana"); ?></td>
             </tr>

 	  <!-- Row for Styling Purposes -->
              <tr>
                    <td colspan = "3" bgcolor="D2F9FC">&nbsp</td>
              </tr>

	   <!-- Row to Order Total Cost -->
              <tr>
                  <td>Total Amount: </td>
                  <td colspan = "3">&nbsp$<?php print ("$total"); ?></td>
              </tr>
         
	   <!-- Row to the Selected Payment Method -->              
 	      <tr>
                  <td>Payment Mode: </td>
                  <td colspan = "3">&nbsp<?php print ("$pay"); ?> </td>  
              </tr>

	   <!-- Row for Styling Purposes -->
              <tr>
                    <td colspan = "3" bgcolor="D2F9FC">&nbsp</td>
              </tr>

           <!-- Row for Back Button -->
               <tr>
                    <td colspan="3" height="30">  
                   	<input id="backBtn" type="button" value="Back to Order Page" onclick="window.location.href = 'orderForm.html';" class = "btnStyle" />
	       </tr>
             
            </table>
   </div>
</body>
</html>





