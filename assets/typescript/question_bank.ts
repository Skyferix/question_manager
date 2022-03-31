
class QuestionBank {
    private submit_btn: HTMLButtonElement;
    private error_div: HTMLDivElement;

    constructor() {
        this.set_variables();
        this.set_listeners();
    }
    public get_error_div():HTMLDivElement{
        return this.error_div;
    }

    private set_variables(){
        this.submit_btn = document.querySelector("button[type=submit]");
        this.error_div = document.querySelector("div#error-message");
    }
    private set_listeners(){
        this.submit_btn.addEventListener('click',this.submit);
    }

    private submit(ev:Event & {target: HTMLInputElement}){
        ev.preventDefault();
        let form_data = $('#add-question-bank-form').serialize();
        console.log(form_data);
        $.post({
            url: '/admin/question_bank/add',
            data: form_data,
            success: function (data){
                location.reload();
            },
            error: function (data){
                let error_div = new QuestionBank().get_error_div();
                let message = '';
                if(data.status == 400) {
                    message = data.responseText;
                } else {
                    let messages = JSON.parse(data.responseText);
                    message = messages.message;
                    console.log(messages.advanced_message);
                }
                error_div.innerHTML = message;


            }
        })
    }
}
new QuestionBank();