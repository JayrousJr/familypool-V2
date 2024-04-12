// JavaScript Document
var nameError = document.getElementById('name-error');
var emailError = document.getElementById('email-error');
var subjectError = document.getElementById('subject-error');
var messageError = document.getElementById('message-error');
var submitError = document.getElementById('submit-error');

function validateName(){
	var name = document.getElementById('name').value;
	
	if(name.length == 0)
	{
		nameError.innerHTML = 'Name is required!';
		return false;
	}
	nameError.innerHTML = '<i class="icon-check-circle"></i>';
	return true; 
}

function validateEmail(){
	
	var email = document.getElementById('email').value;
	
	if(email.length == 0){
		emailError.innerHTML = 'Email is required';
		return false;
	}
	
	if(!email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/))
	{
		emailError.innerHTML = 'Email is invalid';
		return false;
	}
	emailError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}

function validateSubject(){
	
	var subject = document.getElementById('subject').value;
	
	if(subject.length == 0){
		subjectError.innerHTML = 'Subject is required!';
		return false;
	 }
	subjectError.innerHTML = '<i class="icon-check-circle"></i>';
	return true; 
}

function validateMessage(){
	var message = document.getElementById('message').value;
	
	var required = 30;
	var left = required - message.length;
	
	if(left > 0){
		messageError.innerHTML = left + ' more characters required';
		return false;
	}
	messageError.innerHTML = '<i class="icon-check-circle"></i>';
	return true;
}
function validateForm(){
	
	if(!validateName() || !validateEmail() || !validateSubject() || !validateMessage()){
		submitError.style.display='block';
		submitError.innerHTML = 'Please Fix errors to send message!';
		setTimeout(function(){submitError.style.display='none';}, 5000);
		return false;
	}
	/*submitError.innerHTML = '<i class="icon-check-circle"> Message Sent Successiful</i>';
	return true;*/
}







