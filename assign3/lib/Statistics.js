/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function addNumbers(){
    var inputValues = document.getElementById("numValues").value;//values entered by the user
    var listBox = document.getElementById("listBox");//a list of user entered values
    var option = document.createElement("option"); //values that are moved into the list box
    
    listBox.options.add(option);
    option.textContent = inputValues;
    
}
function addToSelect(){
    var oSelField = document.getElementById("selectField");
    var oOption = document.getElementById("Option");
    
    oSelField.select.options.add(oOption);
}
function getStatistics(){
    var dataSet = [];
    var select = document.getElementById("listBox");
    for (i=0; i<select.options.length; i++){
        dataSet[i] = parseInt(select.options[i].text);
    }
    document.getElementById("sum").value = calcSum(dataSet);
    document.getElementById("mean").value = calcMean(dataSet);
    document.getElementById("median").value = calcMedian(dataSet);
    document.getElementById("mode").value = calcMode(dataSet);
    document.getElementById("variance").value = calcVariance(dataSet);
    document.getElementById("stdDev").value = calcstdDev(dataSet);
}
    
function findN(dataSet){
    return parseInt(dataSet.length);
}
function calcSum(dataSet){
    var sum=0;
    for (i=0; i<dataSet.length; i++){
        sum += parseInt(dataSet[i].valueOf());
    }
    return sum;
}
function calcstdDev(dataSet){
    var Variance = parseInt((calcVariance(dataSet) * calcVariance(dataSet)).valueOf());
    return Variance;
}

function calcVariance(dataSet){
    var sqrMean = (calcMean(dataSet)*calcMean(dataSet))/findN(dataSet);
    var sumMean = calcSum(dataSet);
    var numerator = 0;
    for (i=0; i<dataSet.length; i++){
        numerator = parseInt(sumMean - sqrMean);
    }
    return Math.sqrt(numerator/findN(dataSet));
}
function calcMean(dataSet){
    var mean = calcSum(dataSet)/findN(dataSet);
    return parseInt(mean.valueOf());
}
function calcMedian(dataSet){
    var sorted = dataSet.sort();
    var middle = parseInt(findN(sorted)/2);
    if (sorted.length%2 === 1)
        return sorted[middle];
    else
        return ((sorted[middle-1] + sorted[middle]) / 2);
}
function calcMode(dataSet){
    var mode, maxCount=0;

    for (i=0; i<dataSet.length; ++i){
        var frequency = 0;
        for (j = 0; j<dataSet.length; ++j){
            if (dataSet[j] === dataSet[i]) ++frequency;
        }
        if (frequency > maxCount) {
            maxCount = frequency;
            mode = dataSet[i];
        }
    }
    return parseInt(mode.valueOf());
}

