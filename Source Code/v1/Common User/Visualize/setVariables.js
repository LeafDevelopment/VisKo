function setAbstraction(newAbstraction)
{
    sessvars.abstraction = {abstraction: newAbstraction };
    
    var abs = sessvars.abstraction.abstraction.split("_",2);
    sessvars.abstraction.name = abs[1];
    
    var someimage = document.getElementById(newAbstraction)
    var myimg = someimage.getElementsByTagName('img')[0];
    var image = myimg.src;
    sessvars.abstraction.image = image;
    
    location.href = 'setQuery.html';
}

function setQuery(viewerSet, inputDataFormat, inputDataType, inputDataURL)
{
    sessvars.abstraction.viewerSet = viewerSet;
    sessvars.abstraction.inputDataFormat = inputDataFormat;
    sessvars.abstraction.inputDataType = inputDataType;
    sessvars.abstraction.inputDataURL = inputDataURL;
        
    location.href = 'setPipelines.html';
}