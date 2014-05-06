<script>
/*Checks all empty required fields

param1 = form_ID

param2 = required_field_ID_1
param3 = required_field_ID_2
...

*/

function checkRequiredFields(string_prefix, form_name)
{

	//returns true if all objects in form
	//with the string_prefix have nonempty values
	//alert("hello");

	var x = document.getElementById(form_name);
	for(var i=0; i<x.length; i++) 
	{
		y=x.elements[i].id;
		//alert("'"+y + "' startswith '" + y.substring(0,string_prefix.length) + "' which should be '"+ string_prefix + "' =?= "+ (y.substring(0,string_prefix.length)==string_prefix) +"! && '"+x.elements[i].value+"' is not blank "+ (x.elements[i].value==""));

		if (y.substring(0,string_prefix.length)==string_prefix && x.elements[i].value=="") 
		{
			x.elements[i].focus();
			//alert("You missed a required field(s)");
			return false;
		}  
	 
	}
	return true;
}

/**
function checkEmailSyntax(var email)
{
	var email = document.getElementById('email');
	var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email.value)) 
	{
	    email.focus();
	    return false;
	} 
}**/
</script>
