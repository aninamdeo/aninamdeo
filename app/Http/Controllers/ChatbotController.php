<?php

namespace App\Http\Controllers;

use App\Models\ChatMessage;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    private array $knowledgeBase = [
        'services' => "Aniket Namdeo offers: AI Solutions Development, Custom Web Applications (Laravel, React, Next.js), Enterprise Software Development, IT Team Management & Consulting, Startup MVP Development.",
        'experience' => "Aniket has 8+ years of software development experience, has delivered 50+ projects, managed a team of 15+ developers, and worked with clients from India, Malaysia, USA, Singapore, and other international markets.",
        'skills' => "Top skills: AI Development, Laravel (PHP), React.js, Next.js, Full Stack Development, System Architecture, IT Management, Team Leadership, Client Handling.",
        'contact' => "You can contact Aniket through the contact form on this website. He is available for freelance projects, consulting, and full-time opportunities.",
        'projects' => "Aniket has delivered 50+ projects across AI, web development, enterprise systems, and mobile applications for clients worldwide.",
        'hire' => "To hire Aniket, fill out the contact form below with your project details and budget. He typically responds within 24 hours.",
    ];

    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        $sessionId = $request->session()->getId();
        $userMessage = strtolower(trim($request->message));

        ChatMessage::create(['session_id' => $sessionId, 'role' => 'user', 'message' => $request->message, 'ip_address' => $request->ip()]);

        $response = $this->generateResponse($userMessage);

        ChatMessage::create(['session_id' => $sessionId, 'role' => 'assistant', 'message' => $response, 'ip_address' => $request->ip()]);

        return response()->json(['response' => $response]);
    }

    private function generateResponse(string $message): string
    {
        $keywords = [
            'service|offer|provide|do you' => $this->knowledgeBase['services'],
            'experience|year|background' => $this->knowledgeBase['experience'],
            'skill|technology|tech|stack|language' => $this->knowledgeBase['skills'],
            'contact|reach|email|phone|whatsapp' => $this->knowledgeBase['contact'],
            'project|work|portfolio|built' => $this->knowledgeBase['projects'],
            'hire|available|freelance|rate|cost|price|budget' => $this->knowledgeBase['hire'],
        ];

        foreach ($keywords as $pattern => $answer) {
            if (preg_match('/(' . $pattern . ')/i', $message)) {
                return $answer;
            }
        }

        $greetings = ['hi', 'hello', 'hey', 'good morning', 'good evening'];
        foreach ($greetings as $greet) {
            if (str_contains($message, $greet)) {
                return "Hello! I'm Aniket's virtual assistant. I can help you learn about his services, experience, skills, or how to hire him. What would you like to know?";
            }
        }

        return "I'm here to help! You can ask me about Aniket's services, experience, skills, projects, or how to get in touch. What would you like to know?";
    }
}
