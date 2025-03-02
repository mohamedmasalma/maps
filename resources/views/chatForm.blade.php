<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Chat with {{ $user->name }}</title>
    <link href="https://bootswatch.com/5/sketchy/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.4.0/axios.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center"> Chat with {{ $user->name }}</h2>
        <div class="card">
            <div class="card-body">
                <div id="chat-box" class="border p-3" style="height: 300px; overflow-y: auto;">
                    <!-- Messages will appear here -->
                    @foreach ($messages as $message)
                        <div id="message_div" class="p-2 mb-2 rounded"
                            style="max-width: 70%; word-wrap: break-word;
                            background: {{ $message->sender_id == Auth::id() ? '#007bff' : '#28a745' }}; color: #fff;
                            align-self: {{ $message->sender_id == Auth::id() ? 'flex-end' : 'flex-start' }};">
                            {{ $message->sender_id == Auth::id() ? 'you: ' . $message->message : $message->sender->name . ': ' . $message->message }}
                        </div>
                    @endforeach
                </div>
                <div class="input-group mt-3">
                    <input type="text" id="message-input" class="form-control" placeholder="Type a message...">
                    <button id="send-button" class="btn btn-primary"><i class="fa fa-paper-plane"></i></button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Replace with the logged-in user ID
        var userId = @json(Auth::id()); // Replace dynamically
        var receiverId = @json($user->id); // Replace dynamically

        Pusher.logToConsole = true;

        // Initialize Pusher
        Pusher.logToConsole = true;
        const pusher = new Pusher("6da7e21ba44ca88537cf", {
            cluster: "eu",
            encrypted: true,
            authEndpoint: "/broadcasting/auth", // This is required for private channels
            auth: {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}" // Required if using Laravel
                }
            }
        });

        // Subscribe to the chat channel
        const user1 = Math.min(userId, receiverId);
        const user2 = Math.max(userId, receiverId);
        const channel = pusher.subscribe("private-chat." + user1 + "_" + user2);




        channel.bind("message.sent", function(data) {
            const type = (data.sender_id == userId) ? 'sent' : 'received';
            addMessageToChat(data, type);
        });


        // Send Message
        document.getElementById("send-button").addEventListener("click", function() {
            let message = document.getElementById("message-input").value;
            if (message.trim() !== "") {
                console.log("chanel:", channel);
                axios.post('/chat/' + receiverId, {
                    receiver_id: receiverId,
                    message: message
                }).then(response => {
                    document.getElementById("message-input").value = "";
                }).catch(error => {
                    console.error(error);
                });
            }
        });

        // Function to Add Message to Chat
        function addMessageToChat(message, type) {
            let chatBox = document.getElementById("chat-box");

            let messageElement = document.createElement("div");
            messageElement.classList.add("p-2", "mb-2", "rounded");
            messageElement.style.maxWidth = "70%";
            messageElement.style.wordWrap = "break-word";
            messageElement.style.background = type === 'sent' ? "#007bff" : "#28a745";
            messageElement.style.color = "#fff";
            messageElement.style.alignSelf = type === 'sent' ? "flex-end" : "flex-start";

            messageElement.textContent = userId === message.sender_id ? "you: " + message.message : message.sender + ": " +
                message.message;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        }
    </script>

</body>

</html>
