const tabButtons = document.querySelectorAll('.tab-button');
const tabContents = document.querySelectorAll('.tab-content');

tabButtons.forEach(button => {
    button.addEventListener('click', () => {
        const tab = button.dataset.tab;

        tabButtons.forEach(btn => {
            btn.classList.remove('active');
        });

        tabContents.forEach(content => {
            content.classList.remove('active');
        });

        button.classList.add('active');
        document.getElementById(tab).classList.add('active');
    });
});

const questions = document.querySelectorAll('.question');

questions.forEach(question => {
    const button = question.querySelector('button');
    const answer = question.querySelector('p');

    button.addEventListener('click', () => {
        question.classList.toggle('active');
        const isActive = question.classList.contains('active');

        if (isActive) {
            answer.classList.add('show');
        } else {
            answer.classList.remove('show');
        }
    });
});
