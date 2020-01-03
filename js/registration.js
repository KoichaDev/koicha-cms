class UI {
    showAlert(msg, className, id) {
        this.clearAlert();
        // Create div
        const div = document.createElement('div');
        // Add classes
        div.className = `alert ${className}`;
        // Add text node
        div.appendChild(document.createTextNode(msg));
        // Get parent
        const parent = document.getElementById(id);
    
        // Insert alert
        parent.parentNode.insertBefore(div, parent);

        // Timeout after 3 sec
        setTimeout(() => {
            this.clearAlert();
        }, 3000);
    }

    clearAlert() {
        const currentAlert = document.querySelector('.alert.error');
        if(currentAlert) {
            currentAlert.remove();
        }
    } 

    checkPass() {
        document.getElementById('password').addEventListener('keyup', () => {
            const password = document.getElementById('password').value;
            const strengthBar = document.querySelector('.progress-bar');
            let increment = 0;

            if(password.length < 1) {
                increment++;
                strengthBar.innerHTML = "0%"
                strengthBar.style.width = "0%";
            } else if (password.length < 2) {
                increment++;
                strengthBar.innerHTML = "12.5%"
                strengthBar.style.width = "12.5%";
                strengthBar.style.backgroundColor = "#DC3545";
            } else if (password.length < 3) {
                increment++;
                strengthBar.innerHTML = "25%"
                strengthBar.style.width = "25%";
                strengthBar.style.backgroundColor = "#DC3545";
            } else if(password.length < 4) {
                increment++;
                strengthBar.innerHTML = "37.5%"
                strengthBar.style.width = "37.5%";
            } else if(password.length < 5) {
                increment++;
                strengthBar.classList.add('bg-warning')
                strengthBar.innerHTML = "50%"
                strengthBar.style.width = "50%";
                strengthBar.style.backgroundColor = "#FFC107";
            } else if(password.length < 6) {
                increment++;
                strengthBar.innerHTML = "62.5%"
                strengthBar.style.width = "62.5%";
                strengthBar.style.backgroundColor = "#FFC107";
            } else if (password.length < 7) {
                increment++;
                strengthBar.classList.add('bg-info')
                strengthBar.innerHTML = "75%"
                strengthBar.style.width = "75%";
                strengthBar.style.backgroundColor = "#17A2B8";
            } else if (password.length < 8) {
                increment++;
                strengthBar.innerHTML = "88.5%"
                strengthBar.style.width = "88.5%";
                strengthBar.style.backgroundColor = "#17A2B8";
            } else if (password.length < 9) {
                increment++;
                strengthBar.classList.add('bg-success')
                strengthBar.innerHTML = "100%"
                strengthBar.style.width = "100%";
                strengthBar.style.backgroundColor = "#28A745";
            } 
        });
    }  
}

if (window.location.pathname === '/registration.php') {
    
    const ui = new UI();
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const email = document.getElementById('email');
    ui.checkPass();

   
    document.getElementById('register').addEventListener('click', (e) => {

        if(username.value === '' || email.value == '' || password.value === '') {
            e.preventDefault();
            ui.showAlert('Field cannot be empty', 'error', 'username');
        }

        if(username.value === '') {
            e.preventDefault();
            ui.showAlert('Username cannot be empty.', 'error', 'username');
        } 

        if(email.value === '') {
            e.preventDefault();
            ui.showAlert('email cannot be empty.', 'error', 'email');
        }
        
        if (password.value < 8) {
            e.preventDefault();
            ui.showAlert('Passwords must be at least 8 characters long.', 'error', 'password');
        }
    });  
} 