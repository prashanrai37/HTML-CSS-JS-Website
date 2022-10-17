function check() {

    console.log("Hello World")

  var c = 0;
  var q1 = document.quiz.question1.value;
  var q2 = document.quiz.question2.value;
  var q3 = document.quiz.question3.value;

  var quiz = document.getElementById('mm_quiz');

  if (q1 == '1a') {
    c++;
  }
  if (q2 == '2c') {
    c++;
  }
  if (q3 == '3a') {
    c++;
  }
  quiz.style.display = 'none';

  if (c < 3) {
    document.getElementById('result') = `You got ${c} out of 3. Try again.`;
  } else {
    document.getElementById('result') = `Congratulations! You got ${c} out of 3.`;
  }
}
