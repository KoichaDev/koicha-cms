// Modal for the delete a:href link of view all post
if (window.location.pathname === '/admin/posts.php') {
    // Getting the element of the tBody and td 
    const tbodyTD = document.querySelectorAll('tbody td');
    const modalBtn = document.getElementById('modal-btn');
    // Hide the button of the modal
    modalBtn.style.display = 'none';

    // Looping through the element of tbody and td
    tbodyTD.forEach(td => {
        // When looping through, we want to get the className of the element 
        td.querySelectorAll('.delete-post').forEach(deleteLink => {

            // After Looping through. We want to make element when we click, so it can do something
            deleteLink.addEventListener('click', () => {

                // Getting the element of "delete button" from the modal
                const deleteBtn = document.querySelectorAll('.btn.btn-danger.modal-delete-link')[0];
                // The deleteBtn from the modal contains empty href. 
                // We want to match the original href link from the Delete button from the column of the posts.php
                deleteBtn.href = deleteLink.href;
                // When clicked on the 'delete' href, it will pop up a modal
                modalBtn.click();                                       
            });
        });
    });

}