function setAbstraction(newAbstraction)
{
	//temporary part for demo
    sessvars.abstraction = new Array();
    sessvars.queueAbstractions = new Array();
    sessvars.count = {count: 0, queueCount: 0};

    sessvars.abstraction[sessvars.count.count] = {abstraction: newAbstraction};
    
    var abs = sessvars.abstraction[sessvars.count.count].abstraction.split("#",2);
        
    sessvars.abstraction[sessvars.count.count].name = abs[1];
    
    var someimage = document.getElementById(newAbstraction);
    var myimg = someimage.getElementsByTagName('img')[0];
    var image = myimg.src;
    
    sessvars.abstraction[sessvars.count.count].image = image;
    
    location.href = '/team2/setQuery.php';
}

function setQuery(viewerSet, inputDataFormat, inputDataType, inputDataURL)
{
    sessvars.abstraction[sessvars.count.count].viewerSet = viewerSet;
    sessvars.abstraction[sessvars.count.count].inputDataFormat = inputDataFormat;
    sessvars.abstraction[sessvars.count.count].inputDataType = inputDataType;
    sessvars.abstraction[sessvars.count.count].inputDataURL = inputDataURL;

    sessvars.count.count++;
        
    location.href = '/team2/setPipelines.php';
}

function setQueryText(abstraction, viewerSet, inputDataFormat, inputDataType, inputDataURL)
{
	if(viewerSet != "d3-viewer-set" || viewerSet != "paraview")
	{
		viewerSet = "web-browser";
	}

	sessvars.abstraction[sessvars.count.count] = {abstraction: abstraction};

	sessvars.abstraction[sessvars.count.count].name = abstraction;
    sessvars.abstraction[sessvars.count.count].viewerSet = viewerSet;
    sessvars.abstraction[sessvars.count.count].inputDataFormat = inputDataFormat;
    sessvars.abstraction[sessvars.count.count].inputDataType = inputDataType;
    sessvars.abstraction[sessvars.count.count].inputDataURL = inputDataURL;

    sessvars.count.count++;
        
    location.href = '/team2/setPipelines.php';
}

function addNewToQueue(index)
{
    sessvars.queueAbstractions.push(index);
	runQuery(index);

    refreshQueue();
    
}

