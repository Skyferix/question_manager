import ChangeEvent = JQuery.ChangeEvent;

class TestTemplate {
    private all_question_checkbox: HTMLInputElement;
    private number_of_questions: HTMLInputElement;
    private question_number_section: HTMLDivElement;

    constructor() {
        this.set_variables();
        this.set_listeners();
    }

    private set_variables(){
        this.all_question_checkbox = document.querySelector("input#all-question-checkbox");
        this.number_of_questions = document.querySelector("input#number-of-questions");
        this.question_number_section = document.querySelector("div#question-number-section");
    }
    private set_listeners(){
        this.all_question_checkbox.addEventListener('change',this.all_question_checkbox_listener.bind(this));
    }

    private all_question_checkbox_listener(ev:Event & {target: HTMLInputElement}){
        if(ev.target.checked){
            this.number_of_questions.disabled = true;
            this.question_number_section.classList.add('d-none');
        } else {
            this.number_of_questions.disabled = false;
            this.question_number_section.classList.remove('d-none');
        }
    }

}
new TestTemplate();