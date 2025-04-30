const quizData = [
    {
        question: "What is the capital of France?",
        options: ["Berlin", "Paris", "London", "Rome"],
        answer: 1
    },
    {
        question: "What is the largest planet in our solar system?",
        options: ["Earth", "Saturn", "Jupiter", "Uranus"],
        answer: 2
    },
    {
        question: "Who painted the Mona Lisa?",
        options: ["Leonardo da Vinci", "Michelangelo", "Raphael", "Caravaggio"],
        answer: 0
    }
];

let currentQuestion = 0;
let score = 0;

function loadQuestion() {
    const questionElement = document.getElementById("question");
    const optionsElement = document.getElementById("options");

    questionElement.textContent = quizData[currentQuestion].question;

    optionsElement.innerHTML = "";
    quizData[currentQuestion].options.forEach((option, index) => {
        const li = document.createElement("li");
        const button = document.createElement("button");
        button.textContent = option;
        button.onclick = () => checkAnswer(index);
        li.appendChild(button);
        optionsElement.appendChild(li);
    });
}

function checkAnswer(selectedAnswer) {
    if (selectedAnswer === quizData[currentQuestion].answer) {
        score++;
    }

    currentQuestion++;
    if (currentQuestion >= quizData.length) {
        showResult();
    } else {
        loadQuestion();
    }
}

function showResult() {
    const resultElement = document.getElementById("result");
    resultElement.textContent = `Your score is ${score} out of ${quizData.length}`;
    document.getElementById("question").style.display = "none";
    document.getElementById("options").style.display = "none";
    document.getElementById("submit").style.display = "none";
}

loadQuestion();


