
class Opros {
    constructor(formId) {
        this.formId = formId
        this.$form = document.getElementById(formId)

        this.formData = []
        
        if (this.$form){
            
            this.$form.onsubmit = (e) => {
                console.log('11');
                try {
                    this.getFormData()
                } 
                finally {
                    e.preventDefault()
                }

                this.sendData()
                
            }
        }
    }

    getCounterValue(element) {
        let text = element.querySelector('label').textContent
        let otvet = element.querySelector('select').value
         
        return {"q":text, "otv":otvet}
    }

    getCheckValue(element) {
        let input = element.querySelector('input')
        if (input.checked)
            return {"q":input.value, "otv":"Выбран"}
        else    
            return {"q":input.value, "otv":"Не выбран"}
    }
    
    getCheckRadio(element) {
        let input = element.querySelector('input')
        if (input.checked)
            return {"q":input.value, "otv":"Выбран"}
        else    
            return {"q":input.value, "otv":"Не выбран"}
    }

    getTextValue(element) {
        return {"q":element.dataset.question, "otv":element.value}
    }

    getYesnoValue(element) {
        let text = element.querySelector('label').textContent
        let otvet = element.querySelector('select').value
         
        return {"q":text, "otv":otvet}
    }


    getFormData() {
        let questions = this.$form.querySelectorAll(".opros_q")

        for (let i = 0; i < questions.length; i++) {
            let question = {}
            question['question'] =  questions[i].querySelector(".formHead").textContent
            question['type'] = questions[i].dataset.qtype;
            this.formData.push(question)
            
            question['results'] = []

            let otvets = questions[i].querySelectorAll(".otv_blk .otv_variant")

            for (let j = 0; j <  otvets.length; j++) { 
                if (question.type == "counter")
                    question.results.push(this.getCounterValue(otvets[j]))

                if (question.type == "check")
                    question.results.push(this.getCheckValue(otvets[j]))

                if (question.type == "radio")
                    question.results.push(this.getCheckRadio(otvets[j]))

                if (question.type == "text")
                    question.results.push(this.getTextValue(otvets[j]))
                
                if (question.type == "yesno")
                    question.results.push(this.getYesnoValue(otvets[j]))
            }

            let other = questions[i].querySelector(".other_variant input");

            if (other)
                question['other'] = other.value
            else  
                question['other'] = ""
            
        }

        console.log(this.formData)
    }

    sendData(){
        let cid = document.querySelector('#companyid').value
        let opr_name = document.querySelector('#opr_name').value
        let data = new FormData()
        data.append('action', "opros_sendr")
        data.append('nonce', allAjax.nonce)

        data.append('data', JSON.stringify(this.formData) );
        data.append('cid', cid);
        data.append('opr_name', opr_name);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", allAjax.ajaxurl, true);
        xhr.onload = function () {
            alert("Благодарим Вас за участие в опросе");
            document.location.href = "https://rubexgroup.ru/"
        };

        xhr.send(data);
    }
}



document.addEventListener("DOMContentLoaded", () => { 
    const opros = new Opros("oprosForm");    

    

document.querySelectorAll('input[name=q_2]').forEach(radio => {
    radio.addEventListener("change", function (e) { 
        console.log("dd_chenge")
        console.log(radio.value)
        if (radio.value != "Не изменится") {
            q_3.classList.remove("opr_blk_disabled")
            q_4.classList.remove("opr_blk_disabled")
        }else {
            q_3.classList.add("opr_blk_disabled")
            q_4.classList.add("opr_blk_disabled")
            q_3.querySelectorAll('input').forEach(inputElem => {
                inputElem.checked = false;
            })
            
            q_4.querySelectorAll('input').forEach(inputElem => {
                inputElem.checked = false;
            })
        }

    })

})

// if (q_5_q_0)
//     q_5_q_0.addEventListener("change", function (e) { 
//             console.log("dd_chenge")
//             if (q_5_q_0.value != "")
//                 q_5_1.classList.remove("opr_blk_disabled")
//             else
//                 q_5_1.classList.add("opr_blk_disabled")
//         })

// if (q_4_q_0)
//         q_4_q_0.addEventListener("change", function (e) { 
            
//             if (q_4_q_0.value != "10")
//                 q_4_1.classList.remove("opr_blk_disabled")
//             else
//                 q_4_1.classList.add("opr_blk_disabled")
//         })
    

})


