 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  
$(document).ready(function () {

(function ($) {
    "use strict";



$('[placeholder]').focus(function(){
$(this).attr('data-text' , $(this).attr('placeholder'));
$(this).attr('placeholder' , '');
}).blur(function (){
$(this).attr(' placeholder' , $(this).attr('data-text'));

});
)};

$(login).on(click, function () {
    $(this).attr('class' ,'color');
});

//add* on requires field
$('input').each(function(){
if($(this).attr('required') === 'required'){
    $(this).after('<span class="asterisk">*</span>');
}
  
});

// validater the inbut

$('.form-control').blur(function () { 
    if($(this).val().length() < 4){
      console.log ('nooo');
      $(this).css('border' , '1px solid #F00');

    }else{
        $(this).css('border' , '1px solid #080');
  
    }
});

var myButton = document.getElementById('show-pass');
var myInput = document.getElementById('password');

myButton.onclick = function (){
if (this.textContent === 'Show password') {
    myInput.setAttribute( 'type' , 'text')
    this.textContent = 'Hide password'
}else{
    myInput.setAttribute( 'type' , 'password')
    this.textContent = 'Show password'
    
}



}



})(jQuery);












$.confirm({
  buttons: {
        info: {
            btnClass: 'confirm',
            action: function(){
              closeIcon: true
            };
        }
    }
});
