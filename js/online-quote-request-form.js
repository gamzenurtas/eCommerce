document.addEventListener("touchstart",function(){},false);(function($){"use strict";$(function(){var randNumber_1=parseInt(Math.ceil(Math.random()*15),10);var randNumber_2=parseInt(Math.ceil(Math.random()*15),10);humanCheckCaptcha(randNumber_1,randNumber_2);});function humanCheckCaptcha(randNumber_1,randNumber_2){$("#humanCheckCaptchaBox").html("Solve The Math ");$("#firstDigit").html('<input name="mathfirstnum" id="mathfirstnum" class="form-control" type="text" value="'+randNumber_1+'" readonly>');$("#secondDigit").html('<input name="mathsecondnum" id="mathsecondnum" class="form-control" type="text" value="'+randNumber_2+'" readonly>');}$(function(){$('#preferred-date input').datepicker({format:"dd MM, yyyy",startDate:"0d",todayBtn:"linked",todayHighlight:true,autoclose:true});});$("#QuoteForm").validator().on("submit",function(event){if(event.isDefaultPrevented()){formError();submitMSG(false,"Please fill in the form properly!");sweetAlert("Oops...","Please fill in the form properly!!!","error");}else{var mathPart_1=parseInt($("#mathfirstnum").val(),10);var mathPart_2=parseInt($("#mathsecondnum").val(),10);var correctMathSolution=parseInt((mathPart_1+mathPart_2),10);var inputHumanAns=$("#humanCheckCaptchaInput").val();if(inputHumanAns==correctMathSolution){event.preventDefault();submitForm();}else{submitMSG(false,"Please solve Human Captcha!!!");sweetAlert("Oops...","Please solve Human Captcha!!!","error");return false;}}});function submitForm(){$("#mgsContactSubmit").html('');$("#section-5 #lastsection-laststep").addClass("active");$("#final-step-buttons").html('<div class="h3 text-center text-success"> You have finished all steps of this html/js form successfully!!! This is JS script so no Server Side Langauage as like PHP Included!</div>');swal("Good job!","You have finished all steps of this html form successfully!!!","success");}$(function(){$(document).on('change',':file',function(){var input=$(this),numFiles=input.get(0).files?input.get(0).files.length:1,label=input.val().replace(/\\/g,'/').replace(/.*\//,'');input.trigger('fileselect',[numFiles,label]);});$(':file').on('fileselect',function(event,numFiles,label){var input=$(this).parents('.form-group').find(':text'),log=numFiles>1?numFiles+' files selected':label;if(input.length){input.val(log);}else{if(log)alert(log);}});});function formSuccess(){$("#QuoteForm")[0].reset();$("#section-5 #lastsection-laststep").addClass("active");submitMSG(true,"Your Message Submitted Successfully!!!");swal("Good job!","Your Message Submitted Successfully!!!");}function formError(){$(".help-block.with-errors").removeClass('hidden');}function submitMSG(valid,msg){if(valid){var msgClasses="h3 text-center text-success";$("#final-step-buttons").html('<div class="h3 text-center text-success"> Tahnk you for your concern. We will get back to you soon!</div>');}else{var msgClasses="h3 text-center text-danger";}$("#mgsContactSubmit").removeClass().addClass(msgClasses).text(msg);}})(jQuery);function isEmail(email){var regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;return regex.test(email);}
function nextStep2()
{
	
$("#section-1 .help-block.with-errors").html('');
$("#section-1").removeClass("open");$("#section-1").addClass("slide-left");$("#section-2").removeClass("slide-right");
$("#section-2").addClass("open");


}


function previousStep1(){$("#section-1").removeClass("slide-left");$("#section-1").addClass("open");$("#section-2").removeClass("open");$("#section-2").addClass("slide-right");}
function nextStep3(){


	$("#section-2 .help-block.with-errors.mandatory-error").html('');$("#section-2").removeClass("open");$("#section-2").addClass("slide-left");$("#section-3").removeClass("slide-right");$("#section-3").addClass("open");
}
	
	
function previousStep2(){$("#section-2").removeClass("slide-left");$("#section-2").addClass("open");$("#section-3").removeClass("open");$("#section-3").addClass("slide-right");}
function nextStep4(){
	$("#section-3 .help-block.with-errors.mandatory-error").html('');$("#section-3").removeClass("open");$("#section-3").addClass("slide-left");$("#section-4").removeClass("slide-right");$("#section-4").addClass("open");	

}
	
	
	function previousStep3(){$("#section-3").removeClass("slide-left");$("#section-3").addClass("open");$("#section-4").removeClass("open");$("#section-4").addClass("slide-right");}
	
	function nextStep5(){


	$("#section-4 .help-block.with-errors.mandatory-error").html('');$("#section-4").removeClass("open");$("#section-4").addClass("slide-left");$("#section-5").removeClass("slide-right");$("#section-5").addClass("open");
	

}
	
	function previousStep4(){$("#section-4").removeClass("slide-left");$("#section-4").addClass("open");$("#section-5").removeClass("open");$("#section-5").addClass("slide-right");}