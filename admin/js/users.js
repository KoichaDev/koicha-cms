document.addEventListener('DOMContentLoaded', (e) => {

    if (window.location.pathname === '/admin/users.php') {
        document.getElementById('delete-user').addEventListener('click', () => {
            confirm('Are you sure you want to delete?');

        })
    }


});