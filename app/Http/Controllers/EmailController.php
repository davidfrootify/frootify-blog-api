<?php

namespace App\Http\Controllers;

use App\Mail\DynamicMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * Class EmailController
 *
 * Controller for handling email-related actions.
 */
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
        $emailConfigurations = $this->getEmailConfigurations();

        if (!array_key_exists($type, $emailConfigurations)) {
            return response()->json(['error' => 'Invalid email type'], 400);
        }

        $emailConfig = $emailConfigurations[$type];
        $emailData = array_merge($emailConfig['defaults'], $request->all());

        Mail::to($request->input('recipient'))->send(
            new DynamicMail($emailConfig['template'], $emailConfig['subject'], $emailData)
        );

        return response()->json(['message' => ucfirst($type) . ' email sent successfully!']);
    }

    /**
     * Get the email configurations for different email types.
     *
     * @return array The email configurations
     */
    private function getEmailConfigurations()
    {
        return [
            'reset_password' => [
                'template' => 'emails.reset_password',
                'subject' => 'You\'ve Got Mail... and a Password Reset Link!',
                'defaults' => [
                    'title' => 'Reset Your Password',
                    'banner_text' => 'You requested a password reset!',
                    'button_text' => 'Reset Password',
                    'reset_link' => 'https://frootify.tech/reset-password',
                    'username' => 'Frooty',
                ],
            ],
            'incorrect_password' => [
                'template' => 'emails.incorrect_password',
                'subject' => 'Oops! Incorrect Password',
                'defaults' => [
                    'title' => 'Incorrect Password',
                    'banner_text' => 'Quick fix, big impact.',
                    'button_text' => 'Reset Password',
                    'reset_link' => 'https://frootify.tech/reset-password',
                    'username' => 'Frooty',
                ],
            ],
            'password_change' => [
                'template' => 'emails.password_change',
                'subject' => 'Password Changed Successfully',
                'defaults' => [
                    'title' => 'Back to business!',
                    'banner_text' => 'Your password has been updated!',
                    'link' => 'https://frootify.tech/login',
                    'button_text' => 'Login to Your Account',
                    'username' => 'Frooty',
                ],
            ],
            'order_confirmation' => [
                'template' => 'emails.order_confirmation',
                'subject' => 'Your Fresh Fix is on the Way!',
                'defaults' => [
                    'title' => 'Your Frootify Order is Confirmed!',
                    'banner_text' => 'Freshness delivered!',
                    'order_no' => '12345',
                    'delivery_address' => '12 address',
                    'delivery_date' => '2024',
                    'button_text' => 'Track Your Order',
                    'link' => 'https://frootify.tech/track',
                    'username' => 'Frooty',
                ],
            ],
            'order_shipped' => [
                'template' => 'emails.order_shipped',
                'subject' => 'Your Order is on its Way!',
                'defaults' => [
                    'title' => 'Your Fresh Cup of Goodness is on the Way!',
                    'banner_text' => 'A Little Something From Frootify',
                    'username' => 'Frooty',
                    'order_no' => '12345',
                    'link' => 'https://frootify.tech/track-order',
                    'button_text' => 'Track Your Order',
                ],
            ],
            'order_delivered' => [
                'template' => 'emails.order_delivered',
                'subject' => 'Your Frootify Order Has Arrived!',
                'defaults' => [
                    'title' => 'Your Frootify Freshness is Here!',
                    'banner_text' => 'A Little Something From Frootify',
                    'username' => 'Frooty',
                    'order_no' => '12345',
                    'button_text' => 'Contact Support',
                    'link' => 'https://frootify.tech/support',
                ],
            ],
            'order_pickup' => [
                'template' => 'emails.order_pickup',
                'subject' => 'Your Order is Waiting for You!',
                'defaults' => [
                    'title' => 'Your Order\'s Ready! Come and Get It',
                    'banner_text' => 'Your Fresh Pick-Me-Up is Ready',
                    'username' => 'Frooty',
                    'order_no' => '12345',
                    'service_point_name' => 'Frootify Downtown',
                    'service_point_address' => '123 Main Street, Springfield',
                    'pickup_time' => '10:00 AM - 5:00 PM',
                    'button_text' => 'Login to Your Account',
                    'link' => 'https://frootify.tech/login',
                ],
            ],
            'order_cancelled' => [
                'template' => 'emails.order_cancelled',
                'subject' => 'Your Frootify Order Has Been Cancelled',
                'defaults' => [
                    'title' => 'We\'re Sorry, Your Order Has Been Cancelled',
                    'banner_text' => 'Oops! Something Went Wrong with Your Order',
                    'username' => 'Frooty',
                    'order_no' => '12345',
                    'cancellation_reason' => 'Out of stock',
                    'button_text' => 'Contact Support',
                    'link' => 'https://frootify.tech/support',
                ],
            ],
            'appointment_confirmation' => [
                'template' => 'emails.appointment_confirmation',
                'subject' => 'Your SWAHB Appointment is Confirmed',
                'defaults' => [
                    'title' => 'Your SWAHB Call is Scheduled!',
                    'banner_text' => 'Get Ready To SWAHB',
                    'username' => 'Frooty',
                    'appointment_date' => '2024-12-15',
                    'appointment_time' => '3:00 PM',
                    'button_text' => 'See Your Schedule',
                    'link' => 'https://frootify.tech/schedule',
                ],
            ],
            'appointment_reminder' => [
                'template' => 'emails.appointment_reminder',
                'subject' => 'You\'ve Got a SWAHB Appointment!',
                'defaults' => [
                    'title' => 'Your Health Buddy Session is Coming Up',
                    'banner_text' => 'Don\'t Forget to SWAHB!',
                    'username' => 'Frooty',
                    'appointment_date' => '2024-12-15',
                    'appointment_time' => '3:00 PM',
                    'button_text' => 'Join The Call',
                    'link' => 'https://frootify.tech/join-call',
                ],
            ],
            'health_buddy_rating_prompt' => [
                'template' => 'emails.health_buddy_rating_prompt',
                'subject' => 'How was your Health Buddy session?',
                'defaults' => [
                    'title' => 'Share Your Health Buddy Experience',
                    'banner_text' => 'We want to hear you?',
                    'username' => 'Frooty',
                    'button_text' => 'Rate Your Buddy',
                    'link' => 'https://frootify.tech/survey',
                ],
            ],
            'appointment_cancelled' => [
                'template' => 'emails.appointment_cancelled',
                'subject' => 'Your Appointment has been Cancelled',
                'defaults' => [
                    'title' => 'A Quick Update About Your Call',
                    'banner_text' => 'A Change of Plans',
                    'username' => 'Frooty',
                    'appointment_date' => '2024-12-15',
                    'appointment_time' => '3:00 PM',
                    'reason' => 'Unexpected scheduling conflict',
                    'phone_number' => '+1234567890',
                    'email_address' => 'support@frootify.tech',
                    'button_text' => 'Contact Support',
                    'link' => 'https://frootify.tech/support',
                ],
            ],
            'changed_appointment' => [
                'template' => 'emails.changed_appointment',
                'subject' => 'Your Appointment Has Been Changed',
                'defaults' => [
                    'title' => 'Your Appointment Has Been Moved',
                    'banner_text' => 'A Change of Plans',
                    'username' => 'Frooty',
                    'original_date' => '2024-12-15',
                    'original_time' => '3:00 PM',
                    'new_date' => '2024-12-20',
                    'new_time' => '10:00 AM',
                    'reason' => 'Staff availability adjustment',
                    'phone_number' => '+1234567890',
                    'email_address' => 'support@frootify.tech',
                    'button_text' => 'See Your Schedule',
                    'link' => 'https://frootify.tech/schedule',
                ],
            ],
            'missed_appointment' => [
                'template' => 'emails.missed_appointment',
                'subject' => 'You Missed Your Appointment',
                'defaults' => [
                    'title' => 'You missed something important...',
                    'banner_text' => 'A Change of Plans',
                    'username' => 'Frooty',
                    'date' => '2024-12-15',
                    'time' => '3:00 PM',
                    'phone_number' => '+1234567890',
                    'email_address' => 'support@frootify.tech',
                    'button_text' => 'Contact Support',
                    'link' => 'https://frootify.tech/support',
                ],
            ],
            'first_blend' => [
                'template' => 'emails.first_blend',
                'subject' => 'Hurray! You Just Created Your First Blend',
                'defaults' => [
                    'title' => 'Your First Personalized Blend is Ready!',
                    'banner_text' => 'A new brew, just for you',
                    'username' => 'Frooty',
                    'base_fruit' => 'Mango',
                    'mix_in_fruits' => 'Strawberry, Banana',
                    'button_text' => 'See Your Blend',
                    'link' => 'https://frootify.tech/blend',
                ],
            ],
            'subsequent_blends' => [
                'template' => 'emails.subsequent_blends',
                'subject' => 'Your Custom Blend is Ready to Brew!',
                'defaults' => [
                    'title' => 'A New Flavor Sensation Awaits',
                    'banner_text' => 'Your Custom Blend is Ready to Sip',
                    'username' => 'Frooty',
                    'base_fruit' => 'Apple',
                    'mix_in_fruits' => 'Blueberry, Kiwi',
                    'button_text' => 'See Your Blend',
                    'link' => 'https://frootify.tech/blend',
                ],
            ],
            'subscription_confirmation' => [
                'template' => 'emails.subscription_confirmation',
                'subject' => 'Your Health Buddy Subscription is Active',
                'defaults' => [
                    'title' => 'Your Health Buddy Journey Starts Now',
                    'banner_text' => 'It\'s Time to SWAHB',
                    'username' => 'Frooty',
                    'number_of_days' => '30',
                    'button_text' => 'Login to Your Account',
                    'link' => 'https://frootify.tech/login',
                ],
            ],
            'subscription_cancelled' => [
                'template' => 'emails.subscription_cancelled',
                'subject' => 'Your Subscription has been Cancelled',
                'defaults' => [
                    'title' => 'Updates on Your Subscription...',
                    'banner_text' => 'A Change of Plans',
                    'username' => 'Frooty',
                    'reason' => 'You chose to end your subscription.',
                    'phone_number' => '+1234567890',
                    'email_address' => 'support@frootify.tech',
                    'button_text' => 'Contact Support',
                    'link' => 'https://frootify.tech/support',
                ],
            ],
            'abandoned_cart' => [
                'template' => 'emails.abandoned_cart',
                'subject' => 'You left something behind...',
                'defaults' => [
                    'title' => 'Your Cart is Waiting',
                    'banner_text' => 'Don\'t Miss Out on Your Favorites',
                    'username' => 'Frooty',
                    'items' => ['Apple', 'Orange', 'Grapes'],
                    'button_text' => 'Complete Your Order',
                    'link' => 'https://frootify.tech/cart',
                ],
            ],
        ];
    }
}
