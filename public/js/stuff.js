

  var drawPieChart = function(id, data, colors) {
  var canvas = id;
  var ctx = canvas.getContext('2d');
  var x = canvas.width / 2;
      y = canvas.height / 2;
  var color,
      startAngle,
      endAngle,
      total = 100;
  
  for(var i=0; i<data.length; i++) {
    color = colors[i];
    startAngle = calculateStart(data, i, total);
    endAngle = calculateEnd(data, i, total);
    
    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.moveTo(x, y);
    ctx.arc(x, y, y-20, startAngle, endAngle);
    ctx.fill();
 /*   ctx.rect(canvas.width - 200, y - i * 30, 12, 12);
    ctx.fill();
    ctx.font = "13px sans-serif";
    ctx.fillText(data[i].label + " - " + data[i].value + " (" + calculatePercent(data[i].value, total) + "%)", canvas.width - 200 + 20, y - i * 30 + 10);
    */
  }
};

var calculatePercent = function(value, total) {
  
  return (value / total * 100).toFixed(2);
};

/*var getTotal = function(data) {
  var sum = 0;
  for(var i=0; i<data.length; i++) {
    sum += data[i].value;
  }
      
  return sum;
};*/

var calculateStart = function(data, index, total) {
  if(index === 0) {
    return 0;
  }
  
  return calculateEnd(data, index-1, total);
};

var calculateEndAngle = function(data, index, total) {
  var angle = data[index].value / total * 360;
  var inc = ( index === 0 ) ? 0 : calculateEndAngle(data, index-1, total);
  
  return ( angle + inc );
};

var calculateEnd = function(data, index, total) {
  
  return degreeToRadians(calculateEndAngle(data, index, total));
};

var degreeToRadians = function(angle) {
  return angle * Math.PI / 180
}



var clintonValue1 = $('#poll1cont p span.clinton').text();
var trumpValue1 = $('#poll1cont p span.trump').text();
var otherValue1 = $('#poll1cont p span.other').text();

var clintonValue2 = $('#poll2cont p span.clinton').text();
var trumpValue2 = $('#poll2cont p span.trump').text();
var otherValue2 = $('#poll2cont p span.other').text();

var clintonValue3 = $('#poll3cont p span.clinton').text();
var trumpValue3 = $('#poll3cont p span.trump').text();
var otherValue3 = $('#poll3cont p span.other').text();

var clintonValue4 = $('#poll4cont p span.clinton').text();
var trumpValue4 = $('#poll4cont p span.trump').text();
var otherValue4 = $('#poll4cont p span.other').text();

var clintonValue5 = $('#poll5cont p span.clinton').text();
var trumpValue5 = $('#poll5cont p span.trump').text();
var otherValue5 = $('#poll5cont p span.other').text();


var data1 = [
  { label: 'Clinton ', value: clintonValue1 },
  { label: 'Trump', value: trumpValue1 },
  { label: 'Other', value: otherValue1 },
];


var data2 = [
  { label: 'Clinton ', value: clintonValue2 },
  { label: 'Trump', value: trumpValue2 },
  { label: 'Other', value: otherValue2 },
];


var data3 = [
  { label: 'Clinton ', value: clintonValue3 },
  { label: 'Trump', value: trumpValue3 },
  { label: 'Other', value: otherValue3 },
];


var data4 = [
  { label: 'Clinton ', value: clintonValue4 },
  { label: 'Trump', value: trumpValue4 },
  { label: 'Other', value: otherValue4 },
];


var data5 = [
  { label: 'Clinton ', value: clintonValue5 },
  { label: 'Trump', value: trumpValue5 },
  { label: 'Other', value: otherValue5 },
];





var colors = [ '#4a476b', '#d46f46', '#d3cfbb' ];



drawPieChart(poll1, data1, colors);
drawPieChart(poll2, data2, colors);
drawPieChart(poll3, data3, colors);
drawPieChart(poll4, data4, colors);
drawPieChart(poll5, data5, colors);




$('div.poll').has('span.other:contains(100)').remove()
