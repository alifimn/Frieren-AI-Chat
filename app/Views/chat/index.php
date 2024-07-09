<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frieren-AI Chat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/images/1344010.jpeg'); /* Sesuaikan path dengan lokasi gambar Anda */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
            margin: 0; /* Menghapus margin default dari body */
        }

        .container {
            text-align: center;
        }

        .chat-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #d3d3d3;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .chat-box {
            height: 300px;
            overflow-y: auto;
            border: 1px solid #d3d3d3;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
        }

        .chat-message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 8px;
            clear: both; /* Membersihkan float sebelumnya */
        }

        .chat-message.user {
            background-color: #007bff;
            color: #ffffff;
            float: right; /* Mengatur pesan pengguna ke kanan */
        }

        .chat-message.user p {
            margin: 0;
            text-align: left; /* Mengatur teks pesan ke kiri */
        }

        .chat-message.ai {
            background-color: #28a745;
            color: #ffffff;
            float: left; /* Mengatur pesan AI ke kiri */
        }

        .chat-message.ai p {
            margin: 0;
            text-align: left; /* Mengatur teks pesan ke kiri */
        }

        .input-container {
            display: flex;
            margin-top: 10px;
        }

        .input-container input[type="text"] {
            flex: 1;
            padding: 12px;
            border: 1px solid #d3d3d3;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }

        .input-container button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            margin-left: 10px;
            transition: background-color 0.3s;
        }

        .input-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="chat-container">
            <h1 class="text-center">Frieren-AI Chat</h1>
            <div class="chat-box" id="chat-box">
                <!-- Chat messages will appear here -->
            </div>
            <div class="input-container">
                <input type="text" id="message" class="form-control" placeholder="Type a message...">
                <button id="send" class="btn btn-primary">Send</button>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#send').click(function() {
                var message = $('#message').val();
                sendMessage('You', message); // Mengirim pesan dari pengguna
                $('#message').val('');
                $('#chat-box').animate({ scrollTop: $('#chat-box')[0].scrollHeight }, 'slow');


            // Simulasi respons dari AI (dummy response)
            setTimeout(function() {
                    var aiResponse = 'Frieren-AI belum Aktif, Mohon bersabar ya! :)';
                    sendMessage('Frieren', aiResponse); // Mengirim respons dari AI
                    $('#chat-box').animate({ scrollTop: $('#chat-box')[0].scrollHeight }, 'slow');
                }, 1000); // Waktu simulasi respons dari AI (dalam milidetik)
            });
                // Kirim permintaan ke API NLP (contoh menggunakan OpenAI GPT-3)
            //     $.post('/chat/send', {message: message}, function(data) {
            //         var aiResponse = data.response;
            //         sendMessage('AI', aiResponse); // Menampilkan respons dari AI
            //         $('#chat-box').animate({ scrollTop: $('#chat-box')[0].scrollHeight }, 'slow');
            //     });
            // });

            $('#message').keypress(function(e) {
                if(e.which == 13) {
                    $('#send').click();
                }
            });

            function sendMessage(sender, message) {
                var chatMessage = '<div class="chat-message ' + (sender === 'You' ? 'user' : 'ai') + ' mb-2"><p><b>' + sender + ':</b> ' + message + '</p></div>';
                $('#chat-box').append(chatMessage);
            }
        });
    </script>
</body>
</html>
