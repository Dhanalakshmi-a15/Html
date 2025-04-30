var questions=[{
    "question":"which is the program run the browser?",
    "option1":"java",
    "option2":"python",
    "option3":"c",
    "option4":"javascript",
    "answer":"4",
},
{
"question":"which is the single integrsted ciecuit?",
    "option1":"java",
    "option2":"python",
    "option3":"c",
    "option1":"javascript",
},
{
    "question":"whih of following is the must powerful type of coumputer?",
    "option1":"super-micro",
    "option2":"super-conductor",
    "option3":"super computer",
    "option1":"megaframe",
    "answer":"3",
}]
var question=document.getElementById('question');
var optoin1=document.getElementById('option1');
var option2=document.getElementById('option2');
var option3=document.getElementById('option3');
var option4=document.getElementById('option4');
var result=document.getElementById('result');
var currentQuestion=0;
var totalquestions=questions.length;
function loadQuestion(index){
    var data=questions[index];
    question.textcontent=(index + 1)+'.'+data.question;
    optoin1.textcontent=data.option1;
    option2.textcontent=data.option2;
    option3.textcontent=data.option3;
    option4.textcontent=data.option4;
};
