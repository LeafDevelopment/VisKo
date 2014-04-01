function addToList(i)
{
    document.write('<tr><td>'+(i+1)+'</td><td>'+sessvars.abstraction[i].name+
            '</td><td>'+sessvars.abstraction[i].inputDataFormat
            +'</td><td><button>Edit</button></td><td><button onclick="addNewToQueue('+ (i+1) +')">Run</button></td></tr>');
}

function refreshQueue()
{
    for(var i = 0; i < sessvars.queueAbstractions.length; i++)
    {
        
        var queue = document.getElementById("queuechild"); 
        var x = document.createElement("center");  // Creates a new <div> node
            x.textContent = sessvars.queueAbstractions[i];         // Sets the text content
            queue.appendChild(x);   
        
        var img = document.getElementById("queuechildimage");
        var y = document.createElement("img");
            y.setAttribute('src', 'loading.gif');
            y.setAttribute('height', '100px');
            y.setAttribute('width', '100px');
            img.appendChild(y); 
    
       
        /* document.body.appendChild("queue").textContent =
                '<tr>' +
                '<td><center>'+ sessvars.queueAbstractions[i] +'</center></td>' + 
                '<td><center><img src="loading.gif" width="100px" height="100px"/></center></td>' + 
                '<td>' +
                '<center><form id="form1" name="form1" method="post" action="">' +
                '<input type="submit" name="remove" id="remove" value="Remove" />' +
                '</form>' +
                '</center>' +
                '</td>' +
                '</tr>';
                */
    }
}