<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $note->title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; padding: 20px; }
        h1 { font-size: 24px; }
        p { font-size: 14px; }
        .date { font-size: 12px; color: #666; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>{{ $note->title }}</h1>
    <p>{{ $note->content }}</p>
    <div class="date">
        Last Updated: {{ $note->updated_at->timezone('Asia/Kolkata')->format('Y-m-d H:i:s') }}
    </div>
</body>
</html>
