function setAbstraction(newAbstraction)
{
    
    sessvars.abstraction[sessvars.count.count] = {abstraction: newAbstraction };
    
    var abs = sessvars.abstraction[sessvars.count.count].abstraction.split("_",2);
    
    sessvars.abstraction[sessvars.count.count].name = abs[1];
    
    var someimage = document.getElementById(newAbstraction);
    var myimg = someimage.getElementsByTagName('img')[0];
    var image = myimg.src;
    sessvars.abstraction[sessvars.count.count].image = image;
    
    location.href = 'setQuery.html';
}

function setQuery(viewerSet, inputDataFormat, inputDataType, inputDataURL)
{
    sessvars.abstraction[sessvars.count.count].viewerSet = viewerSet;
    sessvars.abstraction[sessvars.count.count].inputDataFormat = inputDataFormat;
    sessvars.abstraction[sessvars.count.count].inputDataType = inputDataType;
    sessvars.abstraction[sessvars.count.count].inputDataURL = inputDataURL;
    
    sessvars.count.count++;
        
    location.href = 'setPipelines.html';
}