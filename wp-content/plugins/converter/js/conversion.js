
jQuery(document).ready(function ($) {

var operatorValue;
setLable(); 
setCalculator();
$('.remove_field').hide();
$('.weight-calculation').on('change', function() {
  setLable(); 
  $('.convert-into').val("");
});

$('.aviation-calculation').on('change', function() {
  setCalculator();
});

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
      case 'CTI': $('.from-measurement').html('Centimetres');
                  $('.into-measurement').html('Inches');    
                  operatorValue = 0.3937;     
                  break;
      case 'ITC': $('.from-measurement').html('Inches');
                  $('.into-measurement').html('Centimetres');   
                  operatorValue = 2.54;      
                  break;  
      case 'CTM': $('.from-measurement').html('Centimetres');
                  $('.into-measurement').html('Metres');
                  operatorValue = 0.01;         
                  break;   
      case 'MTC': $('.from-measurement').html('Metres');
                  $('.into-measurement').html('Centimetres');
                  operatorValue = 100;          
                  break; 
      case 'FTC': $('.from-measurement').html('Feets');
                  $('.into-measurement').html('Centimetres'); 
                  operatorValue = 30.48;         
                  break;   
      case 'FTI': $('.from-measurement').html('Feets');
                  $('.into-measurement').html('Inches');  
                  operatorValue = 12;        
                  break; 
      case 'FTM': $('.from-measurement').html('Feets');
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
  $('.convert-into').val(fromValue*operatorValue);
});

$(".cbm-add-row").click(function(){
  var rowcount = (parseInt($('.cbm-calculate').attr("data-id"))+1);
  var html ="";
  html += '<div class="cbm-row-'+rowcount+'">';
		html += '<label for="cbmlength-'+rowcount+'">Length</label>';
		html += '<input type="text" name="cbmlength-'+rowcount+'" class ="cbmlength-'+rowcount+'" placeholder="100"><br>';
		html += '<label for="cbmbreadth-'+rowcount+'">Breadth</label>';
		html += '<input type="text" name="cbmbreadth-'+rowcount+'" class ="cbmbreadth-'+rowcount+'" placeholder="100"><br>';
		html += '<label for="cbmwidth-'+rowcount+'">Width</label>';
    html += '<input type="text" name="cbmwidth-'+rowcount+'" class ="cbmwidth-'+rowcount+'" placeholder="100"><br>';
    html += '<label for="cbmpieces-'+rowcount+'">Pieces</label>';
		html += '<input type="text" name="cbmpieces-'+rowcount+'" class ="cbmpieces-'+rowcount+'" placeholder="100"><br>';
		html += '<label for="cbmvolume-'+rowcount+'">Volume</label>';
		html += '<input type="text" name="cbmvolume-'+rowcount+'" class ="cbmvolume-'+rowcount+'" placeholder="100"><br>';
		html += '<label for="cbmcbm-'+rowcount+'">CBM</label>';
    html += '<input type="text" name="cbmcbm-'+rowcount+'" class ="cbmcbm-'+rowcount+'" placeholder="100"><br>';
  html += '</div>';
  $('.cbm-calculate').attr("data-id",rowcount);
  $('.cbm-table').append(html);
  $('.remove_field').show();
});

$(".cbm-calculate").click(function(){
    var totalVolume = 0;
    var totalCbm = 0;
    var rows = $('.cbm-calculate').attr("data-id");
    for(var i=1;i<=rows;i++){
      var length = $('.cbmlength-'+i).val();
      var breadth = $('.cbmbreadth-'+i).val();
      var width = $('.cbmwidth-'+i).val();
      var pieces = $('.cbmpieces-'+i).val();
      var volume = (length*breadth*width*pieces)/6000;
      var cbm = volume.toFixed(2)/166.66;
      $('.cbmvolume-'+i).val(volume.toFixed(2));
      $('.cbmcbm-'+i).val(cbm.toFixed(2));
    }
    for(var j=1;j<=rows;j++){
      totalVolume = totalVolume + parseFloat($('.cbmvolume-'+j).val());   
      totalCbm = totalCbm + parseFloat($('.cbmcbm-'+j).val());     
    }
    $('.cbm-total-volume').val(totalVolume);
    $('.cbm-total').val(totalCbm);
});

$('.remove_field').click(function(){
  var lastrow = (parseInt($('.cbm-calculate').attr("data-id")));
  $('.cbm-row-'+lastrow).remove();
  if(lastrow==2){
    $('.remove_field').hide();
  }
  $('.cbm-calculate').attr("data-id",lastrow-1);
});

$(".nas-calculate").click(function(){
  var weightInKG = $('.weight-in-kg').val();
  var thc;
  weightInKG = Number(weightInKG);
  if(weightInKG <= 100){
    thc = 2.000;    
  } else if (weightInKG <= 1000 && weightInKG > 100){
    thc = 2+(-(Math.floor(-(weightInKG-100)/50))*0.5);
    thc = thc.toFixed(3);
  }else if (weightInKG <= 5000 && weightInKG > 1000){
    thc = 2+9+(-(Math.floor(-(weightInKG-1000)/50))*0.25);
    thc = thc.toFixed(3);
  } else if (weightInKG > 5000){
    thc = 2+9+20+(-(Math.floor(-(weightInKG-5000)/50))*0.15);
    thc = thc.toFixed(3);
  }
  $('.nas-formula').val(thc);
  $('.thc-in-kd').val(thc);
});

function round(value, decimals) {
  return Number(Math.round(value+'e'+decimals)+'e-'+decimals);
}
});

