const tabButtons = document.querySelectorAll('.tab-button');
const tabContents = document.querySelectorAll('.tab-content');

tabButtons.forEach(button => {
    button.addEventListener('click', () => {
        const tab = button.dataset.tab;

        tabButtons.forEach(btn => {
            if (btn !== button) {
                btn.classList.remove('active');
            }
        });

        tabContents.forEach(content => {
            if (content.id !== tab) {
                content.classList.remove('active');
            }
        });

        button.classList.add('active');
        document.getElementById(tab).classList.add('active');

        // Hide processes for other subjects
        tabContents.forEach(content => {
            if (content.id !== tab) {
                const questions = content.querySelectorAll('.question');
                questions.forEach(question => {
                    question.classList.remove('active');
                    const answer = question.querySelector('p');
                    answer.classList.remove('show');
                });
            }
        });
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

let profileClicked = false;

function navigateToProfile(event) {
    if (!profileClicked) {
        profileClicked = true;
        setTimeout(() => {
            window.location.href = event.target.href;
        }, 100);
    } else {
        event.preventDefault();
    }
}

