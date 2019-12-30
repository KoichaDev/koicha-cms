// This is code for the checkbox from the view_all_posts. 

document.addEventListener('DOMContentLoaded', () =>{

    document.getElementById('select-all-boxes').addEventListener('click', () => {
        
        const checkBox = document.getElementById('select-a-check-box');
        console.log(checkBox);
        
        if(checkBox.checked === false ) {
            [...checkBox.form.elements].forEach(input => {
                input.checked = true;
            });
        } else {
            [...checkBox.form.elements].forEach(input => {
                input.checked = false;
            });
        }
            
    });
});