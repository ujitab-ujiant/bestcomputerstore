document.addEventListener('DOMContentLoaded', function() {
    const faqQuestions = document.querySelectorAll('.faq-question');

    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const parent = this.parentElement;
            
            parent.classList.toggle('active');
            
            const answer = this.nextElementSibling;
            if (parent.classList.contains('active')) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = 0;
            }
            
            faqQuestions.forEach(q => {
                if (q !== this) {
                    const p = q.parentElement;
                    p.classList.remove('active');
                    q.nextElementSibling.style.maxHeight = 0;
                }
            });
        });
    });
});