const questions = [//Declares a questions array that holds quiz data. Each object in the array is one question
    {
        question: "What is the capital of France?",
        answers: [
            { text: "Berlin", correct: false },
            { text: "Madrid", correct: false },
            { text: "Paris", correct: true },
            { text: "Lisbon", correct: false }
        ]
    },
    {
        question: "What is 2 + 2?",
        answers: [
            { text: "3", correct: false },
            { text: "4", correct: true },
            { text: "22", correct: false },
            { text: "5", correct: false }
        ]
    },
    {
        question: "Which planet is known as the Red Planet?",
        answers: [
            { text: "Earth", correct: false },
            { text: "Mars", correct: true },
            { text: "Jupiter", correct: false },
            { text: "Saturn", correct: false }
        ]
    }
];

let currentQuestionIndex = 0;//currentQuestionIndex keeps track of which question you're on.

let score = 0;//score tracks how many correct answers the user has selected.

//dynamicaly update question ,text, button, result etc...

const questionContainer = document.getElementById('question-container');
const questionElement = document.getElementById('question');
const answerButtonsElement = document.getElementById('answer-buttons');
const nextButton = document.getElementById('next-btn');
const resultContainer = document.getElementById('result-container');
const scoreElement = document.getElementById('score');
const restartButton = document.getElementById('restart-btn');

function startQuiz() {//This function initializes the quiz from the beginning.
    currentQuestionIndex = 0;//Resets the question index and score when restarting or starting fresh.
    score = 0;
    questionContainer.classList.remove('hidden');//Makes sure the quiz is visible and the results are hidden.
    resultContainer.classList.add('hidden');//Shows the quiz area.
    nextButton.classList.remove('hidden');//Hides the result area
    showQuestion(questions[currentQuestionIndex]);//Makes sure the Next button is visible.

    js
    Copy
    Edit
    
}

function showQuestion(question) {//shows the first questions
    questionElement.innerText = question.question;//Updates the question text.
    answerButtonsElement.innerHTML = '';//Clears any previous answer buttons
    question.answers.forEach(answer => {  //Creates a button for each answer.
     const button = document.createElement('button'); //When clicked, it calls selectAnswer(answer)
        button.innerText = answer.text;
        button.classList.add('btn');
        button.addEventListener('click', () => selectAnswer(answer));
        answerButtonsElement.appendChild(button);
    });
}
//Checks if the selected answer is correct and adds to the score.

//Shows the Next button so the user can proceed.


function selectAnswer(answer) {
    if (answer.correct) {
        score++;
    }
    nextButton.classList.remove('hidden');
}
//Moves to the next question
function showNextQuestion() {
    currentQuestionIndex++;
    if (currentQuestionIndex < questions.length) {//If there are more questions:
        
        showQuestion(questions[currentQuestionIndex]);//Show the next one.


        nextButton.classList.add('hidden');//Hide the Next button again (until an answer is clicked).
    } else {//If no questions left:
        showScore();//Call showScore().
    }
}

function showScore() {
    questionContainer.classList.add('hidden');//Hides the question container.
    resultContainer.classList.remove('hidden');//Displays the user's final score.
    nextButton.classList.add('hidden');//Shows the result container.
    scoreElement.innerText = `${score} / ${questions.length}`;
}

function restartQuiz() {
     startQuiz();//Just calls startQuiz() again to reset everything.


}

nextButton.addEventListener('click', showNextQuestion);//When the Next button is clicked, go to the next question.
restartButton.addEventListener('click', restartQuiz);//When the Restart button is clicked, reset the quiz

startQuiz();//Automatically starts the quiz when the script runs.

