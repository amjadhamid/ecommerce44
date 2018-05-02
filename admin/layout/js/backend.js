$(function () {

	'use strict';


//


	// Dashboard 

	$('.toggle-info').click(function () {

		$(this).toggleClass('selected').parent().next('.panel-body').fadeToggle(100);

		if ($(this).hasClass('selected')) {

			$(this).html('<i class="fa fa-minus fa-lg"></i>');

		} else {

			$(this).html('<i class="fa fa-plus fa-lg"></i>');

		}

	});

	// Trigger The Selectboxit

	$("select").selectBoxIt({

		autoWidth: false

	});

	// Hide Placeholder On Form Focus

	$('[placeholder]').focus(function () {

		$(this).attr('data-text', $(this).attr('placeholder'));

		$(this).attr('placeholder', '');

	}).blur(function () {

		$(this).attr('placeholder', $(this).attr('data-text'));

	});

	// Add Asterisk On Required Field

	$('input').each(function () {

		if ($(this).attr('required') === 'required') {

			$(this).after('<span class="asterisk">*</span>');

		}

	});

	// Convert Password Field To Text Field On Hover

	var passField = $('.password');

	$('.show-pass').hover(function () {

		passField.attr('type', 'text');

	}, function () {

		passField.attr('type', 'password');

	});

	// Confirmation Message On Button

	$('.confirm').click(function () {

		return confirm('Are You Sure?');

	});

	// Category View Option

	$('.cat h3').click(function () {

		$(this).next('.full-view').fadeToggle(200);

	});

	$('.option span').click(function () {

		$(this).addClass('active').siblings('span').removeClass('active');

		if ($(this).data('view') === 'full') {

			$('.cat .full-view').fadeIn(200);

		} else {

			$('.cat .full-view').fadeOut(200);

		}

	});

	// Show Delete Button On Child Cats

	$('.child-link').hover(function () {

		$(this).find('.show-delete').fadeIn(400);

	}, function () {

		$(this).find('.show-delete').fadeOut(400);

	});

});

// $(document).ready(function () {




// // validater the inbut

// $('.form-control').blur(function () { 
//     if($(this).val().length() < 4){
//       console.log ('nooo');
//       $(this).css('border' , '1px solid #F00');

//     }else{
//         $(this).css('border' , '1px solid #080');
  
//     }
// });

// var myButton = document.getElementById('show-pass');
// var myInput = document.getElementById('password');

// myButton.onclick = function (){
// if (this.textContent === 'Show password') {
//     myInput.setAttribute( 'type' , 'text')
//     this.textContent = 'Hide password'
// }else{
//     myInput.setAttribute( 'type' , 'password')
//     this.textContent = 'Show password'
    
// }



// }



// $(function (){
// 'use strict';

// $.extend($.expr[';']){

// redElement: function (element){
//   if( $(element).css('color') === 'red'){
//     return $(element);

//   }
//  }
// });

// $('h4').css('border' , '5px solid #00F');


// });


// $('.cat h2').click(function () {
 
//  $(this).next('.full-view').fadeToggle(300);
// });




// });






// // function () {
// //     "use strict";



// // $('[placeholder]').focus(function(){
// // $(this).attr('data-text' , $(this).attr('placeholder'));
// // $(this).attr('placeholder' , '');
// // }).blur(function (){
// // $(this).attr(' placeholder' , $(this).attr('data-text'));

// // });
// // )};

// // $(login).on(click, function () {
// //     $(this).attr('class' ,'color');
// // });

// // //add* on requires field
// // $('input').each(function(){
// // if($(this).attr('required') === 'required'){
// //     $(this).after('<span class="asterisk">*</span>');
// // }
  
// // });







// $.confirm({
//   buttons: {
//         info: {
//             btnClass: 'confirm',
//             action: function(){
//               closeIcon: true
//             };
//         }
//     }
// });




// $(document).ready(function () {


    
// $('h4').css('border' , '5px solid #00F');


// });



// $(document).ready(function () {

//     var chart = $('#container1').highcharts();

//     chart.series[0].setData(array2);

//     chart.redraw();
// });