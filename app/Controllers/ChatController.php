<?php

namespace App\Controllers;

use App\Models\ChatModel;
use CodeIgniter\Controller;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat/index');
    }

    public function send()
    {
        $chatModel = new ChatModel();
        $message = $this->request->getPost('message');
        $response = $chatModel->sendMessage($message);

        return $this->response->setJSON(['response' => $response]);
    }
}
