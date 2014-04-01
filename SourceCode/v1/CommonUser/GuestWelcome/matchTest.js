/*
@Authors:Rebekah Gruver, Marcela Vazquez
@Date: March 26, 2014
@Description: This file creates a view and funtionality for the Search Users page 
*/


function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}



function checkPass2()
{
    //Store the email field objects into variables ...
    var pass1 = document.getElementById('email1');
    var pass2 = document.getElementById('email2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage1');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field
    //and the confirmation field
    if(email1.value == email2.value){
        //The emails match.
        //Set the color to the good color and inform
        //the user that they have entered the correct password
        email2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Emails Match!"
    }else{
        //The emails do not match.
        //Set the color to the bad color and
        //notify the user.
        email2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Emails Do Not Match!"
    }
}
