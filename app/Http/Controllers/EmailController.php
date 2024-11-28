<?php

namespace App\Http\Controllers;

use App\Mail\DynamicMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Send a dynamic email based on the type and data.
     *
     * @param string $type The type of email to send
     * @param Request $request Request containing dynamic data
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmail($type, Request $request)
    {
        // Email configurations
        $emailConfigurations = [
            'blog_post_created' => [
                'template' => 'emails.blog_post_created',
                'subject' => 'New Blog Post Created!',
                'defaults' => [
                    'title' => 'Your Blog Post Has Been Published!',
                    'banner_text' => 'Fresh content just for you!',
                    'button_text' => 'View Blog Post',
                ],
            ],
            'blog_post_updated' => [
                'template' => 'emails.blog_post_updated',
                'subject' => 'Blog Post Updated!',
                'defaults' => [
                    'title' => 'Your Blog Post Has Been Updated!',
                    'banner_text' => 'Your content got a refresh!',
                    'button_text' => 'View Updated Post',
                ],
            ],
            'reset_password' => [
                'template' => 'emails.reset_password',
                'subject' => 'You\'ve Got Mail... and a Password Reset Link!',
                'defaults' => [
                    'title' => 'Reset Your Password',
                    'banner_text' => 'You requested a password reset!',
                    'button_text' => 'Reset Password',
                    'reset_link' => 'https://frootify.tech/reset-password',
                    'username' => 'Oladele David',
                ],
            ],
        ];

        // Validate the email type
        if (!array_key_exists($type, $emailConfigurations)) {
            return response()->json(['error' => 'Invalid email type'], 400);
        }

        $emailConfig = $emailConfigurations[$type];

        // Prepare email data
        $emailData = array_merge($emailConfig['defaults'], $request->all());

        // Send the email
        Mail::to($request->input('recipient'))->send(
            new DynamicMail($emailConfig['template'], $emailConfig['subject'], $emailData)
        );

        return response()->json(['message' => ucfirst($type) . ' email sent successfully!']);
    }
}

