//Insert Category Form Validation


//Update Category Form Validation





function validateproduct() {
  var P_ID = document.forms["P_Insertion"]["P_ID"].value;
	var Sub_ID = document.forms["P_Insertion"]["SubCategory_ID"].value;
	 var B_ID = document.forms["P_Insertion"]["Brand_ID"].value;
	var P_Name = document.forms["P_Insertion"]["P_Name"].value;
	var P_Description = document.forms["P_Insertion"]["P_Description"].value;
	var C_Price = document.forms["P_Insertion"]["P_CPrice"].value;
	var Sell_P = document.forms["P_Insertion"]["P_SPrice"].value;
	var NOI_Box = document.forms["P_Insertion"]["NOI_Box"].value;
	
	

  if (P_ID == "") {
    alert("Enter Product ID");
    return false;
  }
	 if(Sub_ID == "Choose Category"){
		 alert("Select  Category");
    return false;
		
	}
	
	 if(B_ID == "Choose Brand"){
		 alert("Select a Brand");
    return false;
		
	}
	
	 if(P_Name == ""){
		 alert("Enter  Product Name ");
    return false;
		
	}
	
	if(P_Description == ""){
		 alert("Enter Product Description  ");
    return false;
		
	}
	
	if(C_Price == ""){
		 alert("Enter Product Cost Price (LKR)  ");
    return false;
		
	}
	
	if(Sell_P == ""){
		 alert("Enter Product Selling Price (LKR)  ");
    return false;
		
	}
	
	if(NOI_Box == ""){
		 alert("Enter Quantity in Box of the Product");
    return false;
		
	}
}






	
