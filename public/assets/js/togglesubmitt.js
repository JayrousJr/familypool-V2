////Javascript to validate application form
 
      window.fakeFetch = (time = 1000, func) =>
        new Promise((resolve) => {
          setTimeout(() => {
            resolve(typeof func === 'function' ? func() : false);
          }, time);
        });

      window.showNotification = () => {
        window
          .Toastify({
            text: 'Validation successfully passed!',
            duration: 3000,
            close: true,
            gravity: 'bottom', // `top` or `bottom`
            position: 'left', // `left`, `center` or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
          })
          .showToast();
      };
//Formatting phone number input
$("input[type='tel']").each(function(){
  $(this).on("change keyup paste", function (e) {
    var output,
      $this = $(this),
      input = $this.val();

    if(e.keyCode != 8) {
      input = input.replace(/[^0-9]/g, '');
      var area = input.substr(0, 3);
      var pre = input.substr(3, 3);
      var tel = input.substr(6, 4);
      if (area.length < 3) {
        output = "(" + area;
      } else if (area.length == 3 && pre.length < 3) {
        output = "(" + area + ")" + " " + pre;
      } else if (area.length == 3 && pre.length == 3) {
        output = "(" + area + ")" + " " + pre + "-" + tel;
      }
      $this.val(output);
    }
  });
});

//formatting ssn
      $('#socialsecurityNumber').keyup(function() {
          var val = this.value.replace(/\D/g, '');
          var newVal = '';
          if(val.length > 4) {
             this.value = val;
          }
          if((val.length > 3) && (val.length < 6)) {
             newVal += val.substr(0, 3) + '-';
             val = val.substr(3);
          }
          if (val.length > 5) {
             newVal += val.substr(0, 3) + '-';
             newVal += val.substr(3, 2) + '-';
             val = val.substr(5);
           }
           newVal += val;
           this.value = newVal.substring(0, 11);
        });
//ssn ends

//formatting ein

	  $('#einNumber').keyup(function() {
          var val = this.value.replace(/\D/g, '');
          var newVal = '';
          if((val.length > 2)) {
             newVal += val.substr(0, 2) + '-';
             val = val.substr(2);
          }
          if (val.length > 7) {
             newVal += val.substr(0, 7) + '-';
             val = val.substr(7);
           }
           newVal += val;
           this.value = newVal.substring(0, 10);
        });
//ein ends



//check box validation
var input = document.getElementsByName('termsChkbx')[0];
	var submit = document.getElementsByName('submit')[0];
	input.onchange=function() { 
		if(input.checked) {
			submit.disabled = false;
		} else {
			submit.disabled = true;
		}
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
		expiredateCheck.value="";
		issueddateCheck.value="";
		issuedcityCheck.value="";
		if (!issuedcityCheck.disabled&& !licenceNumber.disabled && !expiredateCheck.disabled && !licenceNumber.disabled  ) {
			
			issueddateCheck.focus();
			issuedcityCheck.focus();
			expiredateCheck.focus();
			licenceNumber.focus();
			
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
