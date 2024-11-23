<x-mail::message>
# Thanks for your Post {{ $data['name'] }}
    Your post title: {{ $data['title'] }}

The body of your message.


Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
