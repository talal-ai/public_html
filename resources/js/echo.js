import Echo from 'laravel-echo';
 
import Pusher from 'pusher-js';
window.Pusher = Pusher;  // Ensure Pusher is globally available

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

// Function to listen for notifications on a dynamic channel based on yearId
function listenForNotifications(studentId) {
    window.Echo.private(`year-notification.${studentId}`)
        .listen('YearNotificationSent', (event) => {
            // Handle the event when it's broadcasted
            console.log('New Notification:', event.message);  // You can log it or show a toast, etc.

            // Example: Displaying the notification as an alert
            alert('New Notification: ' + event.message);  // Display a simple alert
            // Or you can append the notification to the UI
        });
}

// Call this function wherever you need to start listening (e.g., after user login or based on the year)
// Make sure the `yearId` is dynamically set based on the logged-in student's year
// Example:
const studentId = 52;  // This can come from the logged-in user's session or context
listenForNotifications(studentId);

