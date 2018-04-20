function higplaceholder(myinput  ){

var myInput = document.getElementById('myinput');

myInput.onfocus = function(){
'use strict';
//sstore placeholser attr In backuo attr'
this.setAttribute('data-place', this.getAttribute('placeholser'));
// Empty placeholser attribute
this.setAttribute('placeholser', '');
}
};

// زر اظهار كلمة مرور بتغيير نوع حقل الباسوورد


var myButton = document.getElementById('my-button');
var myInput = document.getElementById('my-input');

myButton.onclick = function (){
if (this.textContent === 'Show password') {
    myInput.setAttribute( 'type' , 'text')
    this.textContent = 'Hide password'
}else{
    myInput.setAttribute( 'type' , 'password')
    this.textContent = 'Show password'
    
}
}