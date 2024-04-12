////Javascript to validate application form
 
   const validation = new window.JustValidate('#app-form', {
	   errorFieldCssClass: 'is-invalid',
		errorLabelStyle: {
		  fontSize: '16px',
		  color: '#dc3545',
		},
		successFieldCssClass: 'is-valid',
		successLabelStyle: {
		  fontSize: '16px',
		  color: '#20b418',
		},
		focusInvalidField: true,
		lockForm: true,
	  });

validation
.addField('#fname', [
	{
		rule: 'required',
		errorMessage: 'First name is required',
	},{
		rule: 'minLength',
		value: 3,
	},
])
.addField('#sname', [
	{
		rule: 'required',
		errorMessage: 'Second name is required',
	},{
		rule: 'minLength',
		value: 3,
	},
	
])
	
.addRequiredGroup('#gender','Select Your Gender')
.addField('#streetAddress', [
	{
		rule: 'required',
		errorMessage: 'Street Address is required',
	}
	
])
.addField('#city', [
	{
		rule: 'required',
		errorMessage: 'City is required',
	}
	
])
.addField('#state', [
	{
		rule: 'required',
		errorMessage: 'State is required',
	}
	
])

.addField('#zip', [
	{
		rule: 'required',
		errorMessage: 'Zip Code is required',
	}
	
])

.addField('#email', [
	{
		rule: 'required',
		errorMessage: 'Email is required',
	},
	{
		rule: 'email',
		errorMessage: 'Enter a valid email',
	},
	{
		validator: (value) => () => {
			return fetch("validate-email.php?email=" +  encodeURIComponent(value))
							.then(function(response){
								return response.json();
							})
							.then(function(json){
								return json.available;
							});
		},
		errorMessage: "Email already taken"
	}
])

.addField('#age', [
	{
		rule: 'required',
		errorMessage: 'Age is required',
	},
	{
		rule: 'minNumber',
		value:18,
		errorMessage: 'Age not eligible to work',
	},
	
	{
		rule: 'maxNumber',
		value:50,
		errorMessage: 'Too old to work',
	},
	
])

.addField('#phone', [
	{
		rule: 'required',
		errorMessage: 'Phone is required',
	},
	/*{
		validator: (value) => () => {
			return fetch("validate-email.php?phone=" +  encodeURIComponent(value))
							.then(function(response){
								return response.json();
							})
							.then(function(json){
								return json.available;
							});
		},
		errorMessage: "Phone Number already taken"
	}*/
	
])
.addRequiredGroup("#years",'Select Your Age Range')
.addField('#birthdate', [
	{
		rule: 'required',
		errorMessage: 'Birth Date is Required',
	}
	
])
.addRequiredGroup("#socialsecurity","Select either SSN or EIN ")
.addField('#socialsecurityNumber', [
	/*{
		rule: 'required',
		errorMessage: 'SSN is required',
	},*/
	{
		rule: 'minLength',
		value:11,
		errorMessage: 'SSN Too short',
	},
	/*{
		validator: (value) => () => {
			return fetch("validate-email.php?socialsecurityNumber=" +  encodeURIComponent(value))
							.then(function(response){
								return response.json();
							})
							.then(function(json){
								return json.available;
							});
		},
		errorMessage: "SSN already taken"
	}*/
	
])

.addField('#einNumber', [
	/*{
		rule: 'required',
		errorMessage: 'EIN is required',
	},*/
	{
		rule: 'minLength',
		value:10,
		errorMessage: 'EIN Too short',
	},
	/*{
		validator: (value) => () => {
			return fetch("validate-email.php?einNumber=" +  encodeURIComponent(value))
							.then(function(response){
								return response.json();
							})
							.then(function(json){
								return json.available;
							});
		},
		errorMessage: "EIN already taken"
	}*/
	
])
.addRequiredGroup('#daysAvailable',"Enter your available days")

.addField('#starttime', [
	{
		rule: 'required',
		errorMessage: 'Work-start time is required',
	}
])

.addField('#endtime', [
	{
		rule: 'required',
		errorMessage: 'Work-end time is required',
	}
	
])

.addField('#startdate', [
	{
		rule: 'required',
		errorMessage: 'Work-start date is required',
	}
	
])

.addField('#workperiod', [
	{
		rule: 'required',
		errorMessage: 'This field is required',
	},{
		rule: 'minNumber',
		value: 6,
		errorMessage: 'Minimum contract is 6 months (Half year)',
	},{
		rule: 'maxNumber',
		value: 60,
		errorMessage: 'Maximum contract is 60 months (5 years)',
	},
	
])

.addField('#workHour', [
	{
		rule: 'required',
		errorMessage: 'This field is required',
	},{
		rule: 'minNumber',
		value: 30,
		errorMessage: 'Minimum working hour is 30 hours per week',
	},{
		rule: 'maxNumber',
		value:168,
		errorMessage: 'Maximum working hour is 144 hours per week',
	},
	
])

.addRequiredGroup("#smokeCheckboxes","Select Smoking status")
.addRequiredGroup("#licenceCheckboxes","Select driving licence ownership")
.addField('#licenceNumber', [
	{
		rule: 'minLength',
		value:6,
		errorMessage: 'Invalid length for licence number',
	},{
		rule: 'maxLength',
		value:12,
		errorMessage: 'Invalid length for licence number',
	},
	
])

.addField('#issueddate', [
	{
		rule: 'maxLength',
		value:11,
		errorMessage: 'Enter Valid Date',
	}
	
])

.addField('#expiredate', [
	{
		rule: 'maxLength',
		value:11,
		errorMessage: 'Enter valid Date',
	}
	
])

.addField('#issuedcity', [
	{
		rule: 'maxLength',
		value:30,
		errorMessage: 'Enter valid Date',
	}
	
])
.addRequiredGroup("#transportOwnership","Select transport ownership status")
.onSuccess((event) => {
    document.getElementById("app-form").submit();
});

//Joshua Jayrous Form Validation//
//Created by Joshua Jayrous//
//TechClouds.com Copyright 2022//
/// END///
///DNE///
//END//