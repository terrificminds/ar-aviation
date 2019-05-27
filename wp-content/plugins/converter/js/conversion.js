
jQuery(document).ready(function ($) {

var operatorValue;
setLable(); 
setCalculator();
$('.weight-calculation').on('change', function() {
  setLable(); 
  $('.convert-into').val("");
});

$('.aviation-calculation').on('change', function() {
  setCalculator();
  resetCalculator();
});

$('.reset-calculator').on('click', function() {
  resetCalculator();
});

function resetCalculator(){
  removeRows();
  $('.aviation-calculation-wrapper').find(':input').each(function () {
    switch (this.type) {
      case 'text': $(this).val('');
      break;
    }
  });
}

function removeRows(){
  var limit = $('.cbm-calculate').attr("data-id");
  for(var i=1;i<=limit;i++){
    $('.cbm-row').eq(1).remove();
  }
  $('.cbm-calculate').attr("data-id",1);
}

function setCalculator(){
  var calculator = $('.aviation-calculation').val();
  if(calculator == 'COW'){
    $('.weight-calc').show();
    $('.nas-calc').hide();
    $('.cbm-calculation').hide();
  }
  if (calculator == 'VOW') {
    $('.weight-calc').hide();
    $('.nas-calc').hide();
    $('.cbm-calculation').show();
  }
  if (calculator == 'NAC') {
    $('.weight-calc').hide();
    $('.nas-calc').show();
    $('.cbm-calculation').hide();
  }
}

function setLable(){
  var operation = $('.weight-calculation').val();
    switch (operation) {
      case 'CTI': $('.from-measurement').html('Centimeters');
                  $('.into-measurement').html('Inches');    
                  operatorValue = 0.3937;     
                  break;
      case 'ITC': $('.from-measurement').html('Inches');
                  $('.into-measurement').html('Centimeters');   
                  operatorValue = 2.54;      
                  break;  
      case 'CTM': $('.from-measurement').html('Centimeters');
                  $('.into-measurement').html('Metres');
                  operatorValue = 0.01;         
                  break;   
      case 'MTC': $('.from-measurement').html('Metres');
                  $('.into-measurement').html('Centimeters');
                  operatorValue = 100;          
                  break; 
      case 'FTC': $('.from-measurement').html('Feet');
                  $('.into-measurement').html('Centimeters'); 
                  operatorValue = 30.48;         
                  break;   
      case 'FTI': $('.from-measurement').html('Feet');
                  $('.into-measurement').html('Inches');  
                  operatorValue = 12;        
                  break; 
      case 'FTM': $('.from-measurement').html('Feet');
                  $('.into-measurement').html('Metres');
                  operatorValue = 0.3048;          
                  break;  
      case 'CTK': $('.from-measurement').html('CBM');
                  $('.into-measurement').html('Kgs'); 
                  operatorValue = 167;         
                  break;                                                                                             
    }
}  

// $( ".convert-from" ).change(function() {
//   //alert( this.value );
//   $('.convert-into').val(this.value*operatorValue);
// });

$(".convert-weight").click(function(){
  var fromValue = $('.convert-from').val();
  var result = fromValue*operatorValue;
  if(isNaN(result)){
    alert('Please enter a valid input');
   }else{
    $('.convert-into').val(result.toFixed(4));
  }
});

$(".cbm-add-row").click(function(){
  var rowcount = (parseInt($('.cbm-calculate').attr("data-id"))+1);
  var html ="";
  html += '<div class="cbm-row cbm-row-'+rowcount+' add-calc-row">';
		html += '<span><label for="cbmlength-1">Length</label>';
		html += '<input type="text" name="cbmlength-1" class ="cbmlength-1" placeholder="0" maxlength="5"></span>';
		html += '<span><label for="cbmbreadth-1">Breadth</label>';
		html += '<input type="text" name="cbmbreadth-1" class ="cbmbreadth-1" placeholder="0" maxlength="5"></span>';
		html += '<span><label for="cbmwidth-1">Width</label>';
    html += '<input type="text" name="cbmwidth-1" class ="cbmwidth-1" placeholder="0" maxlength="5"></span>';
    html += '<span><label for="cbmpieces-1">Pieces</label>';
		html += '<input type="text" name="cbmpieces-1" class ="cbmpieces-1" placeholder="0" maxlength="5"></span>';
		html += '<span><label for="cbmvolume-1">Volume</label>';
		html += '<input type="text" name="cbmvolume-1" class ="cbmvolume-1" placeholder="0" readonly></span>';
		html += '<span><label for="cbmcbm-1">CBM</label>';
    html += '<input type="text" name="cbmcbm-1" class ="cbmcbm-1" placeholder="0" readonly></span>';
    html += '<div class="remove-btn"><input type="button" value="Remove" class="remove_field_1"/></div>';
  html += '</div>';
  $('.cbm-calculate').attr("data-id",rowcount);
  $('.cbm-table').append(html);
});

$(document).on('click', '.remove_field_1', function (event) {
  $(this).closest('.cbm-row').remove();
  var rowcount = (parseInt($('.cbm-calculate').attr("data-id"))-1);
  $('.cbm-calculate').attr("data-id",rowcount);
  calculate();
});  

$(document).on('click', '.cbm-calculate', function (event) {
  calculate();
});

function calculate(){
    var totalVolume = 0;
    var totalCbm = 0;
    var volume;
    var cbm;
    var rows = $('.cbm-calculate').attr("data-id");
    var length = $('.cbmlength-1').map(function() { return this.value; }).get();
    var breadth = $('.cbmbreadth-1').map(function() { return this.value; }).get();
    var width = $('.cbmwidth-1').map(function() { return this.value; }).get();
    var pieces = $('.cbmpieces-1').map(function() { return this.value; }).get();
    for(var i=0;i<rows;i++){
      volume = (length[i]*breadth[i]*width[i]*pieces[i])/6000;
      cbm = volume.toFixed(2)/166.66;
      $('.cbmvolume-1').eq(i).val(volume.toFixed(4));
      $('.cbmcbm-1').eq(i).val(cbm.toFixed(4));
    }
    for(var j=0;j<rows;j++){
      totalVolume = totalVolume + parseFloat($('.cbmvolume-1').eq(j).val());   
      totalCbm = totalCbm + parseFloat($('.cbmcbm-1').eq(j).val());     
    }
    if(isNaN(totalVolume) || isNaN(totalCbm)){
      $('.cbm-total-volume').val('');
      $('.cbm-total').val('');
      for(var j=1;j<=rows;j++){
        $('.cbmvolume-'+j).val('');   
        $('.cbmcbm-'+j).val('');     
      }
      alert('Please enter a valid input');
     }else{
      $('.cbm-total-volume').val(totalVolume.toFixed(4));
      $('.cbm-total').val(totalCbm.toFixed(4));
    }
}

$(".nas-calculate").click(function(){
  var weightInKG = $('.weight-in-kg').val();
  var thc;
  weightInKG = Number(weightInKG);
  if(weightInKG <= 100){
    thc = 2.000;  
    thc = thc.toFixed(4);  
  } else if (weightInKG <= 1000 && weightInKG > 100){
    thc = 2+(-(Math.floor(-(weightInKG-100)/50))*0.5);
    thc = thc.toFixed(4);
  }else if (weightInKG <= 5000 && weightInKG > 1000){
    thc = 2+9+(-(Math.floor(-(weightInKG-1000)/50))*0.25);
    thc = thc.toFixed(4);
  } else if (weightInKG > 5000){
    thc = 2+9+20+(-(Math.floor(-(weightInKG-5000)/50))*0.15);
    thc = thc.toFixed(4);
  }
  if(isNaN(thc)){
    $('.nas-formula').val('');
    $('.thc-in-kd').val('');
    alert('Please enter a valid input');
   }else{
    $('.nas-formula').val(thc);
    $('.thc-in-kd').val(thc);
  }
});

function round(value, decimals) {
  return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}
});

