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
	alert("hello");
	alert(inputs[i].value);


	var inputs=document.form_name.elements;
	for(var i=0; i<inputs.length; i++) 
	{
		if (inputs[i].name.substring(0,length(string_prefix)).equals(string_prefix) && inputs[i].value!="") 
		{
			input[i].focus();
			alert("You missed a required field(s)");
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
