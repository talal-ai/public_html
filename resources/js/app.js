

// Listening to private channel for notifications
const studentId = 52; // Replace with dynamic year ID based on current user's year

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;
console.log(import.meta.env.VITE_PUSHER_APP_KEY);
console.log(import.meta.env.VITE_PUSHER_APP_CLUSTER);
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
    authEndpoint: 'http://localhost:3310/rmdc/broadcasting/auth',
    auth: {
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
    },
});

window.Echo.leave('year-notification.' + studentId);  // Unsubscribe first
var channel = window.Echo.private("year-notification." + studentId);
channel.listen("YearNotificationSent", (data) => {
    console.log("Notification received:", data);
    fetchNotifications();  // Update notifications or UI as needed
});

// Function to listen for notifications on a dynamic channel based on yearId
function listenForNotifications(studentId) {
    console.log('New Notification with page load');  // You can log it or show a toast, etc.
    try {
        window.Echo.private(`year-notification.${studentId}`)
            .listen('YearNotificationSent', (event) => {
                console.log('New Notification:', event.message);
               // alert('New Notification: ' + event.message);  // Example alert
                displayNotifications(event);  // Update UI
            });
        console.log('Successfully subscribed to the private channel');
    } catch (error) {
        console.error('Error with Echo private channel:', error);
    }
}

// Call this function wherever you need to start listening (e.g., after user login or based on the year)
// Make sure the `yearId` is dynamically set based on the logged-in student's year
// Example:



function fetchNotifications() {
    fetch('http://localhost:3310/rmdc/notifications')
        .then(response => response.json())
        .then(data => {
            console.log(data);
            displayNotifications(data);
        })
        .catch(error => {
            console.error('Error fetching notifications:', error);
        });
}

function displayNotifications(notifications) {
    notifications.forEach(notification => {
        console.log('Display:'+notification.message);
        
        // Select the notification list element
        const notificationList = document.getElementById('notification-list'); // Ensure you have this element in your HTML

        // Create the list item for the notification
        const notificationItem = document.createElement('li');
        notificationItem.classList.add('mt-5', 'space-y-[22px]');

        // Create the content inside the list item
        const notificationContent = `
            <a href="#" class="flex items-center gap-2.5">
                <div class="w-9 h-9 bg-purple/10 rounded-full flex items-center justify-center shrink-0">
                    <svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="10" cy="5.49984" r="3.33333" fill="#7B6AFE" />
                        <ellipse opacity="0.5" cx="10" cy="14.6668" rx="5.83333" ry="3.33333" fill="#7B6AFE" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-dark dark:text-white">${notification.message}</p>
                    <p class="text-xs text-gray mt-0.5">${notification.time}</p>
                </div>
            </a>
        `;

        // Set the inner HTML of the notification item to the content
        notificationItem.innerHTML = notificationContent;

        // Append the notification item to the notification list
        notificationList.appendChild(notificationItem);
    });
}


// Optionally, call fetchNotifications on page load to populate any existing notifications
document.addEventListener('DOMContentLoaded', () => {
    fetchNotifications();
    listenForNotifications(studentId);
});
