var height = document.getElementById("heightInput");
var weight = document.getElementById("weightInput");
var button = document.getElementById("bmibtn");

var output = document.getElementById("bminum");
var output2 = document.getElementById("figure");

var calc = function () {
    var hValue = height.value / 100;
    var wValue = weight.value;
    var bmi = wValue / (hValue * hValue);
    bmi = Math.floor(bmi * 10) / 10;

    output.innerHTML = bmi;

    if (bmi < 19) {
        output2.innerHTML = "やせ";
    } else if (bmi <= 20) {
        output2.innerHTML = "細身";
    } else if (bmi < 22) {
        output2.innerHTML = "やや細身";
    } else if (bmi <= 23.5) {
        output2.innerHTML = "普通";
    } else if (bmi <= 26) {
        output2.innerHTML = "筋肉質";
    } else {
        output2.innerHTML = "太り過ぎ（筋肉過多）";
    }

}

button.addEventListener("click", calc);


