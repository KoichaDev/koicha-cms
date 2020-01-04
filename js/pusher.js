

document.addEventListener('DOMContentLoaded', () => {
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    const pusher = new Pusher('8ecd672d4e1e5fd6cce2', {
        cluster: 'eu',
        forceTLS: true
    });

    const notificationChannel = pusher.subscribe('notifications');
    notificationChannel.bind('new_user', (notification) => {
        const msg = JSON.stringify(notification)
        toastr.success(`${msg} Just registered!`);
        console.log(msg);
    });
});