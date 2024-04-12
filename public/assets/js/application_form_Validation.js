////Javascript to validate application form


var firstNameError = document.getElementById('firstNameError');
var secondNameError = document.getElementById('secondNameError');
var streeAddressError = document.getElementById('streeAddressError');
var cityError  = document.getElementById('cityError');
var stateError = document.getElementById('stateError');
var zipcodeError = document.getElementById('zipcodeError');
var emailError = document.getElementById('emailError');
var phoneError = document.getElementById('phoneError');
var birthdateError = document.getElementById('birthdateError');
var hoursError = document.getElementById('hoursError');
var submitError = document.getElementById('submitError');
var startTimeError = document.getElementById('startTimeError');
var TransportError = document.getElementById('TransportError');
var daysError = document.getElementById('daysError');
var endtimeError = document.getElementById('endtimeError');
var startdateError = document.getElementById('startdateError');
var smokeError = document.getElementById('smokeError');
var ageError = document.getElementById('ageError');
var licencenumberError = document.getElementById('licencenumberError');
var licenceissueddateError = document.getElementById('licenceissueddateError');
var licenceExpiredateError  = document.getElementById('licenceExpiredateError');
var issuedcityError  = document.getElementById('issuedcityError');
var einNumberError  = document.getElementById('einNumberError');
var socialsecurityNumberError = document.getElementById('socialsecurityNumberError');
var periodError = document.getElementById('periodError');
var licenceError  = document.getElementById('licenceError');
var genderError  = document.getElementById('genderError');
/*var  = document.getElementById('');*/
/*var  = document.getElementById('');*/

