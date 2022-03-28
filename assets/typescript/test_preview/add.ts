import ClickEvent = JQuery.ClickEvent;

class TestAdd {
    private openAddModalBtn: HTMLOptionElement;

    constructor(){
        this.setVariables();
        this.setListeners();
    }

    private setVariables(){
        this.openAddModalBtn = document.querySelector("option#create-template\n");
    }

    private setListeners(){
        this.openAddModalBtn.addEventListener('click', TestAdd.showModal);
    }

    private static showModal(ev: Event) {
    }
}
let addStudent = new TestAdd();