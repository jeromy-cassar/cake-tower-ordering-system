//---GLOBAL VARIABLES---
//quantity variables
var numOfCupcakes;
var numOfCakes;
var numOfSlices;
//price/total variables
var totalCupcakes;
var priceCupcakes;

var totalCakes;
var priceCakes;

var totalSlices;
var priceSlices;

//---INCREASE QUANTITY---
//cupcake
function plusCupcake(){
  if(document.getElementById('quantityCupcake').value > -1){
    //increment
    document.getElementById('quantityCupcake').value++;
    //calculate total and price
    totalCupcakes = document.getElementById('quantityCupcake').value * 2.50;
    priceCupcakes = '$'+totalCupcakes.toFixed(2);
    document.getElementById('costCupcake').innerHTML = priceCupcakes;
  }
}
//cake
function plusCake(){
  if(document.getElementById('quantityCake').value > -1){
    //increment
    document.getElementById('quantityCake').value++;
    //calculate total and price
    totalCakes = document.getElementById('quantityCake').value * 100.00;
    priceCakes = '$'+totalCakes.toFixed(2);
    document.getElementById('costCake').innerHTML = priceCakes;
  }
}
//slices
function plusSlice(){
  if(document.getElementById('quantitySlice').value > -1){
    //increment
    document.getElementById('quantitySlice').value++;
    //calculate total and price
    totalSlices = document.getElementById('quantitySlice').value * 2.50;
    priceSlices = '$'+totalSlices.toFixed(2);
    document.getElementById('costSlice').innerHTML = priceSlices;
  }
}
//---DECREASE QUANTITY---
//cupcake
function minusCupcake(){
  if(document.getElementById('quantityCupcake').value < 0){
    document.getElementById('quantityCupcake').value = 0;
  } else if(document.getElementById('quantityCupcake').value > 0) {
    //decrement
    document.getElementById('quantityCupcake').value--;
    //calculate total and price
    totalCupcakes = document.getElementById('quantityCupcake').value * 2.50;
    priceCupcakes = '$'+totalCupcakes.toFixed(2);
    document.getElementById('costCupcake').innerHTML = priceCupcakes;
  }
}
//cake
function minusCake(){
  if(document.getElementById('quantityCake').value < 0){
    document.getElementById('quantityCake').value = 0;
  } else if(document.getElementById('quantityCake').value > 0) {
    //decrement
    document.getElementById('quantityCake').value--;
    //calculate total and price
    totalCakes = document.getElementById('quantityCake').value * 100.00;
    priceCakes = '$'+totalCakes.toFixed(2);
    document.getElementById('costCake').innerHTML = priceCakes;
  }
}
//slices
function minusSlice(){
  if(document.getElementById('quantitySlice').value < 0){
    document.getElementById('quantitySlice').value = 0;
  } else if(document.getElementById('quantitySlice').value > 0) {
    //decrement
    document.getElementById('quantitySlice').value--;
    //calculate total and price
    totalSlices = document.getElementById('quantitySlice').value * 2.50;
    priceSlices = '$'+totalSlices.toFixed(2);
    document.getElementById('costSlice').innerHTML = priceSlices;
  }
}
//calculate price and quantity when the user enters a number
function calcCupcake(){
  numOfCupcakes = document.getElementById('quantityCupcake').value;
  //calculate total and price
  if(!isNaN(document.getElementById('quantityCupcake').value)){
  totalCupcakes = numOfCupcakes * 2.50;
  priceCupcakes = '$'+totalCupcakes.toFixed(2);
  document.getElementById('costCupcake').innerHTML = priceCupcakes;
  }
}
function calcCake(){
  numOfCakes = document.getElementById('quantityCake').value;
  //calculate total and price
  if(!isNaN(document.getElementById('quantityCake').value)){
  totalCakes = numOfCakes * 100.00;
  priceCakes = '$'+totalCakes.toFixed(2);
  document.getElementById('costCake').innerHTML = priceCakes;
  }
}
function calcSlice(){
  numOfSlices = document.getElementById('quantitySlice').value;
  //calculate total and price
  if(!isNaN(document.getElementById('quantitySlice').value)){
  totalSlices = numOfSlices * 2.50;
  priceSlices = '$'+totalSlices.toFixed(2);
  document.getElementById('costSlice').innerHTML = priceSlices;
  }
}
//---VALIDATE FORM CLIENT SIDE---
function validateCupcake() {
  var submit = "true";
  //check if quantity is a negative integer
  if(document.getElementById('quantityCupcake').value <= 0)
  {
  alert("Error! Quantity cannot be a negative integer or zero. Please re-enter");
  document.getElementById('costCupcake').innerHTML = "$0.00";
  document.getElementById('quantityCupcake').value = 0;
  submit = "false";
  } else if(document.getElementById('quantityCupcake').value == "")
    {
      alert("Error! Please enter quantity");
      submit="false";
    }
//check if form is ready to submit
  if(submit == "false")
  {
    return false;
  }
  if(submit == "true")
  {
    alert("Item successfully added to cart");
    return true;
  }
}
function validateCake() {
  var submit = "true";
  //check if quantity is a negative integer
  if(document.getElementById('quantityCake').value <= 0)
  {
  alert("Error! Quantity cannot be a negative integer or zero. Please re-enter");
  document.getElementById('costCake').innerHTML = "$0.00";
  document.getElementById('quantityCake').value = 0;
  submit = "false";
  } else if(document.getElementById('quantityCake').value == "")
    {
      alert("Error! Please enter quantity");
      submit="false";
    }
//check if form is ready to submit
  if(submit == "false")
  {
    return false;
  }
  if(submit == "true")
  {
    alert("Item successfully added to cart");
    return true;
  }
}
function validateSlice() {
  var submit = "true";
  //check if quantity is a negative integer
  if(document.getElementById('quantitySlice').value <= 0)
  {
  alert("Error! Quantity cannot be a negative integer or zero. Please re-enter");
  document.getElementById('costSlice').innerHTML = "$0.00";
  document.getElementById('quantitySlice').value = 0;
  submit = "false";
} else if(document.getElementById('quantitySlice').value == "")
    {
      alert("Error! Please enter quantity");
      submit="false";
    }
//check if form is ready to submit
  if(submit == "false")
  {
    return false;
  }
  if(submit == "true")
  {
    alert("Item successfully added to cart");
    return true;
  }
}

//---REMOVE NON-INTEGER VALUES---
function restrict(input){
  var regex = /^[-0-9]{3}/g; //only accepts negative numbers up to 9
  input.value = input.value.replace(regex, "");
}
//check for VISA
function visa(){
  var cardNum = document.getElementsByClassName("credit-area").value;
  var visaRegex = /^[4]{1}[0-9]{15}|[4]{1}[0-9]{3}\s[0-9]{4}\s[0-9]{4}\s[0-9]{4}$/;
  var validCard = false;
  var image = document.getElementsByClassName('visa-logo');
  image.style.visibility = "hidden";
  //check if credit card number matches VISA
  if(visaRegex.test(cardNum)){
    valid = true;
    image.style.visibility = "visible";
  }
}
