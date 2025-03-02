import './bootstrap';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: '6da7e21ba44ca88537cf', // Your Pusher Key
    cluster: 'mt1',
    forceTLS: true
});

window.Echo.channel('chat-channel')
    .listen('.message-sent', (e) => {
        console.log('New message:', e.message);
    });
