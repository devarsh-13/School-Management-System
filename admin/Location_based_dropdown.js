

var loc = ["class9","class10","class11","class12"];
var c9 = ["sub1","sub2","sub3","sub4"];
var c10 = ["sub1","sub2","sub3","sub4"];
var c11 = ["sub1","sub2","sub3","sub4"];
var c12 = ["sub1","sub2","sub3","sub4"];

function DatafillClass()
{
	for(var i=0;i<loc.length;i++)
	{
		var obj=document.getElementById("Class");
		var Ele=document.createElement("option");
			Ele.textContent=loc[i];
		obj.appendChild(Ele);
	}
}

function DatafillSub(obj)
{

	var select=document.getElementById("Sub");
	
	switch(obj)
	{
		case "class9": select.options.length=1;
						for (var i = 0; i < c9.length; i++)
						{
							var ns=document.createElement("option");
							ns.textContent=c9[i];
							select.appendChild(ns);
						}
						break;

		case "class10": select.options.length=1;
						for (var i = 0; i < c10.length; i++)
						{
							var ns=document.createElement("option");
							ns.textContent=c10[i];
							select.appendChild(ns);
						}
						break;

		case "class11": select.options.length=1;
						for (var i = 0; i < c11.length; i++)
						{
							var ns=document.createElement("option");
							ns.textContent=c11[i];
							select.appendChild(ns);
						}
						break;

		case "class12": select.options.length=1;
						for (var i = 0; i < c12.length; i++)
						{
							var ns=document.createElement("option");
							ns.textContent=c12[i];
							select.appendChild(ns);
						}
						break;
	}
}

 function runn()
{
    document.write("<h3>Your Selected Class : "+document.getElementById("Class").value+" And Sub : "+document.getElementById("Sub").value+"</h3>");
    var c = document.getElementById("Class").value;
    return c;
}