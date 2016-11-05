// Countries
var country_arr = new Array("Police Department", "Public Works Department", "Public Distribution System", "Electricity Board", "Income Tax", "Others");

// States
var s_a = new Array();
s_a[0]="";
s_a[1]="Dowry & marriage|Torture|Eve Teasing|Cheating|Robbery|Murder/Rape|Others";
//s_a[2]="Garbage Management|Street Lights|Foot-paths|Roads|Parks & public amenities|Other issues";
s_a[2]="Delay in work|Bribery|Sub-standard quality|Other issues";
s_a[3]="Adulteration|Hoarding|Bribery|Other issues";
s_a[4]="Delay in work|Bribery|Absence of staff|Other issues";
s_a[5]="Bribery|Unaccounted Wealth|Other issues";
s_a[6]="Municipal Corp|Panchayat|Other Local bodies|Other Central bodies";




function populateSubIssues( complaintElementID, subComplaintElementID ){
	
	var selectedOptionIndex = document.getElementById( complaintElementID ).selectedIndex;

	var subComplaintElement = document.getElementById( subComplaintElementID );
	
	subComplaintElement.length=0;	// Fixed by Julian Woods
	subComplaintElement.options[0] = new Option('Select issue','');
	subComplaintElement.selectedIndex = 0;
	
	var sub_arr = s_a[selectedOptionIndex].split("|");
	
	for (var i=0; i<sub_arr.length; i++) {
		subComplaintElement.options[subComplaintElement.length] = new Option(sub_arr[i],i+1);
	}
}

function populateIssues(complaintElementID, subComplaintElementID){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var complaintElement = document.getElementById(complaintElementID);
	complaintElement.length=0;
	complaintElement.options[0] = new Option('Select Complaint/Issue','-1');
	complaintElement.selectedIndex = 0;
	for (var i=0; i<country_arr.length; i++) {
		complaintElement.options[complaintElement.length] = new Option(country_arr[i],i+1);
	}


	if( subComplaintElementID ){
		complaintElement.onchange = function(){
			populateSubIssues( complaintElementID, subComplaintElementID );
		};
	}
}
