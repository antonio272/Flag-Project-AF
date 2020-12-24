console.log("#### app.js: carregado ####");

const novoPostinBotao = document.getElementById("newPostiniBtn");
novoPostinBotao.addEventListener("click", mostraFormPost);

function mostraFormPost() {
    let formDiv = document.getElementById("formulario");
    if (formDiv.style.display === "none") {
        formDiv.style.display = "block";
    }
    else {
        formDiv.style.display = "none";
    }
}

/*Dropdowns form booking process*/
document.addEventListener("DOMContentLoaded", async () => {
                
    const Form = document.getElementById("Form");
    const specialtiesDropdown = document.getElementById("specialties");

    
    specialtiesDropdown.addEventListener("change", () => {
        
        const existingMessageDropdown = document.getElementById("messages");
        if(existingMessageDropdown) {
            existingMessageDropdown.remove();
        }
        
        const existingSubmitButton = document.getElementById("submit");
        if(existingSubmitButton) {
            existingSubmitButton.remove();
        }

        
        if(specialtiesDropdown.value) {
            
            Form.appendChild(document.createElement("select"));
            const doctorsDropdown = Form.lastElementChild;

            doctorsDropdown.setAttribute("id", "doctor");
            doctorsDropdown.setAttribute("name", "doctor_id");
            doctorsDropdown.setAttribute("class", "dropdowns");
            doctorsDropdown.setAttribute("aria-label", "doctor");
            doctorsDropdown.setAttribute("required", "required");

            
            doctorsDropdown.appendChild(document.createElement("option"));
            doctorsDropdown.lastElementChild.value = "";
            doctorsDropdown.lastElementChild.textContent = "-- Select a Doctor --"

            
            fetch("./controller/requests.php?request=selectDoctors&specialty_id=" + specialtiesDropdown.value)
                .then((response) => response.json())
                .then((messages) => {
                    
                    for(let message of messages) {
                        doctorsDropdown.appendChild(document.createElement("option"));
                        doctorsDropdown.lastElementChild.value = message.doctor_id;
                        doctorsDropdown.lastElementChild.textContent = message.name;
                    }
                })
            ;
            
            doctorsDropdown.addEventListener("change", () => {
                
                    
                    if(doctorsDropdown.value) {
                        
                        Form.appendChild(document.createElement("select"));
                        const datehourDropdown = Form.lastElementChild;

                        datehourDropdown.setAttribute("id", "datehour");
                        datehourDropdown.setAttribute("name", "datehour");
                        datehourDropdown.setAttribute("class", "dropdowns");
                        datehourDropdown.setAttribute("aria-label", "datehour");
                        datehourDropdown.setAttribute("required", "required");

                        
                        datehourDropdown.appendChild(document.createElement("option"));
                        datehourDropdown.lastElementChild.value = "";
                        datehourDropdown.lastElementChild.textContent = "-- Choose a date/time: --"
                        

                        fetch("./controller/requests.php?request=selectDatehour&specialty_id=" + specialtiesDropdown.value + "&doctor_id=" + doctorsDropdown.value)
                            .then((response) => response.json())
                            .then((texts) => {
                                
                                for(let text of texts) {
                                    console.log(text);
                                    datehourDropdown.appendChild(document.createElement("option"));
                                    datehourDropdown.lastElementChild.value = text.id;
                                    datehourDropdown.lastElementChild.textContent = text.value;
                                }
                            })
                        ;
                        
                    }
                               
                        Form.appendChild(document.createElement("button"));
                                const submitButton = Form.lastElementChild;
                                submitButton.setAttribute("id", "submit");
                                submitButton.setAttribute("class", "btn-pink");
                                submitButton.setAttribute("name", "send");
                                submitButton.textContent = "OK";
                  
            });
                                
        }
    });
           
});
