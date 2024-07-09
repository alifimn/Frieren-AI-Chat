<?php

namespace App\Models;

use CodeIgniter\Model;
use GuzzleHttp\Client;

class ChatModel extends Model
{
    public function sendMessage($message)
    {
        $client = new Client();
        $openAIConfig = new \App\Config\OpenAI();

        try {
            $response = $client->post('https://api.openai.com/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $openAIConfig->apiKey,
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'model' => 'gpt-3.5-turbo', // Menggunakan model gpt-3.5-turbo
                    'messages' => [
                        ['role' => 'user', 'content' => $message],
                    ],
                    'max_tokens' => 150,
                ],
            ]);

            $body = $response->getBody();
            $data = json_decode($body, true);

            return $data['choices'][0]['message']['content'];
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
