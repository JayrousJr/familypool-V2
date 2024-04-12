// JavaScript Document
const validation = new window.JustValidate("#form");

validation
.addField("#name",[
	{
		rule: "required",
		errorMessage: "Name Field shall not be empty",
	},
])
.addField("#email",[
	{
	rule: "required",
	errorMessage: "Email Field shall not be empty"
},{
	rule: "email",
	errorMessage: "Enter a valid email adress"
}
	])
.addField("#subject",[
	{
		rule: "required",
		errorMessage: "Subject Field shall not be empty"
	},
])
.addField("#message",[
		{
		rule: "required",
		errorMessage: "The Message Field should not be empty!"
		}
])
.onSuccess((event) => {
	document.getElementById("#form").submit();
});