//validate first name
function validateFname(){
	var fname = document.getElementById('fname').value;
	
	if(fname.length == 0){
		firstNameError.innerHTML = 'First Name is required';
		return false;
	}
	firstNameError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

//validate second name
function validateSname(){
	var sname = document.getElementById('sname').value;
	
	if(sname.length==0){
		secondNameError.innerHTML = 'Second name is required';
		return false;
	}
	secondNameError.innerHTML ='<i class="icon-check-circle"></i>';
	return true;
}  

//validate Address Street
function validateSaddress(){
	var streetAddress = document.getElementById('streetAddress').value;
	if(streetAddress.length == 0){
		streeAddressError.innerHTML='Street Address is required';
		return false;
	}
	streeAddressError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
	}
//validate Address city
function validateCity(){
	var city = document.getElementById('city').value;
	if(city.length == 0){
		cityError.innerHTML = 'City address is required';
		return false;
	}
	cityError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

//validate Address state
function validateState(){
	var state = document.getElementById('state').value;
	if(state.length == 0){
		stateError.innerHTML = 'City address is required';
		return false;
	}
	stateError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

//validate Address Zip
function validateZip(){
	var zip = document.getElementById('zip').value;
	if(zip.length == 0){
		zipcodeError.innerHTML = 'City address is required';
		return false;
	}
	zipcodeError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

//validate Address email
function validateEmail(){
	
	var email = document.getElementById('email').value;
	
	if(email.length == 0){
		emailError.innerHTML = 'Email is required';
		return false;
	}
	
	if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/))
	{
		emailError.innerHTML = 'Email is invalid';
		return false;
	}
	emailError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

//validate phone number
function validatePhone(){
	var phone = document.getElementById('phone').value;
	
	if(phone.length < 10 || phone.length > 12){
		phoneError.innerHTML = 'Phone number must be 10, 12 or 13 digit';
		return false;
	}
	if(!phone.match(/^[0-9]{10}$/)){
		phoneError.innerHTML = 'Phone number is required';
		return false;
	}
	phoneError.innerHTML = '<i class="icon-check-circle"></i>';
		return true;
}

//validate age

function validateAge(){
	var age = document.getElementById('age').value;
	
	if(age<18 ){
		ageError.innerHTML = 'Age not eligible to work';
		return false;
	}
	
	if(age>50 ){
		ageError.innerHTML = 'Too old to work';
		return false;
	}
	ageError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

//validate Birthdate
function validateBirthdate(){
	
	var birthdate = document.getElementById('birthdate').value;
	if(birthdate.length == 0){
		birthdateError.innerHTML = 'Enter Birth date';
		return false;
	}
	
	birthdateError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}
//Vaidate work period
//Vaidate work period
//Vaidate work period
function validateWorkperiod(){
	var workperiod = document.getElementById('workperiod').value;
	
	if(workperiod.length == 0){
		periodError.innerHTML = 'Working period is required';
		return false;
	}
	if(workperiod < 0.5){
		periodError.innerHTML = 'Working Period Should start 1/2 years';
		return false;
	}
	if(workperiod >= 6){
		periodError.innerHTML = 'Working period should be 5 years or less !';
		return false;
	}
	periodError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}
//validate work hours
function validateWorkHours(){
	var workHour = document.getElementById('workHour').value;
	
	if(workHour < 30){
		hoursError.innerHTML = 'At least 30 hours';
		return false;
	}
	if(workHour >= 169){
		hoursError.innerHTML = 'At most 168 hours';
		return false;
	}
	
	hoursError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

/*function validateLicence(){
	var licence = document.getElementsByName('licence').value;
	if(licence.length == 0){
		licenceError.innerHTML='Select driving licence status';
	}
	licenceError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}*/

//validate starting work hours
function validateStartTime(){
	var starttime = document.getElementById('starttime').value;
	if(starttime.length == 0){
		startTimeError.innerHTML = 'Enter start Working hour';
		return false;
	}
	startTimeError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

//validate end work hour
function validateEndtime(){
	var endtime = document.getElementById('endtime').value;
	if(endtime.length == 0){
		endtimeError.innerHTML = 'Enter start Working hour';
		return false;
	}
	endtimeError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

//validate start date

function validateStartdate(){
	var startdate = document.getElementById('startdate').value;
	if(startdate.length == 0){
		startdateError.innerHTML = 'Enter start working date';
		return false;
	}
	startdateError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}


//validate smoking status
function validatesmoke(){
	var yessmoke = document.getElementById('yessmoke').value;
	var nosmoke = document.getElementById('nosmoke').value;
	if(yessmoke.checked == false || nosmoke.checked == false){
		smokeError.innerHTML='Select your smoking status';
	}
	smokeError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

	//validate expire date
function validateLicenceExpiredate(){
	var expiredate = document.getElementById('expiredate').value;
	if(expiredate.length == 0){
		licenceExpiredateError.innerHTML = 'Enter Driving licence Expire Date';
		return false;
	}
	licenceExpiredateError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

//validate licence number
function validatelicencenumber(){
	var licenceNumber = document.getElementById('licenceNumber').value;
	if(licenceNumber.length < 3){
		licencenumberError.innerHTML = 'Enter Driving licence Number';
		return false;
	}
	licencenumberError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
	}

//validate licence issued date
function validateLicenceIssueddate(){

	var issueddate = document.getElementById('issueddate').value;
	if(issueddate.length < 3){
		licenceissueddateError.innerHTML = 'Enter Driving licence Issued Date';
		return false;
	}
		licenceissueddateError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}
//validate licence issued city
function validateissuedcity(){
	
	var issuedcity = document.getElementById('issuedcity').value;
	if(issuedcity.length < 3){
		issuedcityError.innerHTML = 'Enter Driving licence Issued City';
		return false;
	}
	issuedcityError.innerHTML =  '<i class="icon-check-circle"></i>';
	return true;
}

//Radio button to toggle licence details
function EnableDisableTB() {
		var licenceCheck = document.getElementById("yes-licence");
		var licenceNumber = document.getElementById("licenceNumber");
		var issueddateCheck = document.getElementById("issueddate");
		var expiredateCheck = document.getElementById("expiredate");
		var issuedcityCheck = document.getElementById("issuedcity");
		licenceNumber.disabled = licenceCheck.checked ? false : true;
		issueddateCheck.disabled = licenceCheck.checked ? false : true;
		expiredateCheck.disabled = licenceCheck.checked ? false : true;
		issuedcityCheck.disabled = licenceCheck.checked ? false : true;
		licenceNumber.value="";
		issueddateCheck.value="";
		if (!licenceNumber.disabled && !issuedcityCheck.disabled && !licenceNumber.disabled && !expiredateCheck.disabled ) {
			licenceNumber.focus();
			issueddateCheck.focus();
			expiredateCheck.focus();
			issuedcityCheck.focus();
		}
	}

//Validating EIN and Social security number
//Validating EIN and Social security number
//Validating EIN and Social security number


function EnableDisableSocial(){
	var socialCheck = document.getElementById("securityNumberRadio");
	var einCheck = document.getElementById("einNumberRadio");
	var socialsecurityNumber = document.getElementById("socialsecurityNumber");
	var einNumber = document.getElementById("einNumber");
	socialsecurityNumber.disabled = socialCheck.checked ? false : true;
	einNumber.disabled = einCheck.checked ? false : true;
	socialsecurityNumber.value="";
	einNumber.value="";
	
	if(!socialsecurityNumber.disabled){
		socialsecurityNumber.focus();
		
	}
	else{
		einNumber.focus();
	}
}

function validatesocialsecurityNumber(){
	var socialsecurityNumber = document.getElementById('socialsecurityNumber').value;
	if(socialsecurityNumber.length !== 9 ){
		socialsecurityNumberError.innerHTML = 'Enter a 9 digits SS number';
		return false;
	}
	socialsecurityNumberError.innerHTML = '<i class="icon-check-circle"> Valid</i>';
	return true;
}

function validateeinNumber(){
	var einNumber = document.getElementById('einNumber').value;
	if(einNumber.length !== 10){
		einNumberError.innerHTML = 'Enter a 10 digits EIN number';
		return false;
	}
	einNumberError.innerHTML = '<i class="icon-check-circle"> Valid</i>';
	return true;
}
//Validation ends
//Validation ends
//Validation ends

//Validate all functions

function  validateApplication(){
	
	
	if( !validateFname() || !validateSname() || !validateSaddress() || !validateCity() || !validateState() || !validateZip() || !validateEmail() || !validatePhone() || !validateAge() || !validateBirthdate() || !validateStartTime() ||  !validateEndtime() || !validateStartdate() || !validateWorkperiod() || !validateWorkHours() || !validatesmoke() || !validateLicenceIssueddate() || !validateLicenceExpiredate() || !validatelicencenumber() || !validateissuedcity())
	{
		submitError.style.display='block';
		submitError.innerHTML= '<span class="icon-error" style="color:red"></span> Please fill all form fields correctly to apply';
		
		setTimeout(function(){
			submitError.style.display='none';},5000);
		return false;
	}
	submitError.innerHTML = '<i class="icon-check-circle"> Form Sent Successiful</i>';
	return true;
	
	var days = document.forms["app-form"]["days"];
	
	if(days[0].checked == false && days[1].checked == false && days[2].checked == false && days[3].checked == false &&
		days[4].checked == false && days[5].checked == false 
	)
	{
	alert("Please Select Gender");
    return false;
	}
	else {
    alert("Successfully Submited");
    return true;
	}
	
}

//Joshua Jayrous Form Validation//
//Created by Joshua Jayrous//
//TechClouds.com Copyright 2022//
/// END///
///DNE///
//END//
